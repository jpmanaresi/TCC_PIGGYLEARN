<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create($id, $lesson_id){
        $lesson = Lesson::Find($lesson_id);
        return view ('courses.lessons.tests.create', [ 'lesson' => $lesson]);
        return($lesson);
    }
    public function store( Request $request) {

        $request->validate([
            'description' =>'required'
        ]);
        $test = new Test();
        $lesson = Lesson::Find($request->lesson_id);
        $test->title = "Avaliação: Aula ".$lesson->seq;
        $test->description = $request->description;
        $test->lesson_id = $request->lesson_id;
        $test->save();
        $lesson->update([
            'test_id' => $test->id,
        ]);
        return redirect()->route('courses.edit', ['id' => $lesson->course_id, 'lesson' => $lesson->id]);
        //return($lesson);
    }
    public function destroy($id, $test_id)
    {
        $test = Test::find($test_id);
        $lesson = Lesson::find($test->lesson_id);
        $course = $lesson->course;

        $test->delete();

        return redirect()->route('courses.edit', ['id' => $course->id]); 

    }
    
}

