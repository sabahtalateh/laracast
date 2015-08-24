<?php

namespace spec\App\Http\Controllers;

use App\Events\PostWasPublished;
use Illuminate\Contracts\Events\Dispatcher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostsControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Http\Controllers\PostsController');
    }

    function it_fires_a_social_notification_event_on_store_a_post(Dispatcher $events)
    {
        $message = 'Test Message';

        $events->fire(new PostWasPublished($message))->shouldBeCalled();

        $this->store($message, $events);
    }
}
