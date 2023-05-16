<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create(Lesson $lesson){
        $lesson = Lesson::Find($lesson->id);
        return view ('tests.create', ['lesson' => $lesson->id]);
    }
}
