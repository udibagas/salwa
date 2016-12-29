<?php

namespace App\Listeners;

use App\Events\NewPertanyaan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewPertanyaanNotification;
use Notification;
use App\User;

class SendNewPertanyaanNotification implements ShouldQueue
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
     * @param  NewPertanyaan  $event
     * @return void
     */
    public function handle(NewPertanyaan $event)
    {
        Notification::send(User::active()->ustadz()->get(), new NewPertanyaanNotification($event->pertanyaan));
    }
}
