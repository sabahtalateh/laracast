<?php

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

class ExampleTest extends IntegrationTest
{
    protected $baseUrl = 'http://localhost:8887';

    /** @test */
    function it_loads_the_home_page()
    {
        $this->visit('/')->see('Hello World');
    }

    /** @test */
    function it_loads_the_about_page()
    {
        $this->visit('about.php')
            ->andClick('Contact Me')
            ->andSeePageIs('contact.php');
    }

    /** @test */
    function it_searches_for_things()
    {
        $this->visit('/search.php')
            ->andType('integration testing', 'query')
            ->press('Search')
            ->andSee('Search results for "integration testing"')
            ->onPage('/search-results.php')
//            ->submitForm('Search', [])
            ;
    }
}