@extends('layouts.main')

@section('title', 'PL - Meus Cursos')

@section('content')
<div alt="course-create-container" class="col-md-10 offset-md-1">
    <div class="container" id="corpoContainerDash">

        <div id="corpoDash">

            <div class="row">
                <h1 class="text-center align-self-center" id="tituloDash">Meus Cursos</h1>
            </div>

            <div class="row">
                <div id="corpoTabela" class="col-md-12" >
                    @if(count($courses) > 0)
                    <div class="table-responsive">

                        <table class="table">

                            <thead>
                                <tr>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">#</th>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Nome</th>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Participantes</th>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($courses as $course)
                                <tr>

                                    <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                        {{ $loop->index + 1 }}
                                    </td>

                                    <td id="linkDashboard" class="text-center align-middle">
                                        <a id="linkDashboard" href="/courses/show/{{ $course->id }}" class="custom-link-animation">
                                            {{ $course->course_title }}
                                        </a>
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                        0
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                        <div class="d-flex flex-column align-items-center">

                                            <a id="botaoEditar" class="btn btn-custom btn-padrao" href="/courses/{{$course->id}}/edit" >
                                                <img src="img\pencil-square.svg" alt="Ícone Editar" class="iconebotao">
                                                <span>Editar</span>
                                            </a>

                                            <form action="{{ route('courses.destroy',['id' => $course->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="botaoDeletar" type="submit" class="btn btn-custom btn-padrao">
                                                    <img src="img\x-circle.svg" alt="Ícone Deletar" class="iconebotao">
                                                    <span>Deletar</span>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>                 
                    
                    @else
                    <a href="/courses/create">
                        <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                            <p id="textoSemAula" class="align-self-center mt-3">Você não criou nenhum curso.</p>
                            <input type="hidden" name="create_course_and_add_lesson" value="1">
                                <button id="botaoAdicionarAula" type="submit" class="btn btn-custom animated-button">Criar Curso</button>
                        </div>   
                    </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
