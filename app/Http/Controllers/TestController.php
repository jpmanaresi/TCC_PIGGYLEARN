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

    if ($action === 'Atualizar Avaliação') {
        $test->description = $request->input('description');
        $test->save();

        return redirect()->route('lessons.edit', ['course' => $test->lesson->course_id, 'lesson' => $test->lesson->id])
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
    public function show($course,$lesson,$test){
        $test = Test::FindOrFail($test);
        $user = auth()->user();
        $passed = $user->user_tests()->where('test_id', $test->id)->wherePivot('passed', true)->exists();
        
        return view('courses.lessons.tests.show', ['course' => $test->lesson->course_id, 'lesson'=>$lesson, 'test' => $test, 'passed' =>$passed]);
    }
    public function start($course, $lesson, $test){
        $test= Test::findOrFail($test);
        $user= auth()->user();
        $user->user_tests()->syncWithoutDetaching([
            $test->id => ['passed' => false]
        ]);
        $firstQuestion= Question::where('test_id', $test->id)->orderBy('seq')->firstOrFail();
        return redirect()->route('questions.show',
        ['course'=>$test->lesson->course->id,
        'lesson' => $test->lesson_id,
        'test' => $test->id,
        'question' => $firstQuestion->id
        ]);
    }
    public function end($test){
        $user = auth()->user();
        $test = Test::FindOrFail($test);
        $passed = $user->user_tests()->where('test_id', $test->id)->wherePivot('passed', true)->exists();
        if(!$passed) {
            $user->user_questions()->whereHas('test', function ($query) use ($test) {
                $query->where('id', $test->id);
            })->updateExistingPivot($test->id, ['passed' => false]);
        }
        return view('courses.lessons.tests.end', ['test' => $test, 'completed'=> $passed]);
    }

    public function nextlesson($course,$lesson,$test,Request $request) {
        $user = auth()->user();
        $test = Test::findOrFail($test);
        $lesson = Lesson::findOrFail($lesson);
        $nextLesson = Lesson::where('course_id', $lesson->course_id)->where('seq', '>', $lesson->seq)->orderBy('seq')->first()?->id ?? 0; // Se for a última lição do curso, seta o valor para 0
        $completed = $request->completed;
    // Verificar se o teste foi passado

        if ($completed == 1) {
        // Teste passado, redirecionar para a próxima aula
        $user->user_lessons()->syncWithoutDetaching([
            $lesson->id => ['completed' => true]
        ]);
        if ($nextLesson == 0) {
            $user->user_courses()->updateExistingPivot($lesson->course->id, ['completed' => true]);
            return redirect()->route('home')->with('msg', "Curso completo!");
        }
        if($nextLesson->hasTest==true){
            $test = Test::where('lesson_id',$lesson->id)->first();
            return redirect()->route('tests.show', ['course'=> $lesson->course_id, 'lesson'=> $lesson->id, 'test'=>$test->id]);
        }
        return redirect()->route('lessons.show', ['course'=> $lesson->course_id, 'lesson' => $nextLesson->id]);
    } else {
        // Teste não passado, redirecionar para a lição atual
        return redirect()->route('lessons.show', ['course'=> $test->lesson->course_id, 'lesson' => $test->lesson_id]);
    }

    // Caso haja mais lógica adicional, pode ser adicionada aqui

    return redirect()->back();
    }
}

