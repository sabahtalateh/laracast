<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StatusWasPublished extends Event
{
    use SerializesModels;
    /**
     * @var
     */
    private $body;

    /**
     * Create a new event instance.
     * @param $body
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
