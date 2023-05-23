@extends('layouts.main')

@section('title', 'PL - Adicionar Aula')
    
@section('content')

<div class="container" id="lesson-form-container">
    <form method="POST" action="{{route('tests.store')}}">
        @csrf
        <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
        <div class="form-group">
            <label for="title" >Aula:</label>
            <input type="text" id="title" class="form-control"name="title" value="Avaliação: Aula {{$lesson->seq}}" disabled>
        </div>
        <div class="form-group">
            <label for="title" >Descrição:</label>
            <textarea name="description" id="content" class="form-control" placeholder="Descrição"></textarea>
        </div>

        <button type="submit">Criar Prova</button>
    </form>
</div>
@endsection