<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Mail;
use \App\User;
use App\Jobs\SendWelcomeEmail;
use App\Jobs\SendReport;
use Notifiable;
use App\Notifications\TemplateEmail;
use App\Notifications\TemplateSlack;

class HomeController extends Controller
{
 public function index()
    {
        return view()->make("home");
    }

    public function notify(){
            $user = new User();
        $user->notify(new TemplateSlack());
        echo "A slack notification has been send";
        // $user = new User();
        // $user->email = 'thanhtutoo95@gmail.com';   // This is the email you want to send to.
        // $user->notify(new TemplateEmail());
        echo "sent";
    }

    public function send()
    {
    	Log::info("Request Cycle with Queues Begins");
        dispatch(new SendWelcomeEmail());
        Log::info("Request Cycle with Queues Ends");
        // Log::info("Request cycle without Queues started");
        // Mail::send('welcome', ['data'=>'data'], function ($message) {

        //     $message->from('thanhtutoo95@gmail.com', 'Christian Nwmaba');

        //     $message->to('heinhtut95@gmail.com');

        // });
        // Log::info("Request cycle without Queues finished");
    }    
    public function report()
    {
        Log::info("GG");
        dispatch(new SendReport());
        Log::info("Request Cycle with Queues Ends");
        // Log::info("Request cycle without Queues started");
        // Mail::send('welcome', ['data'=>'data'], function ($message) {

        //     $message->from('thanhtutoo95@gmail.com', 'Christian Nwmaba');

        //     $message->to('heinhtut95@gmail.com');

        // });
        // Log::info("Request cycle without Queues finished");
    }
}
