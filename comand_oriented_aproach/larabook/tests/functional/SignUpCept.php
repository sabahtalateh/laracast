<?php

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a Larabook account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username', 'John Doe');
$I->fillField('Email', 'john@example.com');
$I->fillField('Password', 'password');
$I->fillField('Password Confirmation', 'password');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome here');
$I->seeRecord('users', [
    'username' => 'John Doe'
]);

$I->assertTrue(\Auth::check());

