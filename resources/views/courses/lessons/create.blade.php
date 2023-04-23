@extends('layouts.main')

@section('title', 'PL - Adicionar Aula')
    
@section('content')

<div class="container" id="lesson-form-container">
    <form method="POST" action="/cursos/{{ $course->id }}/aulas">
        @csrf
        <div class="form-group">
            <label for="title" >Aula:</label>
            <input type="text" id="title" class="form-control"name="title" placeholder="Título da Aula">
        </div>
        <div class="form-group">
            <label for="title" >Descrição:</label>
            <textarea name="content" id="content" class="form-control" placeholder="Qual o conteúdo desta aula?"></textarea>
        </div>

                <div class="form-group">
                    <input type="checkbox" name="hasTest" value="true"> Tem avaliação?
                </div>
        <button type="submit">Criar aula</button>
    </form>
</div>
@endsection