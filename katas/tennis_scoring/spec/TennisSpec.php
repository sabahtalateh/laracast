<?php

namespace spec\Acme;

use Acme\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisSpec extends ObjectBehavior
{
    protected $john;
    protected $jane;

    function let()
    {
        $this->john = new Player('John Doe', 0);
        $this->jane = new Player('Jane Doe', 0);

        $this->beConstructedWith($this->john, $this->jane);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Tennis');
    }

    function it_scores_pointless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }

    function it_scores_1_0_game()
    {
        $this->john->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_2_0_game()
    {
        $this->john->earnPoints(2);
        $this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_3_0_game()
    {
        $this->john->earnPoints(3);
        $this->score()->shouldReturn('Forty-Love');
    }

    function it_scores_4_0_game()
    {
        $this->john->earnPoints(4);
        $this->score()->shouldReturn('Win for John Doe');
    }

    function it_scores_0_4_game()
    {
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Win for Jane Doe');
    }

    function it_scores_4_3_game()
    {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);
        $this->score()->shouldReturn('Advantage John Doe');
    }

    function it_scores_3_4_game()
    {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Advantage Jane Doe');
    }

    function it_scores_4_4_game()
    {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_8_8_game()
    {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(8);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_8_9_game()
    {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(9);
        $this->score()->shouldReturn('Advantage Jane Doe');
    }

    function it_scores_8_10_game()
    {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(10);
        $this->score()->shouldReturn('Win for Jane Doe');
    }
}
