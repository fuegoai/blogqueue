<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications\TemplateSlack;
use Notification;
use Queue;
use JobFailed;
use \App\User;
use App\Jobs\SendWelcomeEmail;
use App\Jobs\SendReport;
class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $slackUrl = 'https://hooks.slack.com/services/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';
        // Queue::failing(function (JobFailed $event) {

        //   Log::info("jouk");
        //   dispatch(new SendReport());

        // });
        // Queue::failing(function (JobFailed $event) use ($slackUrl) {
        // //      $user = new User();
        // // $user->notify(new TemplateSlack());
        //   Log::info("ZZ");
        // // dispatch(new SendReport());
        // Log::info("WWW");
        //      // $this->dispatch(new SendReport());
        // // echo "A slack notification has been send";
        // // Notification::route('slack', $slackUrl)->notify(new TemplateSlack($event));
        // });
    }
}
