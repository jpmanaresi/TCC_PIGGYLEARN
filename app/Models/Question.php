<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function test() {
        return $this->belongsTo('App\Models\Test');
    }

    public function user_questions() {
        return $this->belongsToMany ('App\Models\User');
    }

    protected $fillable= [
        'question',
        'alt_1',
        'alt_2',
        'alt_3',
        'alt_4',
        'answer',
        'seq'
    ];

    protected static function boot()
    {
        parent::boot();

        // Evento 'deleting' para excluir o Test antes de excluir a Lesson
        static::deleting(function ($question) {
            $testId = $question->test_id;
            $seq = $question->seq;
            

            // Atualizar o campo 'seq' das lessons com 'seq' maior que a lesson sendo excluída
            Question::where('test_id', $testId)
                ->where('seq', '>', $seq)
                ->decrement('seq');
        });
    }
}
