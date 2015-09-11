<?php

$factory(App\Users\User::class, function ($faker) {
    return [
        'username' => $faker->username,
        'email' => $faker->email,
        'password' => 'password'
    ];
});

$factory(\App\Statuses\Status::class, function ($faker) {
    return [
        'user_id' => 'factory:' . \App\Users\User::class,
        'body' => $faker->text
    ];
});

//$factory('test', [
//    $faker->text()
//]);
