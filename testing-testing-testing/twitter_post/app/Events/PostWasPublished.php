<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostWasPublished extends Event
{
    use SerializesModels;
    /**
     * @var
     */
    private $mess;

    /**
     * Create a new event instance.
     *
     * @param $mess
     */
    public function __construct($mess)
    {
        $this->mess = $mess;
    }

    /**
     * @return mixed
     */
    public function getMess()
    {
        return $this->mess;
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
