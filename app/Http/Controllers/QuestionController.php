<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    public function create ($course, $lesson, $id) {
        $test = Test::Find($id);
        $lesson = Lesson::Find($lesson);
        return view('courses.lessons.tests.questions.create', ['course' => $course, 'lesson' => $lesson, $id => $test]);
    }
    public function edit ($test, $id) {
        $test = Question::Find($id);
        $lesson = Test::Find($test);
        return view('courses.lessons.tests.questions.create', ['test' => $test, $id => $question]);
    }

    public function store(Request $request) {
        $request->validate([
            'question' => 'required',
            'alt_1' => 'required',
            'alt_2' => 'required',
            'alt_3' => 'required',
            'alt_4' => 'required',
            'seq' => 'required',
            'answer' => 'required'
        ]);
        $lastSeq = Question::where('test_id', $id)->orderByDesc('seq')->first()?->seq ?? 0;
        $question = new Question; 
        $question->question = $request->question;
        $question->alt_1 = $request->alt_1;
        $question->alt_2 = $request->alt_2;
        $question->alt_3 = $request->alt_3;
        $question->alt_3 = $request->alt_3;
        $question->seq = $lastSeq + 1;
        $question->answer = $request->answer;

        $action= $request->action;

        if ($action==='create_and_new'){
            return redirect()->route('questions.create', ['course' => $test->lesson->course, 'lesson' => $test->lesson, $id => $test]);
        } else {
            return redirect()->route('courses.edit', ['course' => $test->lesson->course]);
        }
    }
}
