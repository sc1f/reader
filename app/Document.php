<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['course_id', 'deadline_id', 'name', 'file_path'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function deadline() {
        return $this->belongsTo('App\Deadline');
    }
}
