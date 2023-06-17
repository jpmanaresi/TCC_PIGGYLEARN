<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;
class LessonController extends Controller
{
    public function create($id){

        $course = Course::findOrFail($id);
        return view('courses.lessons.create',['course'=> $course]);
    }
    public function edit($id, $lesson_id){

        $course = Course::findOrFail($id);
        $lesson = Lesson::findOrFail($lesson_id);
        $test = Test::find($lesson->test_id);
        
        return view('courses.lessons.create',['course'=> $course, 'lesson' => $lesson, 'test' => $test]);
    }
    public function store(Request $request)
    {
        // Validar dados do formulário de criação de aulas
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            // Adicione outras validações necessárias
        ]);
        $id = $request->id;
        // Criar primeira aula relacionada ao curso
        $lastSeq = Lesson::where('course_id', $id)->orderByDesc('seq')->first()?->seq ?? 0;
        $lesson = new Lesson;
        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->course_id = $request->course_id;
        $lesson->seq = $lastSeq + 1;
        $lesson->save();
        
        if ($request->action==='Criar Aula') {
            
            return redirect()->route('courses.edit', ['id' => $request->course_id]);
    
            }elseif ($request->action==='Adicionar Avaliação?') {
    
                return redirect()->route('tests.create', ['id' => $lesson->course_id, 'lesson' => $lesson->id]);
            }
          
       
        //return($course->lessons()->toArray()); 
    }
    public function update(Request $request) {
        $data=$request->all();
        $lesson = Lesson::findOrFail($request->id);
        $lesson->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            ]);
            // Verificar a condição para redirecionamento
        if ($request->action=== 'Adicionar Avaliação?') {
            $lesson->save();
                return redirect()->route('tests.create', ['id' => $lesson->course_id, 'lesson' => $lesson->id]);
        } else {
                // Caso contrário, apenas salvar as alterações e redirecionar para a rota desejada
                $lesson->save();
                return redirect()->route('courses.edit', ['id' => $lesson->course_id]);
        }
    }
    public function destroy($id, $lesson_id)
{
    $lesson = Lesson::find($lesson_id);
    
    $course = $lesson->course;
    $lesson->delete();

    return redirect()->route('courses.edit', ['id' => $course->id]); 

}
}