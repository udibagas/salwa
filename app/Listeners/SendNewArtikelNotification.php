<?php

namespace App\Listeners;

use App\Events\NewArtikel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewArtikelNotification;
use Notification;
use App\User;

class SendNewArtikelNotification implements ShouldQueue
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
     * @param  NewArtikel  $event
     * @return void
     */
    public function handle(NewArtikel $event)
    {
        Notification::send(User::active()->get(), new NewArtikelNotification($event->artikel));
    }
}
