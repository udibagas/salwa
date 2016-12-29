<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Hadist;

class NewHadist
{
    use InteractsWithSockets, SerializesModels;

    public $hadist;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Hadist $hadist)
    {
        $this->hadist = $hadist;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('new-hadist');
    }
}
