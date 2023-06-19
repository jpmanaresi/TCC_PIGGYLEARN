<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public function lesson() {
        return $this->belongsTo('App\Models\Lesson');
    }
    public function questions() {
        return $this->hasMany('App\Models\Question')->orderBy('seq');
    }

    public function user_tests() {
        return $this->belongsToMany ('App\Models\User');
    }
    
    protected $fillable = [
        'title',
        'description',
    ];
    protected static function boot()
    {
        parent::boot();
        
        static::deleting(function ($test) {
            $test->questions()->delete();
            $lesson = Lesson::where('test_id', $test->id)->first();

            if ($lesson) {
                $lesson->update([
                    'hasTest' => false,
                    'test_id' => null,
                ]);
            }
        });
    }
}
