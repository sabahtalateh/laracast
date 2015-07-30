<?php

namespace spec;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_should_translate_an_empty_string_to_zero()
    {
        $this->add('')->shouldEqual(0);
    }

    function it_should_find_sum_of_one_number()
    {
        $this->add('5')->shouldEqual(5);
    }

    function it_should_find_sum_of_two_numbers()
    {
        $this->add('1,2')->shouldEqual(3);
    }

    function it_should_find_sum_of_any_amount_of_numbers()
    {
        $this->add('1,2,3,4,5')->shouldEqual(15);
    }

    function it_disallow_negative_numbers()
    {
        $this->shouldThrow(new InvalidArgumentException('Invalid number provided: -3'))->duringAdd('2,-3');
    }

    function it_ignores_numbers_greater_then_1000()
    {
        $this->add('2, 2 , 1000')->shouldEqual(4);
    }

    function it_allows_new_line_delimiter()
    {
        $this->add('2,2\n2')->shouldEqual(6);
    }
}
