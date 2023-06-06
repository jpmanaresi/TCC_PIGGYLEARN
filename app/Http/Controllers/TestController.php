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
    public function edit($id, $lesson_id){
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
        $action = $request->input('action');
        if ($action === 'create_questions') {
            // Redirecionar para a página de criação de perguntas, passando o ID do teste
            return redirect()->route('questions.create', ['course'=> $test->lesson->course, 'lesson'=> $test->lesson, 'id' => $test->id])
                ->with('msg', 'Prova criada. Agora você pode adicionar perguntas!');
        } else {
            // Redirecionar para a página de edição do curso relacionado à prova
            return redirect()->route('courses.edit', ['id' => $test->lesson->course_id])
                ->with('msg', 'Prova criada com sucesso!');
        }
    }
    public function update(Request $request, $id)
{
    $test = Test::findOrFail($id);
    $action = $request->input('action');

    if ($action === 'update_test') {
        $test->title = $request->input('title');
        $test->description = $request->input('description');
        $test->save();

        return redirect()->route('courses.edit', ['id' => $test->lesson->course_id, 'lesson' => $test->lesson->id])
            ->with('success', 'Prova atualizada com sucesso!');
    } 
    // Ação inválida, redireciona para algum lugar apropriado ou retorna uma resposta de erro
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

