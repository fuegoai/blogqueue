<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Mail\Mailer;
use App\Notifications\TemplateSlack;
use \App\User;
class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
public function handle(Mailer $mailer)
    {
        $mailer->send('welcomes', ['data'=>'data'], function ($message) {

            $message->from('thanhtutoo95@gmail.com', 'Christian Nwmaba');

            $message->to('thanhtutoo95@gmail.com');

        });
    }

       public function failed($e)
    {
        // Send user notification of failure, etc...
           $user = new User();
        $user->notify(new TemplateSlack());
        echo "A slack notification has been send";
    }
}
