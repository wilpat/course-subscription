<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public function videos()
    {
        return $this->hasMany(Video::class, 'course_id')->orderBy('episode_number', 'asc');
    }
}
