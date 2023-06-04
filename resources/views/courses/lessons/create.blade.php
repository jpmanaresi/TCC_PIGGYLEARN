@extends('layouts.main')

@section('title', 'PL - Adicionar Aula')
    
@section('content')

<div class="container" id="lesson-form-container">
    <form method="POST" action="{{ isset($lesson) ? route('lessons.update',[$course->id, $lesson->id]) : route('lessons.store', $course->id) }}">
        @csrf
        
        @if(isset($lesson))
        <input type="hidden" name="id" value="{{$lesson->id}}"> 
        @method('PUT')
      @endif
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <div class="form-group">
            <label for="title" >Aula:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título da Aula." @if(isset($lesson)) value="{{$lesson->title}}"@endif>
        </div>
        <div class="form-group">
            <label for="content" >Descrição:</label>
            <textarea name="content" id="content" class="form-control" placeholder="Qual o conteúdo desta aula?">@if (isset($lesson)){{$lesson->content}}@endif</textarea>
        </div>

                <div class="form-group">
                    <input type="checkbox" name="hasTest" value="1" {{ isset($lesson) && $lesson->hasTest ? 'checked disabled' : '' }}> Tem avaliação?
                </div>
        <button type="submit">{{ isset($lesson) ? 'Atualizar Aula' : 'Criar Aula' }} </button>
    </form>
</div>
@endsection