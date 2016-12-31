<?php

namespace App\Listeners;

use App\Events\NewPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewPostNotification;
use Notification;
use App\User;
use App\Post;

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
        // kirim notifikasi ke user yang mengikuti forum & admin
        $userList = [];
        $admins = User::active()->admin()->get();
        $posts = Post::where('forum_id', $event->post->forum_id)->get();

        foreach ($admins as $a) {
            $userList[] = $a->user_id;
        }

        foreach ($posts as $p) {
            $userList[] = $p->user_id;
        }

        $users = User::whereIn('user_id', $userList)->active()->get();
        Notification::send($users, new NewPostNotification($event->post));
    }
}
