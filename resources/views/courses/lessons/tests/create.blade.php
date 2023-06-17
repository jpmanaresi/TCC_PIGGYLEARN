@extends('layouts.main')

@section('title', 'PL - Criar Teste')
    
@section('content')

<h1 id="tituloInicialp">
    Criar Avaliação
  </h1>

<div class="container" id="lesson-form-container">
    <form id="create_test" method="POST" action="{{ isset($test) ? route('tests.update', $test->id) : route('tests.store') }}">
        @csrf

        @if(isset($test))
            @method('PUT')
            <input type="hidden" name="test_id" value="{{ isset($test) ? $test->id : '' }}">
        @endif
        <input type="hidden" name="lesson_id" value="{{  $lesson->id }}">
        

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
        </form> 
        <div class="col-md-10 offset-md-1 dashboard-events-container">      
            <!-- Gambiara do Jão -->  
            @if(count($questions) > 0)

            <table class="table"> 

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td scropt="row">{{ $question['seq'] }}</td>
                            <td><a href="#">{{ $question['question'] }}</a></td>
                            <td>0</td>
                            <td>
                                <a href="{{ route('questions.edit', ['test' => $test->id, 'question' => $question['id']]) }}" class="btn btn-info edit-btn">Editar</a> 
                                <form action="{{ route('questions.destroy', [ 'id' => $question['id']]) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td scropt="row"></td>
                            <td colspan="4">
                            <a href="{{route('questions.create', ['course' => $test->lesson->course->id, 'lesson' => $test->lesson->id, 'test' => $test->id])}}" id="botaoAdicionarAula"  class="btn btn-custom">Adicionar Questão</a> 
                            </td>
                        </tr>    
                </tbody>

            </table>
            @endif
            <input form="create_test" type="submit" name="action" value="Atualizar Prova">
            <a href="{{ route('questions.create', ['course' => $lesson->course_id, 'lesson' => $lesson->id, 'test' => $test->id]) }}" class="btn btn-secondary">Adicionar Questão</a>
            <a href="{{ route('courses.edit', ['id' => $lesson->course_id, 'lesson' => $lesson->id]) }}" class="btn btn-secondary">Voltar para Edição do Curso</a>
        @endif

</div>

@endsection