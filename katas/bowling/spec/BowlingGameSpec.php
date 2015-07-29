<?php

namespace spec;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    function it_scores_a_gutter_game_to_zero()
    {
        $this->rollTimes(20, 0);
        $this->score()->shouldBe(0);
    }

    function it_scores_all_knocked_down_pins_for_a_game()
    {
        $this->rollTimes(20, 1);
        $this->score()->shouldBe(20);
    }

    function it_award_a_one_roll_bonus_for_every_spare()
    {
        $this->rollSpare();
        $this->roll(5); // spare adds 10 to 5, and 5 at roll. 10+5+5=20
        $this->rollTimes(17, 0);
        $this->score()->shouldBe(20);
    }

    function it_awards_a_two_roll_bonus_for_a_strike()
    {
        $this->roll(10);
        $this->roll(2);
        $this->roll(7); // 10+2+7=19 19+2+7=28
        $this->rollTimes(17, 0);
        $this->score()->shouldBe(28);
    }

    function it_takes_exception_on_invalid_rolls()
    {
        $this->shouldThrow(InvalidArgumentException::class)->duringRoll(-10);
    }

    function it_scores_a_perfect_game()
    {
        $this->rollTimes(12, 10);
        $this->score()->shouldBe(300);
    }

    private function rollSpare()
    {
        $this->roll(2);
        $this->roll(8);
    }

    private function rollTimes($times, $pins)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->roll($pins);
        }
    }

}
