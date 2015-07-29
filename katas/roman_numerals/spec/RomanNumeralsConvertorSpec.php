<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralsConvertorSpec extends ObjectBehavior
{
    function it_should_returns_I_for_1()
    {
        $this->convert(1)->shouldReturn('I');
    }

    function it_should_returns_II_for_2()
    {
        $this->convert(2)->shouldReturn('II');
    }

    function it_should_returns_IV_for_4()
    {
        $this->convert(4)->shouldReturn('IV');
    }

    function it_should_returns_V_for_5()
    {
        $this->convert(5)->shouldReturn('V');
    }

    function it_should_returns_VI_for_6()
    {
        $this->convert(6)->shouldReturn('VI');
    }

    function it_should_returns_IX_for_9()
    {
        $this->convert(9)->shouldReturn('IX');
    }

    function it_should_returns_X_for_10()
    {
        $this->convert(10)->shouldReturn('X');
    }

    function it_should_returns_XI_for_11()
    {
        $this->convert(11)->shouldReturn('XI');
    }

    function it_should_returns_XX_for_20()
    {
        $this->convert(20)->shouldReturn('XX');
    }

    function it_should_returns_L_for_50()
    {
        $this->convert(50)->shouldReturn('L');
    }

    function it_should_returns_C_for_100()
    {
        $this->convert(100)->shouldReturn('C');
    }

    function it_should_returns_D_for_500()
    {
        $this->convert(500)->shouldReturn('D');
    }

    function it_should_returns_M_for_1000()
    {
        $this->convert(1000)->shouldReturn('M');
    }

    function it_should_returns_MCMXCIX_for_1999()
    {
        $this->convert(1999)->shouldReturn('MCMXCIX');
    }

    function it_should_returns_MMMMCMXC_for_4990()
    {
        $this->convert(4990)->shouldReturn('MMMMCMXC');
    }

    function it_should_returns_MCCXXXIV_for_1234()
    {
        $this->convert(1234)->shouldReturn('MCCXXXIV');
    }
}
