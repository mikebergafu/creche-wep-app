<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Nexmo\Client;
use Nexmo\Laravel\Facade\Nexmo;
use NotificationChannels\Hubtel\HubtelChannel;
use NotificationChannels\Hubtel\HubtelMessage;


class SMSController extends Controller
{

    public function via($notifiable)
    {
        return [HubtelChannel::class];
    }

    public function toSMS($notifiable)
    {
        return (new HubtelMessage)
            ->from("Mommzi 4")
            ->to("233246102372")
            ->content("Kim Kippo... Sup with you");
    }

    function sendSms($to){
        Nexmo::message()->send([
            'to'   => $to,
            'from' => 'Mommzi KMS',
            'text' => 'Once the middleware has been defined in the HTTP kernel, you may use the middleware method to assign middleware to a route: Groups may be assigned to routes and controller actions using the same syntax as individual middleware. Powered by: http://dewonyo.com/'
        ]);
    }
}
