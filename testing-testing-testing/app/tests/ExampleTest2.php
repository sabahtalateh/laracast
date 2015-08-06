<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Fooo
{
    protected $baar;

    function __construct(Baar $baar)
    {
        $this->baar = $baar;
    }

    public function fire()
    {
        return $this->baar->doIt([]);
    }
}

class Baar
{
    public function doIt(array $ar)
    {
        return 'doing it';
    }
}



class ExampleTest2 extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testFoo()
    {
        $baar = Mockery::mock('Baar');
        $baar->shouldReceive('doIt')->once()->with([])->andReturn('mocked');
        $foo = new Fooo($baar);
        $output = $foo->fire();

        $this->assertEquals('mocked', $output);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->call('GET', 'buy');
        $this->assertRedirectedToRoute('home', [], ['flash_message' => 'Foo']);
//        $this->call('GET', '/');
//        $this->assertResponseOk();
//        $this->visit('/')
//             ->see('Laravel 5');
    }

    public function testAbout()
    {
        $this->call('GET', 'about');

        $this->assertViewHas('tags');
    }
}
