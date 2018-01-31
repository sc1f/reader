<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = array('name', 'department', 'course_code', 'instructor', 'time', 'user_id');

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function documents(){
        return $this->hasMany('App\Document');
    }

    public function deadlines(){
        return $this->hasMany('App\Deadline');
    }
}
