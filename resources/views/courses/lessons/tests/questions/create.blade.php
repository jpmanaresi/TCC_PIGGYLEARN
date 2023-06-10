@extends('layouts.main')

@section('title', 'PL - Adicionar Aula')
    
@section('content')

<div class="container" id="question-form-container">
    <form method="POST" action="{{route('questions.store')}}">
        @csrf
        <input type="hidden" name="lesson_id" value="{{$test->id}}">
        <div class="form-group">
            <label for="title" >Questão:</label>
            <input type="text" id="title" class="form-control"name="title" value="Questão " disabled>
        </div>
        <div class="form-group">
            <label for="title" >Enunciado:</label>
            <textarea name="description" id="content" class="form-control" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
            <label for="title" >Alternativa 1:</label>
            <textarea name="alt_1" id="content" class="form-control" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
            <label for="title" >Alternativa 1:</label>
            <textarea name="alt_2" id="content" class="form-control" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
            <label for="title" >Alternativa 1:</label>
            <textarea name="alt_3" id="content" class="form-control" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
            <label for="title" >Alternativa 1:</label>
            <textarea name="alt_4 id="content" class="form-control" placeholder="Descrição"></textarea>
        </div>
        <button type="submit">Criar Prova</button>
    </form>
</div>
@endsection