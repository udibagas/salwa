<?php

namespace App\Listeners;

use App\Events\NewKitab;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewKitabNotification;
use Notification;
use App\User;

class SendNewKitabNotification implements ShouldQueue
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
     * @param  NewKitab  $event
     * @return void
     */
    public function handle(NewKitab $event)
    {
        Notification::send(User::active()->get(), new NewKitabNotification($event->kitab));
    }
}
