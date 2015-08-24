<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;

class Rundd
{
    public function rrr(){}
}

class ExampleTest extends TestCase
{
    function tearDown()
    {
        Mockery::close();
    }

    /**
     * @test
     */
    function it_hashes_a_password()
    {
        Session::start();

        \Illuminate\Support\Facades\Hash::shouldReceive('make')->once()->andReturn('foobar_hashed_password');

        $response = $this->action('POST', 'HashingController@postIndex', [
            'password' => 'foobar_password',
            '_token' => csrf_token()
        ]);

        $this->assertEquals('Your hash is foobar_hashed_password', $response->getContent());
    }
}
