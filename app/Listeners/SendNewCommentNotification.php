<?php

namespace App\Listeners;

use App\Events\NewComment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewCommentNotification;
use Notification;
use App\User;

class SendNewCommentNotification implements ShouldQueue
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
     * @param  NewComment  $event
     * @return void
     */
    public function handle(NewComment $event)
    {
        Notification::send(User::active()->admin()->get(), new NewCommentNotification($event->comment));
    }
}
