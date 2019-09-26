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
class SendReport implements ShouldQueue
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
        $mailer->send('welcome', ['data'=>'data'], function ($message) {

            $message->from('heinhtut95@gmail.com', 'Report');

            $message->to('thanhtutoo95@gmail.com');

        });
    }

       public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
           $user = new User();
        $user->notify(new TemplateSlack());
        echo "A slack notification has been send";
    }
}
