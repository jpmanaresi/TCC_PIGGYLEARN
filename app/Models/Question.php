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

    protected $fillable= [
        'question',
        'alt_1',
        'alt_2',
        'alt_3',
        'alt_4',
        'answer',
        'seq'
    ];
}
