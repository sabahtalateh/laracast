<?php

$factory(\App\Lesson::class, [
    'title' => $faker->sentence(),
    'body' => $faker->paragraph(),
    'published_at' => \Carbon\Carbon::now()
]);


$factory(App\Episode::class, [
    'title' => $faker->sentence(5),
    'excerpt' => $faker->paragraph(2),
    'position' => $faker->numberBetween(1, 10),
    'series_id' => $faker->numberBetween(1, 5)
]);

$factory(\App\Article::class, [
    'user_id' => 'factory:App\User',
    'title' => $faker->words(3),
    'body' => $faker->paragraph(),
    'published_at' => \Carbon\Carbon::now()->format('Y-m-d'),
    'excerpt' => $faker->sentence()
]);

$factory(\App\Reply::class, [
    'user_id' => 'factory:App\User',
    'article_id' => 'factory:App\Article',
    'body' => $faker->paragraph()
]);

$factory(\App\User::class, [
    'user_name' => $faker->name,
    'email' => $faker->email,
    'password' => bcrypt("password"),
]);

$factory(\App\User::class, 'admin_user', [
    'user_name' => 'Admin',
    'email' => 'admin@admin.com',
    'password' => bcrypt("password"),
]);
