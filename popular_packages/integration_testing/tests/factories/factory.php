<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;


$factory(Song::class, function ($faker) {
    $name = 'sweet ' . $faker->word . ' of ' . $faker->city;

    return [
        'name' => $name,
        'length' => 200,
        'album_id' => 'factory:' . Album::class
    ];
});

$factory(Album::class, function ($faker) {
    $name = 'The ' . ucfirst($faker->word);

    return [
        'name' => $name,
        'artist_id' => 'factory:' . Artist::class
    ];
});

$factory(Artist::class, function ($faker) {
    $name = ucfirst($faker->colorName) . ' ' . ucfirst($faker->name);

    return [
        'name' => $name
    ];
});
