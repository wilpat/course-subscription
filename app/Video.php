<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $appends = ['url'];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function getUrlAttribute() {
        return route('course.episode',[$this->course, $this->episode_number]);
    }
}
