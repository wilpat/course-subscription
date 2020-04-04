<?php

use Illuminate\Database\Seeder;
use App\Courses;
use App\Video;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(Courses::class, 10)->create()->each(function($course){
            $course->videos()->saveMany(factory(Video::class,10)->make());
        });
    }
}
