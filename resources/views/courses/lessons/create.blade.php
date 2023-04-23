@extends('layouts.main')

@section('title', 'PL - Adicionar Aula')
    
@section('content')

<div class="container" id="lesson-form-container">
    <form method="POST" action="/cursos/{{ $course->id }}/aulas">
        @csrf
        <input type="hidden" name="curso_id" value="{{ $course->id }}">
        <!-- Adicione outros campos do formulário de criação de aulas -->
        <button type="submit">Criar aula</button>
    </form>
</div>
@endsection