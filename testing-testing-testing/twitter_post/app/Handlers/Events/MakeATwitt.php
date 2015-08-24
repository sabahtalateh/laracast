<?php

namespace App\Handlers\Events;

use App\Events\PostWasPublished;
use App\Social\PublisherContract;
use App\Social\TwitterPublisher;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MakeATwitt
{
    /**
     * @var PublisherContract
     */
    private $publisher;

    /**
     * Create the event handler.
     *
     * @param PublisherContract|TwitterPublisher $publisher
     */
    public function __construct(TwitterPublisher $publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * Handle the event.
     *
     * @param  PostWasPublished  $event
     * @return void
     */
    public function handle(PostWasPublished $event)
    {
        $this->publisher->publish($event->getMess());
    }
}
