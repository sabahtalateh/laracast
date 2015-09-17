<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Follow other users');

# Given
$I->signIn();
$I->haveAnAccount(['username' => 'OtherUser']);

# When
$I->click('Browse users');
$I->click('OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Fallow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

# Then
$I->see('Unfallow OtherUser');
//$I->dontSee('Fallow OtherUser');


$I->click('Unfallow OtherUser');
$I->see('Fallow OtherUser');


