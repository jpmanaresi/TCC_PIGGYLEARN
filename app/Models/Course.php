<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_title',
        'course_description',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function lessons() {
        return $this->hasMany('App\Models\Lesson');
    }
}
