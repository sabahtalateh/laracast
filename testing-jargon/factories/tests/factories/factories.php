<?php
$factory(\App\User::class, [
    'first_name' => $faker->name,
    'last_name' => $faker->lastName,
    'email' => $faker->email,
    'password' => bcrypt("password"),
]);
