<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('View my profile');

$I->signIn();
$I->postAStatus('My new Status');

$I->click('Profile');
$I->seeCurrentUrlEquals('/@Foobar');

$I->see('My new Status');
