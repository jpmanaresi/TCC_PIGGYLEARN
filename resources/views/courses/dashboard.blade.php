@extends('layouts.main')

@section('title', 'PL - Meus Cursos')

@section('content')

<div alt="course-create-container" class="col-md-8 offset-md-2">
    <div class="container" id="corpoContainerDash">

        <div id="corpoDash">

            <div class="row">
                <h1 class="text-center align-self-center" id="tituloDash">
                    Curso Criados
                </h1>
            </div>

            <div class="row">

                <div id="corpoTabela" class="col-md-12" >
                    @if(count($courses) > 0)

                    <div class="table-responsive">

                        <table class="table">

                            <thead>
                                <tr>
                                    <th id="TituloTabelaNu" scope="col" class="text-center align-middle">#</th>
                                    <th id="TituloTabela2No" scope="col" class="text-center align-middle">Nome</th>
                                    <th id="TituloTabela3Av" scope="col" class="text-center align-middle">Participantes</th>
                                    <th id="TituloTabela4Ac" scope="col" class="text-center align-middle">Ações</th>
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

                                        <div class="d-flex justify-content-center align-items-center">
                                            <a id="botaoEditar" class="btn btn-custom" href="/courses/{{$course->id}}/edit">
                                                <img id="imgBotoes" src="/img/pencil-square.svg" alt="Ícone Editar" style="padding-bottom: 2px">
                                                <span>Editar</span>
                                            </a>
                                            <form action="{{ route('courses.destroy', ['id' => $course->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="botaoDeletar" class="btn btn-custom btn-fixed-size" type="submit">
                                                    <img id="imgBotoes" src="/img/x-circle.svg" alt="Ícone Deletar">
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

                    <div class="text-center align-center">
                        <button id="botaoAdicionarAula" type="submit"  class="btn btn-custom animated-button">
                            Criar Curso
                        </button>
                    </div>

                    @else
                        <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                            <p id="textoSemAula" class="align-self-center mt-3">
                                Você Não Criou Nenhum Curso.</p>
                            <input type="hidden" name="create_course_and_add_lesson" value="1">
                            <a href="/courses/create">
                                
                                <button id="botaoAdicionarAula" type="submit"  class="btn btn-custom animated-button">
                                    Deseja Criar Curso?
                                </button>
                            </a>
                        </div>   
                    @endif

                    
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
