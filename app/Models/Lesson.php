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
    ];

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }
}
