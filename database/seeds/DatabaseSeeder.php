<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Episode;

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
        factory(Course::class, 10)->create()->each(function($course){
            $course->episodes()->saveMany(factory(Episode::class,10)->make());
        });
    }
}
