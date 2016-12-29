<?php

namespace App\Listeners;

use App\Events\NewPeduli;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewPeduliNotification;
use Notification;
use App\User;

class SendNewPeduliNotification implements ShouldQueue
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
     * @param  NewPeduli  $event
     * @return void
     */
    public function handle(NewPeduli $event)
    {
        Notification::send(User::active()->get(), new NewPeduliNotification($event->peduli));
    }
}
