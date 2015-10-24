<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('I want to view my profile.');

$I->signIn();
$I->postAStatus('My new status.');

$I->click('Your Profile');
$I->seeCurrentUrlEquals('/@foobar');

$I->see('My new Status.');