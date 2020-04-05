<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Episode;
use Faker\Generator as Faker;

$factory->define(Episode::class, function (Faker $faker) {
    return [
        'title' => $faker->colorName,
        'description' => $faker->paragraph(20),
        'episode_number' => $faker->numberBetween(1,15)
    ];
});
