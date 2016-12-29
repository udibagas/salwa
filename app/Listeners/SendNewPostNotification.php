<?php

namespace App\Listeners;

use App\Events\NewPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewPostNotification;
use Notification;
use App\User;

class SendNewPostNotification implements ShouldQueue
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
     * @param  NewPost  $event
     * @return void
     */
    public function handle(NewPost $event)
    {
        Notification::send(User::active()->get(), new NewPostNotification($event->post));
    }
}
