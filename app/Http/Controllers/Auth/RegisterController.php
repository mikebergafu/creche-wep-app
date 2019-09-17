<?php

namespace App\Http\Controllers\Auth;

use App\Mail\MommziMSMail;
use App\Notifications\SMSEngine;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'super_admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'position' => 'string|max:255',
            'username' => 'string|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
            'role' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return (new \App\User)->create([
            'fullname' => $data['fullname'],
            'position'=>$data['position'],
            'username'=>$data['username'],
            'role'=>$data['role'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    public  function  toSMS($child_name,$to_no,$caretaker, $at){
        $user= (new \App\User)->first();
        $data=array(
            'title'=>'User Registration: ',
            'web'=>' For Further information, contact us at:info@mommzi.com or ',
            'tel'=>' Call us on (+233) 302000000. ',
            'message'=> 'Hello, Our Caretaker, '.$caretaker. ' has confirmed Receipt of your Child '.$child_name.' at '.$at ,
            'to'=> $to_no,
        );
        $user->notify(new SMSEngine($data));
    }

    public function toEmail($child_name,$to_email,$caretaker, $at){
        $data=array(
            'title'=>'User Registration: ',
            'body'=>'User Registration: ',
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
}
