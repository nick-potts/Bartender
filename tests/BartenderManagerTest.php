<?php

use DirectoryTree\Bartender\BartenderManager;
use DirectoryTree\Bartender\Facades\Bartender;
use DirectoryTree\Bartender\Tests\User;

test('it can register handlers', function () {
    $manager = new BartenderManager();

    $manager->serve('foo', stdClass::class);

    expect($manager->handlers())->toBe(['foo' => stdClass::class]);
});

test('it returns new user model', function () {
    $manager = new BartenderManager();

    $manager->setUserModel(User::class);

    expect($manager->getUserModel())->toBe(User::class);
});

test('it is bound to facade', function () {
    expect(Bartender::getFacadeRoot())->toBeInstanceOf(BartenderManager::class);
});
