<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Buku;

class NewKitab
{
    use InteractsWithSockets, SerializesModels;

    public $kitab;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Buku $kitab)
    {
        $this->kitab = $kitab;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('new-kitab');
    }
}
