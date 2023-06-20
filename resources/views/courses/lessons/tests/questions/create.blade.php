@extends('layouts.main')

@if(isset($lesson))
    @section('title', 'PL - Editar Questão') 
@else
    @section('title', 'PL - Criar Questão')           
@endif
    
@section('content')

<h1 id="tituloInicialp">
    @if(isset($question))
    Editar Questão   
    @else
    Criar Questão            
    @endif
</h1>

<div class="container" id="question-form-container">
    <form method="POST" action="{{ isset($question) ? route('questions.update', $question->id) : route('questions.store') }}">
        @csrf

        @if (isset($question))
            @method('PUT')
        @endif

        <input type="hidden" name="test_id" value="{{$test->id}}">

        <div class="form-group">
            <label for="title" >Questão:</label>
            <input type="text" id="title" class="form-control"name="title" value="{{isset($question) ? 'Questão '. $question->seq : 'Nova Questão'}}" disabled>
        </div>

        <div class="form-group">
            <label for="question" >Enunciado:</label>
            <textarea name="question" id="question" class="form-control" placeholder="Descrição">@if (isset($question)){{$question->question}}@endif</textarea>
        </div>

        <div class="form-group">
            <label for="alt_1" >Alternativa 1:</label>
            <textarea name="alt_1" id="alt_1" class="form-control" placeholder="Alternativa 1">@if (isset($question)){{$question->alt_1}}@endif</textarea>
            <input type="radio" class="form-check-input" name="answer" value="alt_1" {{ isset($question) && $question->answer == 'alt_1' ? 'checked' : '' }}> Alternativa correta?
        </div>

        <div class="form-group">
            <label for="alt_2" >Alternativa 2:</label>
            <textarea name="alt_2" id="alt_2" class="form-control" placeholder="Alternativa 2">@if (isset($question)){{$question->alt_2}}@endif</textarea>
            <input type="radio" class="form-check-input" name="answer" value="alt_2" {{ isset($question) && $question->answer == 'alt_2' ? 'checked' : '' }}> Alternativa correta?
        </div>

        <div class="form-group">
            <label for="alt_3" >Alternativa 3:</label>
            <textarea name="alt_3" id="alt_3" class="form-control" placeholder="Alternativa 3">@if (isset($question)){{$question->alt_3}}@endif</textarea>
            <input type="radio" class="form-check-input" name="answer" value="alt_3" {{ isset($question) && $question->answer == 'alt_3' ? 'checked' : '' }}> Alternativa correta?
        </div>

        <div class="form-group">
            <label for="alt_4" >Alternativa 4:</label>
            <textarea name="alt_4" id="alt_4" class="form-control" placeholder="Alternativa 4">@if (isset($question)){{$question->alt_4}}@endif</textarea>
            <input type="radio" class="form-check-input" name="answer" value="alt_4" {{ isset($question) && $question->answer == 'alt_4' ? 'checked' : '' }}> Alternativa correta?
        </div>
        <div>

        <button type="submit" name="action" value="{{isset($question) ? 'update_and_new' : 'create_and_new'}}">Salvar e Criar Nova</button>
        <button type="submit">{{isset($question) ? 'Salvar e Voltar' : 'Criar e Voltar'}}</button>
        
        <a href="{{ route('tests.edit', ['lesson' => $test->lesson_id, 'test' => $test->id]) }}" class="btn btn-secondary">
            Voltar
        </a>
    </form>
</div>
@endsection