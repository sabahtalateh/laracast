<?php 
$I = new FunctionalTester($scenario);

$I->am('a member');
$I->wantTo('set aside lessons to watch later');

$I->amOnPage('/lessons');
$I->click('.watch-later');
$I->seeInDatabase('watch_later', ['lesson_id' => 5]);

$I->amOnPage('/saves');
$I->see('lesson');
