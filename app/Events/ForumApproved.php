<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Forum;

class ForumApproved
{
    use InteractsWithSockets, SerializesModels;

    public $forum;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Forum $forum)
    {
        $this->forum = $forum;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('forum-approved');
    }
}
