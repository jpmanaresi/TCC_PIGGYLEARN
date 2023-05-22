<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create(Lesson $lesson){
        $lesson = Lesson::Find($lesson->id);
        return view ('tests.create', [ 'course' => $lesson->course_id, 'lesson' => $lesson->id]);
    }
    public function store(Request $request) {
        $test = new Test();
        $test->title = $request->title;
        $test->description = $request->description;
    }
    
}

