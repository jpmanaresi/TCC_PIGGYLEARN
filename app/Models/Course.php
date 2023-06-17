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
        'setvisible'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function lessons() {
        return $this->hasMany('App\Models\Lesson')->orderBy('seq');
    }
    public function user_courses() {
        return $this->belongsToMany ('App\Models\User');
    }
    
    protected static function boot()
    {
        parent::boot();

        // Evento 'deleting' para deletar as lessons relacionadas
        static::deleting(function ($course) {
            $course->lessons()->delete();
        });
    }
}
