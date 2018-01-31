<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = array('name', 'department', 'course_code', 'instructor', 'time');

    public function documents(){
        return $this->hasMany('Document');
    }

    public function deadlines(){
        return $this->hasMany('Deadline');
    }
}
