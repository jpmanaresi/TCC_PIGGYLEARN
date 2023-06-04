@extends('layouts.main')

@section('title', 'PL - Adicionar Aula')
    
@section('content')

<div class="container" id="lesson-form-container">
    <form method="POST" action="{{ isset($test) ? route('tests.update', $test->id) : route('tests.store') }}">
        @csrf

        @if(isset($test))
            @method('PUT')
        @endif

        <input type="hidden" name="test_id" value="{{ isset($test) ? $test->id : '' }}">
        
        <div class="form-group">
            <label for="title">Aula:</label>
            <input type="text" id="title" class="form-control" name="title" value="{{ isset($test) ? 'Avaliação: Aula ' . $lesson->seq : '' }}" disabled>
        </div>
        
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição">{{ isset($test) ? $test->description : '' }}</textarea>
        </div>

        <button type="submit">{{ isset($test) ? 'Atualizar Prova' : 'Criar Prova' }}</button>
    </form>
</div>
@endsection