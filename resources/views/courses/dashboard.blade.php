@extends('layouts.main')

@section('title', 'PL - Meus Cursos')

@section('content')

<div alt="course-create-container" class="col-md-8 offset-md-2">
    <div class="container" id="corpoContainerDash">

        <div id="corpoDash">

            <div class="row">
                <h1 class="text-center align-self-center" id="tituloDash">
                    Meus Cursos
                </h1>
            </div>

            <div class="row">

                <div id="corpoTabela" class="col-md-12" >
                    @if (auth()->user()->usertype == 2)
                    <div class="text-center align-self-start">
                        <h2 id="tituloCreditosD">
                            Cursos Criados por Você
                        </h2>
                    </div>
                    
                    @if(count($courses) > 0)

                    <div class="table-responsive">

                        <table class="table">

                            <thead style="border-top: 1px; border-color: rgb(222, 226, 230); border-style: solid">
                                <tr >
                                    <th id="TituloTabelaNu" scope="col" class="text-center align-middle">#</th>
                                    <th id="TituloTabela2No" scope="col" class="text-center align-middle">Nome</th>
                                    <!--  <th id="TituloTabela3Av" scope="col" class="text-center align-middle">Participantes</th> -->
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

                                   <!-- <td id="letraDashboard" class="text-center align-middle">
                                        0
                                    </td> -->

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
                        <a id="botaoAdicionarAula" href="/courses/create" type="submit"  class="btn btn-custom animated-button">
                            Criar Curso
                        </a>
                    </div>
                    
                    @else
                        <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                            <p id="textoSemAula" class="align-self-center mt-3">
                                Você Não Criou Nenhum Curso.</p>
                            <a id="botaoAdicionarAula" href="/courses/create" class="btn btn-custom animated-button">  
                                Deseja Criar Curso?
                            </a>
                        </div>   
                    @endif

                    @endif
                    
                    <div id="corpoTabela" class="col-md-12" >
                        
                        <div class="text-center align-self-center">
                            <h2 id="tituloCreditosD">
                                Cursos Que Você Participa
                            </h2>
                        </div>
                        @if(count($incompleteCourses) > 0)
                        

                        <div class="table-responsive">

                            <table class="table">

                                <thead style="border-top: 1px; border-color: rgb(222, 226, 230); border-style: solid">
                                    <tr >
                                        <th id="TituloTabelaNu" scope="col" class="text-center align-middle">#</th>
                                        <th id="TituloTabela2No" scope="col" class="text-center align-middle">Nome</th>
                                        <!--  <th id="TituloTabela3Av" scope="col" class="text-center align-middle">Participantes</th> -->
                                        <th id="TituloTabela4Ac" scope="col" class="text-center align-middle">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($incompleteCourses as $course)
                                    <tr>

                                        <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                            {{ $loop->index + 1 }}
                                        </td>

                                        <td id="linkDashboard" class="text-center align-middle">
                                            <a id="linkDashboard" href="/courses/show/{{ $course['id'] }}" class="custom-link-animation">
                                                {{ $course['course_title'] }}
                                            </a>
                                        </td>

                                    <!-- <td id="letraDashboard" class="text-center align-middle">
                                            0
                                        </td> -->

                                        <td id="letraDashboard" class="text-center align-middle">

                                            <div class="d-flex justify-content-center align-items-center">
                                                <a id="botaoEditar" class="btn btn-custom" href="/courses/{{$course['id']}}/show">
                                                    <img id="imgBotoes" src="\img\arrow-counterclockwise.svg" alt="Icone de Rever">
                                                    <span>Rever</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                 
                        
                    
                        @else
                            <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                                <p id="textoSemAula" class="align-self-center mt-3">
                                    Você não está participando de nenhum Curso.</p>
                                
                            </div>   
                        @endif
                        <div class="text-center align-self-start">
                            <h2 id="tituloCreditosD">
                                Cursos Completos
                            </h2>
                        </div>
                        @if($completedCourses != null && count($completedCourses) > 0)
                        

                        <div class="table-responsive">
                            <table class="table">

                                <thead style="border-top: 1px; border-color: rgb(222, 226, 230); border-style: solid">
                                    <tr >
                                        <th id="TituloTabelaNu" scope="col" class="text-center align-middle">#</th>
                                        <th id="TituloTabela2No" scope="col" class="text-center align-middle">Nome</th>
                                        <!--  <th id="TituloTabela3Av" scope="col" class="text-center align-middle">Participantes</th> -->
                                        <th id="TituloTabela4Ac" scope="col" class="text-center align-middle">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($completedCourses as $course)
                                    <tr>

                                        <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                            {{ $loop->index + 1 }}
                                        </td>

                                        <td id="linkDashboard" class="text-center align-middle">
                                            <a id="linkDashboard" href="/courses/show/{{ $course['id'] }}" class="custom-link-animation">
                                                {{ $course['course_title'] }}
                                            </a>
                                        </td>

                                    <!-- <td id="letraDashboard" class="text-center align-middle">
                                            0
                                        </td> -->

                                        <td id="letraDashboard" class="text-center align-middle">

                                            <div class="d-flex justify-content-center align-items-center">
                                                <a id="botaoEditar" class="btn btn-custom" href="/courses/{{$course['id']}}/show">
                                                    <img id="imgBotoes" src="\img\arrow-counterclockwise.svg" alt="Icone de Rever">
                                                    <span>Rever</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                 
                        
                        @else
                            <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                                <p id="textoSemAula" class="align-self-center mt-3">
                                    Você não concluiu nenhum Curso.
                                </p>
                            </div>   
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
