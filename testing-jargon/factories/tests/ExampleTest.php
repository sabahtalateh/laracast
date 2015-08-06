<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laracasts\TestDummy\Factory;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_fetches_the_users_fullname()
    {
        $user = Factory::build(App\User::class, ['first_name' => 'John', 'last_name' => 'Doe']);

        $this->assertEquals('John Doe', $user->fullName('John Doe'));
    }
}
