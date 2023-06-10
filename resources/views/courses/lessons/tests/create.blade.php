@extends('layouts.main')

@section('title', 'PL - Criar Teste')
    
@section('content')

<div class="container" id="lesson-form-container">
    <form method="POST" action="{{ isset($test) ? route('tests.update', $test->id) : route('tests.store') }}">
        @csrf

        @if(isset($test))
            @method('PUT')
        @endif
        <input type="hidden" name="lesson_id" value="{{  $lesson->id }}">
        <input type="hidden" name="test_id" value="{{ isset($test) ? $test->id : '' }}">

        <div class="form-group">
            <label for="title">Aula:</label>
            <input type="text" id="title" class="form-control" name="title" value="{{ isset($test) ? $test->title : 'Avaliação: Aula ' . $lesson->seq }}" disabled>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição">{{ isset($test) ? $test->description : '' }}</textarea>
        </div>

        @if (!isset($test))
            <button type="submit" name="action" value="create_questions">Criar Prova e Adicionar Questões</button>
            <button type="submit" name="action" value="create_test">Criar Prova</button>
        @else
            <button type="submit" name="action" value="update_test">Atualizar Prova</button>
            <a href="{{ route('courses.edit', ['id' => $lesson->course_id, 'lesson' => $lesson->id]) }}" class="btn btn-secondary">Voltar para Edição do Curso</a>
        @endif
    </form>
</div>

@endsection