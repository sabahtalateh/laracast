<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;
use Laracasts\TestDummy\Factory as TestDummy;

class ExampleTest extends IntegrationTest
{
    protected $baseUrl = 'http://localhost:8000';

    /** @test */
    public function it_displays_all_posts()
    {
        TestDummy::create('App\Posts');

        $this->visit('/posts');
    }
}
