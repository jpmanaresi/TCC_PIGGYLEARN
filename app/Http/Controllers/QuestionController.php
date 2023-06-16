<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Test;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    public function create ($course, $lesson, $id) {
        $test = Test::Find($id);
        $lesson = Lesson::Find($lesson);
        //return ($test);
        return view('courses.lessons.tests.questions.create', ['course' => $test->lesson->course, 'lesson' => $lesson, 'test' => $test]);
    }
    public function edit ($test, $id) {
        $question = Question::Find($id);
        $test = Test::Find($test);
        //return($question);
        return view('courses.lessons.tests.questions.create', ['test' => $test, 'question' => $question]);
    }

    public function store(Request $request) {
       /* $request->validate([
            'question' => 'required',
            'alt_1' => 'required',
            'alt_2' => 'required',
            'alt_3' => 'required',
            'alt_4' => 'required',
            'seq' => 'required',
            'answer' => 'required'
        ]);*/
        $lastSeq = Question::where('test_id', $request->test_id)->orderByDesc('seq')->first()?->seq ?? 0;
        $question = new Question; 
        $question->seq = $lastSeq + 1;
        $question->question = $request->question;
        $question->alt_1 = $request->alt_1;
        $question->alt_2 = $request->alt_2;
        $question->alt_3 = $request->alt_3;
        $question->alt_4 = $request->alt_4;
        $question->answer = 0;
        $question->test_id = $request->test_id;
        $question->save();

        $action= $request->action;
        //return ($request);
        if ($action==='create_and_new'){
            return redirect()->route('questions.create', ['course' => $question->test->lesson->course, 'lesson' => $question->test->lesson, 'test' => $question->test]);
        } else {
            
            return redirect()->route('tests.edit', ['lesson' => $question->test->lesson, 'test'=> $question->test_id]);
        }
    }
    public function update(Request $request, $id){
        $question = Question::FindOrFail($id);
        $question->update([
            'question' => $request->question,
            'alt_1' => $request->alt_1,
            'alt_2' => $request->alt_2,
            'alt_3' => $request->alt_3,
            'alt_4' => $request->alt_4,
            'answer' => 0
        ]);
        $action= $request->action;
        //return ($request);
        if ($action==='create_and_new'){
            return redirect()->route('questions.create', ['course' => $question->test->lesson->course, 'lesson' => $question->test->lesson, 'test' => $question->test]);
        }else{
            return redirect()->route('tests.edit',['lesson'=>$question->test->lesson, 'test'=> $question->test]);
        }
    }
    public function destroy($id)
    {
        $question = Question::find($id);

        //return($test->lesson->course->id);
        $question->delete();

        return redirect()->route('tests.edit', 
        ['course' => $question->test->lesson->course->id,
        'lesson'=> $question->test->lesson->id,
        'test'=> $question->test->id]); 

    }
}
