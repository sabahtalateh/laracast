<?php

namespace spec\Acme\Parsers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Parsers\TagParser');
    }

    function it_parse_comma_separated_list_into_array()
    {
        $this->parse('foo,bar,baz')->shouldReturn(['foo', 'bar', 'baz']);
        $this->parse('foo, bar, baz')->shouldReturn(['foo', 'bar', 'baz']);
    }

    function it_allows_a_pipe_separator()
    {
        $this->parse('foo|bar|baz')->shouldReturn(['foo', 'bar', 'baz']);
    }
}
