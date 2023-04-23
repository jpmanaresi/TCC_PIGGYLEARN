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
    public function store(Course $course, Request $request)
    {
        // Validar dados do formulário de criação de aulas
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            // Adicione outras validações necessárias
        ]);
    
        // Criar primeira aula relacionada ao curso
        $lesson = new Lesson;
        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->course_id = $request->course_id;
        $lesson->hasTest = $request->hasTest;
        $lesson->hasTest = $request->filled('hasTest') ? $request->hasTest : false;
        $lesson->save();
        
        if ($lesson->hasTest != true){
        // Redirecionar para a view de detalhes do curso, por exemplo
        return redirect("/courses/create/{$course->id}");
        } else {
            return view('courses.lessons.tests.create',['lesson'=> $lesson->id]);
        }
    }
}