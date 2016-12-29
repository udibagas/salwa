<?php

namespace App\Listeners;

use App\Events\NewKajian;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewKajianNotification;
use Notification;
use App\User;

class SendNewKajianNotification implements ShouldQueue
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
     * @param  NewKajian  $event
     * @return void
     */
    public function handle(NewKajian $event)
    {
        Notification::send(User::active()->get(), new NewKajianNotification($event->kajian));
    }
}
