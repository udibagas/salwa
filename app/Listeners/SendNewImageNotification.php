<?php

namespace App\Listeners;

use App\Events\NewImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewImageNotification;
use Notification;
use App\User;

class SendNewImageNotification implements ShouldQueue
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
     * @param  NewImage  $event
     * @return void
     */
    public function handle(NewImage $event)
    {
        Notification::send(User::active()->get(), new NewImageNotification($event->image));
    }
}
