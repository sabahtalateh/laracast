<?php

namespace spec\App\Http\Controllers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArticlesControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Http\Controllers\ArticlesController');
    }

    function it_must_return_1()
    {
        $this->r()->shouldBe(1);
    }
}
