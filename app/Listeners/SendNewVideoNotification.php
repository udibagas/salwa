<?php

namespace App\Listeners;

use App\Events\NewVideo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewVideoNotification;
use Notification;
use App\User;

class SendNewVideoNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewVideo  $event
     * @return void
     */
    public function handle(NewVideo $event)
    {
        Notification::send(User::active()->get(), new NewVideoNotification($event->video));
    }
}
