<?php

namespace spec\App\Http\Controllers;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HashingControllerSpec extends ObjectBehavior
{
    function let(Hasher $hasher, Request $request)
    {
        $this->beConstructedWith($hasher, $request);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Http\Controllers\HashingController');
    }

    function it_hashes_a_password(Hasher $hasher, Request $request)
    {
        $request->get('password')->shouldBeCalled();
        $hasher->make(Argument::any())->shouldBeCalled()->willReturn('foobar_hashed_password');


        $this->postIndex()->shouldReturn('Your hash is foobar_hashed_password');
    }
}
