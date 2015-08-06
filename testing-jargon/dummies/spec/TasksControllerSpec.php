<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Authorizer;

class TasksControllerSpec extends ObjectBehavior
{
    function let(Authorizer $authorizer)
    {
        $this->beConstructedWith($authorizer);
    }

    function it_should_return_a_specific_task(Authorizer $authorizer)
    {
        $authorizer->guest()->willReturn(false);
        $this->show()->shouldReturn('a task');
    }
}
