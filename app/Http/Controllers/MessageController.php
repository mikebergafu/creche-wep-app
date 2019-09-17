<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserCollection;
use App\Mail\MommziMSMail;
use App\Mail\TestEmail;
use App\Message;
use App\Notifications\SMSEngine;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Load Region Add form.
     *
     * @return \Illuminate\Http\Response
     */


     //Show Daily Reports 
     public function showDaily(){

        $daily_messages=DB::table('messages')
            ->where('created_at', 'like','%'.date("Y-m-d") .'%')
            ->get();
        return view('super_admin/daily_reports', ['daily_messages' => $daily_messages]);

     }   

    //superadmin route
    public function showMessage()
    {
        $message = Message::all();
        
        // $messages1=DB::table('messages')
        //     ->where('created_at', 'like','%'.date("Y-m-d") .'%')
        //     ->get();
        // $messages_count=count($messages1);
        return view('super_admin/messages', ['message' => $message]);

    }

    //parent route
    public function showMessageParent()
    {
        $message = Message::all();
        return view('parent/messages', ['message' => $message]);
    }

    //caretaker route
    public function showMessageCaretaker()
    {
        $message = Message::all();
        return view('caretaker/messages', ['message' => $message]);
    }

    //super
    public function writeMessage()
    {
        //$role=Auth::user()->role;
        //$fullname=Auth::user()->fullname;
       // return view('super_admin/writemessage',['fullname' => $fullname,'role' => $role]);
        return 'done';
    }

    //parent
    public function writeMessageParent()
    {
        $fullname=Auth::user()->fullname;
        $role=Auth::user()->role;
        return view('parent/writemessage',['fullname' => $fullname,'role' => $role]);
    }

    //caretaker
    public function writeMessageCaretaker()
    {
        $fullname=Auth::user()->fullname;
        $role=Auth::user()->role;
        return view('caretaker/writemessage',['fullname' => $fullname,'role' => $role]);
    }


    public function addMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'string|max:255',
            'role' => 'string|max:255',
            'subject' => 'string|max:255',
            'issue' => 'string|max:255',
        ], $messages = [
            'role.unique' => 'Please Change the role name ' . $request->input('rolename') . ' and try again',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            //Get form input fields values
            $fullname = $request->input('fullname');
            $role = $request->input('role');
            $subject = $request->input('subject');
            $issue = $request->input('issue');

            //Prepared Input data for db storage
            $data = array(
                'fullname' => $fullname,
                'role' => $role,
                'subject' => $subject,
                'issue' => $issue,
                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );

            $insert=DB::table('messages')->insert($data);
            if($insert){
                $this->toSMS($data['fullname'],$data['role'],$data['subject'],$data['issue'], $data['created_at']);
                $this->toEmail($data['fullname'],$data['role'],$data['subject'],$data['issue'], $data['created_at']);
            }
            return redirect()->back()->with('message','Issue Successfully Reported, An Administrator will get back to you. Thank you ');
            
            //pass your dynamic id
        }
    }


    function addMessageParent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'string|max:255',
            'role' => 'string|max:255',
            //'subject' => 'string|max:255',
            'issue' => 'string|max:255',
            

        ], $messages = [
            'role.unique' => 'Please Change the role name ' . $request->input('rolename') . ' and try again',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            //Get form input fields values
            $fullname = $request->input('fullname');
            $role = $request->input('role');
            $subject = $request->input('subject');
            $issue = $request->input('issue');

            //Prepared Input data for db storage
            $data = array(
                'fullname' => $fullname,
                'role' => $role,
                'subject' => $subject,
                'issue' => $issue,
                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            $insert=DB::table('messages')->insert($data);
            if($insert){
                $this->toSMS($data['fullname'],$data['role'],$data['subject'],$data['issue'], $data['created_at']);
                $this->toEmail($data['fullname'],$data['role'],$data['subject'],$data['issue'], $data['created_at']);
            }
            return redirect()->back()->with('message','Issue Successfully Reported, An Administrator will get back to you. Thank you ');
            //return Redirect::to('/parent/messages')->with('message', 'Issue Successfully Added! ');
            
            //pass your dynamic id
        }
    }

    function addMessageCaretaker(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'string|max:255',
            'role' => 'string|max:255',
            //'subject' => 'string|max:255',
            'issue' => 'string|max:255',
            

        ], $messages = [
            'role.unique' => 'Please Change the role name ' . $request->input('rolename') . ' and try again',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            //Get form input fields values
            $fullname = $request->input('fullname');
            $role = $request->input('role');
            $subject = $request->input('subject');
            $issue = $request->input('issue');

            //Prepared Input data for db storage
            $data = array(
                'fullname' => $fullname,
                'role' => $role,
                'subject' => $subject,
                'issue' => $issue,
                'created_by' => Auth::user()->id,//Server timestamp
                'updated_by' => Auth::user()->id,//Server timestamp

                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            $insert=DB::table('messages')->insert($data);
            if($insert){
                $this->toSMS($data['fullname'],$data['role'],$data['subject'],$data['issue'], $data['created_at']);
                $this->toEmail($data['fullname'],$data['role'],$data['subject'],$data['issue'], $data['created_at']);
            }

            //$users = User::all();
            return redirect()->back()->with('message','Issue Successfully Reported, An Administrator will get back to you. Thank you ');
            
            //pass your dynamic id
        }

    }

    public  function  toSMS($fullname,$role,$subject,$issue, $created_at){
        $user= (new \App\User)->first();
        $data=array(
            'title'=>'Issues Report: ',
            'web'=>' For Further information, contact us at:info@mommzi.com or ',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Full Name: '.$fullname.' Role: '.$role.' Subject: '.$subject.' Issue: '.$issue.' Date Created: '.$created_at,
            'to'=> '233206923053',
        );
        $user->notify(new SMSEngine($data));
    }

    public function toEmail($fullname,$role,$subject,$issue, $created_at){
        $data=array(
            'title'=>'Issues Report: ',
            'body'=>'Issues Report: ',
            'button'=>'Contact Us',
            'from'=>'info@mommzi.org',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Full Name: '.$fullname.' Role: '.$role.' Subject: '.$subject.' Issue: '.$issue.' Date Created: '.$created_at,
            'to'=> 'mikebergafu@gmail.com',
        );
        Mail::to(
            [
                $data['to'],
                $data['from']
            ])
            ->queue(new MommziMSMail($data));
    }
}
