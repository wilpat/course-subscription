<?php

use Illuminate\Database\Seeder;
use App\Courses;

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
        factory(Courses::class, 10)->create();
    }
}
