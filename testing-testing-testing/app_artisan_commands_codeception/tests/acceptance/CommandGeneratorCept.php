<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('generate both a command and a hndler class');

$I->runShellCommand('php artisan commander:generate Acme/Bar/FooCommand --properties="bar, baz" --base="tests/tmp"');

$I->seeInShellOutput('All done!');
$I->openFile('tests/tmp/Acme/Bar/FooCommand.php');
$I->seeFileContentsEqual(file_get_contents('tests/acceptance/stub/FooCommand.stub'));
//$I->seeFileFound('tests/tmp/FooCommandHandler.php');