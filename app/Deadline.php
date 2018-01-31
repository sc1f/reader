<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $fillable = ['course_id', 'datetime'];

    public function course() {
        return $this->belongsTo('Course');
    }
}
