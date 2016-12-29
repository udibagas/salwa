<?php

namespace App\Listeners;

use App\Events\NewHadist;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewHadistNotification;
use Notification;
use App\User;

class SendNewHadistNotification implements ShouldQueue
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
     * @param  NewHadist  $event
     * @return void
     */
    public function handle(NewHadist $event)
    {
        Notification::send(User::active()->get(), new NewHadistNotification($event->hadist));
    }
}
