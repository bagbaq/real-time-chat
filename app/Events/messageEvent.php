<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Laravel\Reverb\Certificate;

class messageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $image;
    public $username;
    public $roomNumber;
    /**
     * Create a new event instance.
     */
    public function __construct($message, $image, $username, $roomNumber)
    {
        $this->message = $message;
        $this->image = $image;
        $this->username = $username;
        $this->roomNumber = $roomNumber;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('room-' . $this->roomNumber),
        ];
    }

    public function broadcastWith(): array {
        return ['message' => $this->message, 'image' => $this->image, 'username' => $this->username];
    }
}
