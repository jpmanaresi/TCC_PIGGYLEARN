<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\Question;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create($id, $lesson_id){
        $lesson = Lesson::Find($lesson_id);
        return view ('courses.lessons.tests.create', [ 'lesson' => $lesson]);
        //return($lesson);
    }
    public function edit($lesson_id, $id){
        $test= Test::FindOrFail($id);
        $lesson = Lesson::Find($lesson_id);
        $questions= Question::where('test_id',$test->id)->get()->toArray();
        //return($test);
        return view ('courses.lessons.tests.create', [ 'lesson' => $lesson, 'test' => $test, 'questions' => $questions]);
        //return($test);
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
            'hasTest' => 1,
            'test_id' => $test->id,
        ]);
        $action = $request->input('action');
        if ($action === 'create_questions') {
            // Redirecionar para a página de criação de perguntas, passando o ID do teste
            return redirect()->route('questions.create', ['course'=> $test->lesson->course, 'lesson'=> $test->lesson, 'test' => $test->id])
                ->with('msg', 'Prova criada. Agora você pode adicionar perguntas!');
        } else {
            // Redirecionar para a página de edição do curso relacionado à prova
            return redirect()->route('lessons.edit', ['course' => $test->lesson->course_id, 'lesson'=> $test->lesson->id])
                ->with('msg', 'Prova criada com sucesso!');
        }
    }
    public function update(Request $request, $id)
{
    $test = Test::findOrFail($id);
    $action = $request->input('action');

    if ($action === 'update_test') {
        $test->description = $request->input('description');
        $test->save();

        return redirect()->route('courses.edit', ['id' => $test->lesson->course_id, 'lesson' => $test->lesson->id])
            ->with('msg', 'Prova atualizada com sucesso!');
    } 
    // Ação inválida, redireciona para algum lugar apropriado ou retorna uma resposta de erro
}
    public function destroy($id, $test_id)
    {
        $test = Test::find($test_id);

        //return($test->lesson->course->id);
        $test->delete();

        return redirect()->route('lessons.edit', ['course' => $test->lesson->course->id, 'lesson'=> $test->lesson->id]); 

    }
    
}

