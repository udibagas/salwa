<?php

namespace App\Listeners;

use App\Events\ForumApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ForumApprovedNotification;
use Notification;
use App\User;

class SendForumApprovedNotification implements ShouldQueue
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
     * @param  NewForum  $event
     * @return void
     */
    public function handle(ForumApproved $event)
    {
        Notification::send(User::active()->where('user_id', $event->forum->user_id)->get(), new ForumApprovedNotification($event->forum));
    }
}
