<?php

namespace spec\App\Handlers\Events;

use App\Events\PostWasPublished;
use App\Handlers\Events\MakeATwitt;
use App\Social\TwitterPublisher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MakeATwittSpec extends ObjectBehavior
{
    public function let(TwitterPublisher $publisher)
    {
        $this->beConstructedWith($publisher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(MakeATwitt::class);
    }

    function it_publishes_a_status_when_a_post_is_created(TwitterPublisher $publisher)
    {
        $status = 'Test Status';

        $publisher->publish($status)->shouldBeCalled();
        $this->handle(new PostWasPublished($status));
    }
}
