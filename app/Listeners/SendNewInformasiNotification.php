<?php

namespace App\Listeners;

use App\Events\NewInformasi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewInformasiNotification;
use Notification;
use App\User;

class SendNewInformasiNotification implements ShouldQueue
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
     * @param  NewInformasi  $event
     * @return void
     */
    public function handle(NewInformasi $event)
    {
        Notification::send(User::active()->get(), new NewInformasiNotification($event->informasi));
    }
}
