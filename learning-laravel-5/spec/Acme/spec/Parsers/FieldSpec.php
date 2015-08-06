<?php

namespace spec\Acme\Parsers;

use Acme\Parsers\Exceptions\UnrecognizedType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FieldSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Parsers\Field');
    }

    function it_parses_fields_into_an_array()
    {
        $this->parse('title:string')
            ->shouldReturn([
                'title' => 'string',
            ]);


        $this->parse('title:string, body:text')
            ->shouldReturn([
                'title' => 'string',
                'body' => 'text'
            ]);

        $this->parse('title:string,body:text')
            ->shouldReturn([
                'title' => 'string',
                'body' => 'text'
            ]);
    }

    function it_squawks_if_the_provided_field_type_is_not_recognized()
    {
        $this->shouldThrow(UnrecognizedType::class)
             ->duringParse('title:foobar');
    }
}
