<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $appends = ['url'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getUrlAttribute() {
        return route('course.episode',[$this->course, $this->episode_number]);
    }
}
