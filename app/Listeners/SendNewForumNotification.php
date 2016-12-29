<?php

namespace App\Listeners;

use App\Events\NewForum;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewForumNotification;
use Notification;
use App\User;

class SendNewForumNotification implements ShouldQueue
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
    public function handle(NewForum $event)
    {
        Notification::send(User::active()->admin()->get(), new NewForumNotification($event->forum));
    }
}
