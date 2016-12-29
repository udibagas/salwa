<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Pertanyaan;

class NewPertanyaan
{
    use InteractsWithSockets, SerializesModels;

    public $pertanyaan;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Pertanyaan $pertanyaan)
    {
        $this->pertanyaan = $pertanyaan;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('new-pertanyaan');
    }
}
