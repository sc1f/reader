<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['course_id', 'deadline_id', 'name', 'file_path'];

    public function course() {
        return $this->belongsTo('Course');
    }

    public function deadline() {
        return $this->belongsTo('Deadline');
    }
}
