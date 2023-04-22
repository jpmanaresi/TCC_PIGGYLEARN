<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function store(Course $course)
{
    // Validar dados do formulário de criação de aulas
    $data = request()->validate([
        'title' => 'required',
        'content' => 'required',
        'course_id'
        // Adicione outras validações necessárias
    ]);

    // Criar primeira aula relacionada ao curso
    $course->lessons()->create($data);

    // Redirecionar para a view de detalhes do curso, por exemplo
    return redirect("/cursos/{$curso->id}");
}
}
