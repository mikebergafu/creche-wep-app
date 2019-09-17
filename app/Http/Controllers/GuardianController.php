<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Mail\MommziMSMail;
use App\Notifications\SMSEngine;
use App\Role;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GuardianController extends Controller
{


    /* Load Region Add form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardians=DB::table('users')->where('role','parent')
            ->join('guardians', 'users.id','=','guardians.user_id')
            ->select(
                'guardians.id as id',
                'fullname','email',
                'guardian_cell',
                'guardian_work_phone',
                'guardian_occupation',
                'guardian_employer')
            ->get();
        return $guardians;
        //return view('super_admin/manage-parent',['guardians'=>$guardians]);
    }

    /* Load Region Add form.
      *
      * @return \Illuminate\Http\Response
      */
    public function getChildren()
    {
        $children=DB::table('children')->where('guardians.user_id',Auth::user()->id)
            ->select
                (
                'children.id',
                'children.child_fullname',
                'children.pickup_name',
                'children.pickup_phone',
                'guardians.guardian_cell')
            ->join('guardians','children.guardian1_id','=','guardians.id')
            ->get();
            $guardian=DB::table('guardians')
            ->select('guardian_id','guardian_name')
            ->where('guardians.user_id',Auth::user()->id)
            ->get();
        //return $children;
        //return $guardian[0]->guardian_name;
        return view('parent/view-children',['children'=>$children, 'guardian'=>$guardian]);
        }
//     /* Load Region Add form.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function showParentForm()
//    {
//        $guardians=DB::table('users')->where('role','parent')->get();
//        //return $guardians;
//        return view('super_admin/create-parent',['guardians'=>$guardians]);
//    }

    public function showAssigned()
    {
        //Load caretaker resources
        $results =DB::table('assign_children')->where([
            ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%']])
            ->join('children', 'assign_children.child_id', '=', 'children.id')
            ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->where('user_id','=',Auth::user()->id)
            ->select('assign_children.id as assigned_id',
                'assign_children.pickup_status',
                'pickup_name',
                'assign_children.created_at',
                'fullname',
                'position',
                'children.id as child_id',
                'children.child_fullname',
                'users.fullname',
                'users.email',
                'guardians.guardian_name',
                'guardians.guardian_cell',
                'assign_children.confirm',
                'assign_children.created_at',
                'assign_children.updated_at as confirmed_at'
                )
            ->get();
        //return $results;
        return view('parent/index', ['results' => $results]);
    }

    public function showTasks()
    {
        //Load caretaker resources
        $tasks =DB::table('caretaker_tasks')->where([
            ['caretaker_tasks.created_at', 'like','%'.date("Y-m-d") . '%']])
            ->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
            ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->where('user_id','=',Auth::user()->id)
            ->select('children.id',
                'pickup_name',
                'child_fullname',
                'pickup_phone',
                'caretaker_tasks.created_at',
                'task',
                'fullname',
                'position'
            )
            ->get();
        //return $tasks;
        return view('parent/manage-tasks', ['tasks' => $tasks]);
    }

    public function showTasksHistory()
    {
        //Load caretaker resources
        $tasks =DB::table('caretaker_tasks')
            ->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
            ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->where('user_id','=',Auth::user()->id)
            ->select('children.id',
                'pickup_name',
                'child_fullname',
                'pickup_phone',
                'caretaker_tasks.created_at',
                'task',
                'fullname',
                'position'
            )
            ->get();
        return $tasks;
        return view('parent/task-history', ['tasks' => $tasks]);

        //$users=User::paginate(2);
        //return new UserCollection($users);

        //$user=User::find(1);
        //return new UserResource($user);
    }

    public function confirmPickup($id,$child_id){
        //Load caretaker resources
        /*$results =DB::table('assign_children')->where([
            ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%'],
            ['assign_children.caretaker_id',Auth::user()->id]])
            ->get();*/
        //Prepared Input data for db storage
        $data=array(
            'pickup_status'=>'yes',
            'pickup_at' => Carbon::now()//Server timestamp
        );
        $update=DB::table('assign_children')->where('id', $id)->update($data);
        if($update){
            //Load caretaker resources
            $results =DB::table('assign_children')->where([
                ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%'],['assign_children.child_id',$child_id]])
                ->join('children', 'assign_children.child_id', '=', 'children.id')
                ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
                ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
                ->where('user_id','=',Auth::user()->id)
                ->select('assign_children.id as assigned_id',
                    'assign_children.pickup_status',
                    'pickup_name',
                    'assign_children.created_at',
                    'fullname',
                    'position',
                    'children.id as child_id',
                    'children.child_fullname',
                    'users.fullname',
                    'users.email',
                    'guardians.guardian_name',
                    'guardians.guardian_cell',
                    'assign_children.confirm',
                    'assign_children.created_at',
                    'assign_children.updated_at as confirmed_at'
                )
                ->get();
            $this->toSMS($results[0]->child_fullname,$results[0]->guardian_cell,$results[0]->pickup_name, $results[0]->confirmed_at);
            $this->toEmail($results[0]->child_fullname,$results[0]->email,$results[0]->pickup_name, $results[0]->confirmed_at);
        }
        //return $results;
        //Redirect after confirmation
        return redirect()->back()->with('message','Assigned Child Confirmed Successfully! and SMS Notification Has been Sent '); //pass your dynamic id
    }

    public  function  toSMS($child_name,$to_no,$guardian, $at){
        $user= (new \App\User)->first();
        $data=array(
            'title'=>'Assigned Child Confirmation: ',
            'web'=>' For Further information, contact us at:info@mommzi.com or ',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello, '.$guardian. ' has confirmed Pickup of his/her Child '.$child_name.' at '.$at ,
            'to'=> $to_no,
        );
        $user->notify(new SMSEngine($data));
    }

    public function toEmail($child_name,$to_email,$guardian, $at){
        $data=array(
            'title'=>'Pickup Child Confirmation: ',
            'body'=>'Pickup Child Confirmation: ',
            'button'=>'Contact Us',
            'from'=>'info@mommzi.org',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello, '.$guardian. ' has confirmed Pickup of his/her Child '.$child_name.' at '.$at ,
            'to'=> $to_email,
        );
        Mail::to(
            [
                $data['to'],
                $data['from']
            ])
            ->queue(new MommziMSMail($data));
    }

    public static function v4_uuid()
    {
        return sprintf('%04x'.'%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
