<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook Member');
$I->wantTo('Post Statuses to My Profile');

$I->signIn();

$I->amOnPage('/statuses');

$I->postAStatus('My First Post');

$I->seeInCurrentUrl('/statuses');
$I->see('My First Post');
