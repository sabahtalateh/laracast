<?php

namespace spec\Acme\Support;

use Acme\Support\Sanitizer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SanitizerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf(\spec\Acme\Support\TestSanitizer::class);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Sanitizer');
    }

    function it_sanitize_data_against_a_set_rules()
    {
        $this->sanitize(
            ['slug' => 'SOME-SLUG'], //some-slug
            ['slug' => 'strtolower']
        )->shouldReturn(['slug' => 'some-slug']);

        $this->sanitize(
            ['first' => 'john'], //some-slug
            ['first' => 'ucwords', 'last' => 'ucwords']
        )->shouldReturn(['first' => 'John']);
    }

    function it_can_apply_multiple_sanitizers()
    {
        $this->sanitize(
            ['name' => ' john doe '],
            ['name' => 'trim|ucwords']
        )->shouldReturn([
            'name' => 'John Doe'
        ]);
    }

    function it_allow_sanitizers_to_be_an_array()
    {
        $this->sanitize(
            ['name' => ' john doe '],
            ['name' => ['trim', 'ucwords']]
        )->shouldReturn([
            'name' => 'John Doe'
        ]);
    }

    function it_fetches_rules_off_of_a_subclass_if_they_are_not_passed_in()
    {
        $this->sanitize(['name' => '  john'])
            ->shouldReturn(['name' => 'John']);
    }

    function it_allows_for_custom_sanitization()
    {
        $this->sanitize(['phone' => '555-555-5555'])
            ->shouldReturn(['phone' => '5555555555']);
    }
}

class TestSanitizer extends Sanitizer
{
    protected $rules = [
        'name' => 'trim|ucwords',
        'phone' => 'phone'
    ];

    public function sanitizePhone($value)
    {
        return str_replace('-', '', $value);
    }
}
