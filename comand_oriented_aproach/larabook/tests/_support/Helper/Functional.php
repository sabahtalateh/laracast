<?php
namespace Helper;

use App\Statuses\Status;
use App\Users\User;
use Codeception\Module\Laravel5;
use Laracasts\TestDummy\Factory;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Functional extends \Codeception\Module
{
    public function signIn()
    {
        $username = 'Foobar';
        $email = 'example@example.com';
        $password = 'password';

        $this->haveAnAccount(compact('username', 'email', 'password'));

        $I = $this->getModule('Laravel5');

        $I->amOnPage('/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('Sign In');
    }

    public function haveAnAccount($overrides = [])
    {
        $this->have(User::class, $overrides);
    }

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel5');

        $I->fillField('status', $body);
        $I->click('Post Status');
    }

    public function have($model, $overrides = [])
    {
        return Factory::create($model, $overrides);
    }
}
