<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function episodes()
    {
        return $this->hasMany(Episode::class, 'course_id')->orderBy('episode_number', 'asc');
    }
}
