<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Curl
{
    public function post()
    {
        return 'post request was made';
    }
}

class NewsLetter
{
    private $curl;

    function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function addToList($listName)
    {
        $data = [
            'email' => 'foo@bar.baz',
            'list' => $listName
        ];

        return $this->curl->post($data);
    }
}

class ExampleTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function test_adds_user_to_newsletter_list()
    {
        $curl = Mockery::mock(Curl::class);
        $curl->shouldReceive('post')->once()->andReturn('mocked');

        $newsLetter = new NewsLetter($curl);
        $out = $newsLetter->addToList('foo-list');

        $this->assertEquals($out, 'mocked');
    }
}
