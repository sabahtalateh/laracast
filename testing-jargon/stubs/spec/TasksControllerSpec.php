<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Authorizer;
use Acme\TaskRepository;

class TasksControllerSpec extends ObjectBehavior
{
    function let(Authorizer $authorizer, TaskRepository $repository)
    {
        $this->beConstructedWith($authorizer, $repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\TasksController');
    }

    function it_disallows_guests_to_creating_tasks(Authorizer $authorizer)
    {
        $authorizer->guest()->willReturn(true);

        $this->store()->shouldReturn('redirect');
    }

    function it_creates_a_task(Authorizer $authorizer, TaskRepository $repository)
    {
        $authorizer->guest()->willReturn(false);

        $repository->create('...')->shouldBeCalled();

        $this->store();
    }
}
