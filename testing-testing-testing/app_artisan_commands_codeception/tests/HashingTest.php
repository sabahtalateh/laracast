<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class HashingTest extends TestCase
{
    /**
     * @test
     */
    function it_hashes_a_provided_password()
    {
        $response = $this->action('POST', 'HashingController@postIndex');

        dd($response->getContent());
    }
}
