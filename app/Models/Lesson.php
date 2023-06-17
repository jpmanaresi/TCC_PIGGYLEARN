<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'content',
        'hasTest',
        'test_id'
    ];

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function test() { 
        return $this->hasOne('App\Models\Test');
    }
    
    public function user_lessons() {
        return $this->belongsToMany ('App\Models\User');
    }
    
    protected static function boot()
    {
        parent::boot();

        // Evento 'deleting' para excluir o Test antes de excluir a Lesson
        static::deleting(function ($lesson) {
            $test = $lesson->test;
            $courseId = $lesson->course_id;
            $seq = $lesson->seq;
            if ($test) {
                $test->delete();
            }

            // Atualizar o campo 'seq' das lessons com 'seq' maior que a lesson sendo excluída
            Lesson::where('course_id', $courseId)
                ->where('seq', '>', $seq)
                ->decrement('seq');

                
        });
    }
}
