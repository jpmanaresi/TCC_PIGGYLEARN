<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create($lesson_id){
        $lesson = Lesson::Find($lesson_id);
        return view ('courses.lessons.tests.create', [ 'lesson' => $lesson]);
        //return($lesson);
    }
    public function store( Request $request) {
        $test = new Test();
        $test->title = $request->title;
        $test->description = $request->description;
        $test->lesson_id = $request->lesson_id;
        $test->save();
        $lesson = Lesson::Find($test->lesson_id);
        $lesson->update([
            'test_id' => $test->id,
        ]);
        return redirect()->route('courses.edit', ['id' => $lesson->course_id, 'lesson' => $lesson->id]);
    }
    
}

