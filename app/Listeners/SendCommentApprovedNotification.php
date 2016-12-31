<?php

namespace App\Listeners;

use App\Events\CommentApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\CommentApprovedNotification;
use Notification;
use App\User;

class SendCommentApprovedNotification implements ShouldQueue
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
    public function handle(CommentApproved $event)
    {
        Notification::send(User::active()->where('user_id', $event->comment->user_id)->get(), new CommentApprovedNotification($event->comment));
    }
}
