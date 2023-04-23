@extends('layouts.main')

@section('title', 'PL - Adicionar Aula')
    
@section('content')

<div class="container" id="lesson-form-container">
    <form method="POST" action="/courses/">
        @csrf
        <input type="hidden" name="course_id" value="">
        <div class="form-group">
            <label for="title" >Aula:</label>
            <input type="text" id="title" class="form-control"name="title" placeholder="Título da Aula">
        </div>
        <div class="form-group">
            <label for="title" >Descrição:</label>
            <textarea name="content" id="content" class="form-control" placeholder="Qual o conteúdo desta aula?"></textarea>
        </div>

                <div class="form-group">
                    <input type="checkbox" name="hasTest" value="1"> Tem avaliação?
                </div>
        <button type="submit">Criar Prova</button>
    </form>
</div>
@endsection