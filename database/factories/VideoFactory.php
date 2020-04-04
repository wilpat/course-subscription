<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->colorName,
        'description' => $faker->paragraph(20),
        // 'course_id' => $faker->numberBetween(1,10), 
        'vimeo_video_id' => $faker->numberBetween(1,10), 
        'episode_number' => $faker->numberBetween(1,15)
    ];
});
