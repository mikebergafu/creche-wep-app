<?php

namespace App\Http\Controllers;

use App\Mail\MommziMSMail;
use App\Mail\TestEmail;
use App\Notifications\SMSEngine;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Load Region Add form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        $roles = Role::all();
        return view('super_admin/create-user', ['roles' => $roles]);
    }

    public function showRoleForm()
    {
        return view('super_admin/create-role');
    }

    public function getUsers()
    {
        $users = User::all();
        return view('super_admin/view-users', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'position' => 'string|max:255',
            'username' => 'string|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
            'role' => 'required|string',
        ], $messages = [
            'username.unique' => 'Please Change the user name ' . $request->input('username') . ' and try again',
            'email.unique' => 'Please Change the email ' . $request->input('email') . ' and try again',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            //Get form input fields values
            $fullname = $request->input('fullname');
            $username = $request->input('username');
            $email = $request->input('email');
            $position = $request->input('position');
            $role = $request->input('role');
            $password = Hash::make($request->input('password'));


            //Prepared Input data for db storage
            $data = array(
                'fullname' => $fullname,
                'position' => $position,
                'username' => $username,
                'role' => $role,
                'email' => $email,
                'password' => $password,
                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            $created=DB::table('users')->insert($data);
            if($created){

                //$this->toSMS($data['fullname'],$data['position'],$data['fullname'], $data['role'],$data['role']);
                $this->toEmail($data['fullname'],$data['position'],$data['created_at'], $data['role'],$data['email']);
                $users = User::all();
                return Redirect::to('users/view/all')->with('message', 'User Successfully Added! '); //pass your dynamic id
            }else{
                $users = User::all();
                return Redirect::to('users/view/all')->with('message', 'Error! '); //pass your dynamic id
            }

        }
    }


    function addRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rolename' => 'string|max:255',

        ], $messages = [
            'role.unique' => 'Please Change the role name ' . $request->input('rolename') . ' and try again',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            //Get form input fields values
            $rolename = $request->input('rolename');

            //Prepared Input data for db storage
            $data = array(
                'role_name' => $rolename,
                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            $created= DB::table('roles')->insert($data);
            $users = User::all();
            return redirect()->back()->with('message', 'Role Successfully Added! '); //pass your dynamic id
        }
    }

    public function deleteUser($id)
    {
        $del = DB::table('users')->where('id', $id);
        $del->delete();
        return redirect()->back()->with('message', 'Record Successfully Deleted');
    }

    public function editUser(Request $request, $id)
    {
        $req_data=$request->all();
        if($req_data['password']==""){
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'position' => 'required|string|max:255',
                'username' => 'required|string|max:20',
                'role' => 'required|required|string',
            ], $messages = [
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                //Get form input fields values
                $fullname = $request->input('fullname');
                $username = $request->input('username');
                $email = $request->input('email');
                $position = $request->input('position');
                $role = $request->input('role');

                //Prepared Input data for db storage
                $data = array(
                    'fullname' => $fullname,
                    'position' => $position,
                    'username' => $username,
                    'role' => $role,
                    'email' => $email,
                    'updated_at' => Carbon::now()//Server timestamp
                );

            }

        }else{
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'position' => 'required|string|max:255',
                'username' => 'required|string|max:20',
                'role' => 'required|required|string',
                'password' => 'string|min:6|confirmed',
            ], $messages = [
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                //Get form input fields values
                $fullname = $request->input('fullname');
                $username = $request->input('username');
                $email = $request->input('email');
                $position = $request->input('position');
                $role = $request->input('role');
                $password = Hash::make($request->input('password'));

                //Prepared Input data for db storage
                $data = array(
                    'fullname' => $fullname,
                    'position' => $position,
                    'username' => $username,
                    'role' => $role,
                    'email' => $email,
                    'password' => $password,
                    'updated_at' => Carbon::now()//Server timestamp
                );

            }
        }
        DB::table('users')->where('id', $id)->update($data);
        $users = User::all();
        //for redirects::to, use plain url text
        return Redirect::to('/users/view/all')->with('message', 'User Successfully Updated',['users' => $users]);
    }


    public function showEditUser($id){
        $user= DB::table('users')->where('id',$id)->get();
        $roles=Role::all();
        return view('super_admin/update-user', ['roles' => $roles, 'user'=>$user]);
    }

    public  function  toSMS($fullname,$position,$created_at, $role,$to_no){
        $user= (new \App\User)->first();
        $data=array(
            'title'=>'User Registration: ',
            'web'=>' For Further information, contact us at:info@mommzi.com or ',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello '.$fullname.','. 'You have been Registered as a/an '. $role.' on Mommzi MS. Created on: '.$created_at,
            'to'=> $to_no,
        );
        $user->notify(new SMSEngine($data));
    }

    public function toEmail($fullname,$position,$created_at, $role,$to_email){
        $data=array(
            'title'=>'User Registration: ',
            'body'=>'User Registration: ',
            'button'=>'Contact Us',
            'from'=>'info@mommzi.org',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello '.$fullname.','. 'You have been Registered as a/an '. $role.' on Mommzi MS. Created on: '.$created_at,
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
