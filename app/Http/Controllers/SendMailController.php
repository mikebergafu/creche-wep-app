<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    /**

     * Show the application sendMail.

     *

     * @return \Illuminate\Http\Response

     */

    public function sendMail()

    {

        $content = [

            'title'=> 'Itsolutionstuff.com mail',

            'body'=> 'The body of your message.',

            'button' => 'Click Here'

        ];


        $receiverAddress = 'mikebergafu@gmail.com';


        Mail::to($receiverAddress)->send(new Message($content));


        dd('mail send successfully');

    }
}
