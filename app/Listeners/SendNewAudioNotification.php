<?php

namespace App\Listeners;

use App\Events\NewAudio;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewAudioNotification;
use Notification;
use App\User;

class SendNewAudioNotification implements ShouldQueue
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
     * @param  NewAudio  $event
     * @return void
     */
    public function handle(NewAudio $event)
    {
        Notification::send(User::active()->get(), new NewAudioNotification($event->audio));
    }
}
