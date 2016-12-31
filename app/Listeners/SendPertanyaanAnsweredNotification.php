<?php

namespace App\Listeners;

use App\Events\PertanyaanAnswered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\PertanyaanAnsweredNotification;
use Notification;
use App\User;

class SendPertanyaanAnsweredNotification implements ShouldQueue
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
    public function handle(PertanyaanAnswered $event)
    {
        Notification::send(User::active()->where('user_id', $event->pertanyaan->user_id)->get(), new PertanyaanAnsweredNotification($event->pertanyaan));
    }
}
