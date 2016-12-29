<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Kajian;

class ShowKajian
{
    use InteractsWithSockets, SerializesModels;

    public $kajian;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Kajian $kajian)
    {
        $this->kajian = $kajian;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
