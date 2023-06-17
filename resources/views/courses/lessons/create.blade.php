@extends('layouts.main')

@if(isset($lesson))
    @section('title', 'PL - Editar Aula') 
@else
    @section('title', 'PL - Criar Aula')           
@endif
    
@section('content')

<h1 id="tituloInicialp">
    @if(isset($lesson))
    Editar Aula   
    @else
    Criar Aula            
    @endif
</h1>

<div alt="container-CriarCurso" class="col-md-6 offset-md-3">
    <div id="corpoContainerCC" class="container" >
        
        <div id="corpoCriarCurso">
            
            <form id="create_course" action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store')}}" method="POST">
                @csrf
        
                @if(isset($lesson))
                    <input type="hidden" name="id" value="{{$lesson->id}}"> 
                    @method('PUT')
                @endif

                <input type="hidden" name="course_id" value="{{ $course->id }}">

                <div class="form-group">
                    <label id="tituloCriarCurso" for="title" >          Título da Aula          </label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título da Aula." @if(isset($lesson)) value="{{$lesson->title}}"@endif>
                </div>

                <div class="form-group">
                    <label for="content" >Descrição:</label>
                    <textarea name="content" id="content" class="form-control" placeholder="Qual o conteúdo desta aula?">@if (isset($lesson)){{$lesson->content}}@endif</textarea>
                </div>

            </form>

            <div class="form-group">
                <h1 class="text-center align-self-center" style="margin: 15px; font-weight: lighter">
                    Avaliação
                </h1>

                <div class="col-md-10 offset-md-1 dashboard-events-container">
                    @if (isset($lesson))        
                        @if($lesson->hasTest == 1)

                    <table class="table"> 

                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col"></th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <a href="#">{{ $test['title'] }}</a>
                                </td>

                                <td>
                                    0
                                </td>

                                <td>
                                    <a href="{{ route('tests.edit', ['lesson' => $lesson->id, 'test' => $test->id]) }}" class="btn btn-info edit-btn">Editar</a> 
                                    <form action="{{ route('tests.destroy', ['lesson' => $lesson->id, 'id' => $test->id]) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>

                        @else
                        <div id="divcriaraula">
                            <span id="cortexto">Esta Aula não possui avaliação.</span><a id="botaoCriarAulas" class="btn btn-custom" href="{{route('tests.create',['id' => $course->id, 'lesson'=> $lesson->id])}}">Adicionar Avaliação?</a>
                        </div>
                        @endif

                        @else
                            <input type="hidden" name="create_lesson_and_add_test" value="1">
                            <span id="cortexto">Esta Aula não possui avaliação.</span><input form="create_lesson" id="botaoAdicionarAula" type="submit" class="btn btn-custom animated-button" name="action" value="Adicionar Avaliação?">
                        @endif

                    </div>
                    
                <button form="create_lesson" type="submit" name="action" value="{{ isset($lesson) ? 'Atualizar Aula' : 'Criar Aula' }}">{{ isset($lesson) ? 'Atualizar Aula' : 'Criar Aula' }}</button>

            </div>

        </div>
    </div>
</div>

@endsection