<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
class LessonController extends Controller
{
    public function create($id){

        $course = Course::findOrFail($id);
        return view('courses.lessons.create',['course'=> $course]);
    }
    public function edit($id, $lesson_id){

        $course = Course::findOrFail($id);
        $lesson = Lesson::findOrFail($lesson_id);

        return view('courses.lessons.create',['course'=> $course, 'lesson' => $lesson]);
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
        $lesson->hasTest = $request->filled('hasTest') ? $request->hasTest : false;
        $lesson->seq = $lastSeq + 1;
        $lesson->save();
        
        
        if ($lesson->hasTest != true){
        // Redirecionar para a view de detalhes do curso, por exemplo
        return redirect()->route('courses.edit', ['id' => $request->course_id]);
        } else {
          return view('courses.lessons.tests.create',['lesson'=> $lesson->id]);
            }
       
        //return($course->lessons()->toArray()); 
    }
    public function update(Request $request) {
        $data=$request->all();
        $lesson = Lesson::findOrFail($request->id);
        $lesson->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'hasTest' => $request->filled('hasTest') ? $request->hasTest : false,
            ]);

        return redirect()->route('courses.edit', ['id' => $request->course_id]);
    }
}