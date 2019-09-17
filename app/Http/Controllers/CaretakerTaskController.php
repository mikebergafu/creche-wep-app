<?php

namespace App\Http\Controllers;

use App\Mail\MommziMSMail;
use App\Mail\TestEmail;
use App\Notifications\SMSEngine;
use App\User;
use Carbon\Carbon;
use function GuzzleHttp\Promise\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CaretakerTaskController extends Controller
{
    /* Load Tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks =DB::table('caretaker_tasks')->where([
            ['caretaker_tasks.created_by',Auth::user()->id],
            ['caretaker_tasks.created_at', 'like','%'.date("Y-m-d") . '%']
        ])->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
            ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->get();
        //return $tasks;
        return view('caretaker/manage-tasks',['tasks'=>$tasks]);
    }

    public function caretakerTasksHistory()
    {
        $tasks =DB::table('caretaker_tasks')->where([
            ['caretaker_tasks.created_by',Auth::user()->id],['caretaker_tasks.created_at', 'like','%'.date("Y-m-d") . '%']
        ])->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
            ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->get();
        //return $task_history;
        return view('caretaker/task-history',['tasks'=>$tasks]);
    }

    /* Load Tasks Add form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createForm($id)
    {
        $child_id=DB::table('children')->where('id',$id)
            ->pluck('id');
        //return $child_id;
        return view('caretaker/create-children-tasks', ['child_id'=>$child_id]);
    }

    public function create(Request $request){
       if($inputs=$request->get('task0')===null){
           $inputs=$request->except('_token','task0');

           $actual_link = parse_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
           $c_id = explode("/", $actual_link['path']);
           $child_id=end($c_id);

           foreach($inputs as $value) {
               $data = array(
                   'child_id' => $child_id,
                   'task' => $value,
                   'created_by' => Auth::user()->id,//Server timestamp
                   'updated_by' => Auth::user()->id,//Server timestamp
                   'created_at' => Carbon::now(),//Server timestamp
                   'updated_at' => Carbon::now()//Server timestamp
               );
               DB::table('caretaker_tasks')->insert($data);
           }
       }else{
           $inputs=$request->except('_token');

           $actual_link = parse_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
           $c_id = explode("/", $actual_link['path']);
           $child_id=end($c_id);

           foreach($inputs as $value) {
               $data = array(
                   'child_id' => $child_id,
                   'task' => $value,
                   'created_by' => Auth::user()->id,//Server timestamp
                   'updated_by' => Auth::user()->id,//Server timestamp
                   'created_at' => Carbon::now(),//Server timestamp
                   'updated_at' => Carbon::now()//Server timestamp
               );
               DB::table('caretaker_tasks')->insert($data);
           }
       }


        $tasks =DB::table('caretaker_tasks')->where([
            ['caretaker_tasks.created_by',Auth::user()->id],
            ['caretaker_tasks.created_at', 'like','%'.date("Y-m-d") . '%']
        ])->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
            ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->select('child_fullname','fullname','guardian_name','guardian_cell','task','email', 'caretaker_tasks.created_at')
            ->get();
       if($request->get('task0')!==null){
           $this->smsTask($tasks[0]->guardian_name,$request->get('task0'),$tasks[0]->child_fullname,$tasks[0]->guardian_cell,$tasks[0]->fullname, $tasks[0]->created_at);
           $this->emailTask($tasks[0]->guardian_name,$request->get('task0'),$tasks[0]->child_fullname,$tasks[0]->email,$tasks[0]->fullname, $tasks[0]->created_at);
       }
       //return $tasks;

        return Redirect::to('/tasks/list')->with('message', 'Task Successfully Added',['tasks'=>$tasks]);

    }

    public function getAssignedChildren(){
        //Load caretaker resources
        $results =DB::table('assign_children')
            ->where([
                ['caretaker_id',Auth::user()->id],
                ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%']
                ])
            ->join('children', 'assign_children.child_id', '=', 'children.id')
            ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->select('assign_children.id as assigned_id',
                'children.id as child_id',
                'children.child_fullname',
                'users.email',
                'guardians.guardian_name',
                'guardians.guardian_cell',
                'assign_children.confirm',
                'assign_children.created_at')
            ->get();
        //return ($results);
        return view('caretaker/manage-assigned-children', ['results' => $results]);
    }

    public function update(){
        return 'update';
    }

    public function delete(){
        return 'delete';
    }

    public function confirmAssign($id,$child_id){
        //Load caretaker resources
        /*$results =DB::table('assign_children')->where([
            ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%'],
            ['assign_children.caretaker_id',Auth::user()->id]])
            ->get();*/
        //Prepared Input data for db storage
        $data=array(
            'confirm'=>'yes',
            'updated_at' => Carbon::now()//Server timestamp
        );
        $update=DB::table('assign_children')->where('id', $id)->update($data);
        if($update){
            //Load caretaker resources
            $results =DB::table('assign_children')
                ->where([
                    ['assign_children.child_id',$child_id],
                    ['caretaker_id',Auth::user()->id],
                    ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%']
                ])
                ->join('children', 'assign_children.child_id', '=', 'children.id')
                ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
                ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
                ->select('assign_children.id as assigned_id',
                    'children.id as child_id',
                    'children.child_fullname',
                    'users.fullname',
                    'users.email',
                    'guardians.guardian_name',
                    'guardians.guardian_cell',
                    'assign_children.confirm',
                    'assign_children.created_at',
                    'assign_children.updated_at as confirmed_at')
                ->get();
            $this->toSMS($results[0]->child_fullname,$results[0]->guardian_cell,$results[0]->fullname, $results[0]->confirmed_at);
            $this->toEmail($results[0]->child_fullname,$results[0]->email,$results[0]->fullname, $results[0]->confirmed_at);
        }
        //Redirect after confirmation
        return redirect()->back()->with('message','Assigned Child Confirmed Successfully! and SMS Notification Has been Sent '); //pass your dynamic id
        //return $results;
    }

    public  function  toSMS($child_name,$to_no,$caretaker, $at){
        $user= (new \App\User)->first();
        $data=array(
            'title'=>'Assigned Child Confirmation: ',
            'web'=>' For Further information, contact us at:info@mommzi.com or ',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello, Our Caretaker, '.$caretaker. ' has confirmed Receipt of your Child '.$child_name.' at '.$at ,
            'to'=> $to_no,
        );
        $user->notify(new SMSEngine($data));
    }

    public function toEmail($child_name,$to_email,$caretaker, $at){
        $data=array(
            'title'=>'Assigned Child Confirmation: ',
            'body'=>'Assigned Child Confirmation: ',
            'button'=>'Contact Us',
            'from'=>'info@mommzi.org',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello, Our Caretaker, '.$caretaker. ' has confirmed Receipt of your Child '.$child_name.' at '.$at ,
            'to'=> $to_email,
        );
        Mail::to(
            [
                $data['to'],
                $data['from']
            ])
            ->queue(new MommziMSMail($data));
    }

    public  function  smsTask($guardian,$task,$child_name,$to_no,$caretaker, $at){
        $user= (new \App\User)->first();
        $data=array(
            'title'=>'Critical Caretaker Activity: ',
            'web'=>' For Further information, contact us at:http://www.mommzi.org or ',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello '.$guardian.', Our Caretaker, '.$caretaker. ' reports that your Child '.$child_name.' '.$task.' at '.$at ,
            'to'=> $to_no,
        );
        $user->notify(new SMSEngine($data));
    }

    public function emailTask($guardian,$task,$child_name,$to_email,$caretaker, $at){
        $data=array(
            'title'=>'Critical Caretaker Activity: ',
            'body'=>'Critical Caretaker Activity: ',
            'button'=>'Contact Us',
            'from'=>'info@mommzi.org',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello '.$guardian.', Our Caretaker, '.$caretaker. ' reports that your Child '.$child_name.' '.$task.' at '.$at ,
            'to'=> $to_email,
        );
        Mail::to(
            [
                $data['to'],
                $data['from']
            ])
            ->queue(new MommziMSMail($data));
    }
}
