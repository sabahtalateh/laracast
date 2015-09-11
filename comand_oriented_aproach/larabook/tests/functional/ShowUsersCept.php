<?php 
$I = new FunctionalTester($scenario);
$I->am('a larabook member');
$I->wantTo('Review registered users');

# Given
$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');

