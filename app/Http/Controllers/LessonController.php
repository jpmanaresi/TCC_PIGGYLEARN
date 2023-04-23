<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
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
            'titulo' => 'required',
            'descricao' => 'required',
            // Adicione outras validações necessárias
        ]);
    
        // Criar primeira aula relacionada ao curso
        $course->lessons()->create($data);
    
        // Redirecionar para a view de detalhes do curso, por exemplo
        return redirect("/cursos/{$course->id}");
    }
}
