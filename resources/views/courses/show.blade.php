@extends ('layouts.main')

@section('title', $course->title ) 

@section('content')

<div class="container" id="cardBodyIndex1"> <!-- TEMPORARIO PORRA: Isso é a formatação do card inicial. Depois eu faço um proprio e tal -->
    <div class="col-md-10 offset-md-1">
        <div class="row">

            <div id="info-container" class="col">
                <h1 id="tituloCurso">{{$course->course_title}}</h1>
            </div>

            <span id="regua"></span>

            <div class="col-md-12" id="description-container">
                <h3 id="h2-show1">Sobre o curso:</h3>
                <p class="event-description" id="p-show1">{{$course->course_description}}</p>
            </div>

            <div id="corpoTabela" class="col-md-12"> 

                <div class="table-responsive">

                    <table class="table">

                        <thead>
                                <tr>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">#</th>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Nome</th>
                                    <!-- Quantidades de Aulas -->  
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Completa?</th>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- Mostra as Aulas do curso que o usuário completou -->
                                @foreach($completelessons as $lesson)
                                <tr>

                                    <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                        {{ $lesson['seq'] }}
                                    </td>

                                    <td id="linkDashboard" class="text-center align-middle">
                                        <a id="linkDashboard" href="#" class="custom-link-animation">
                                            {{ $lesson['title'] }}
                                        </a>
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                        Sim
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                        <div class="d-flex flex-column align-items-center">
                                            <a href="{{route('lessons.show',['course'=>$course->id, 'lesson'=> $lesson['id']])}}" class="btn btn-custom animated-button"  id="botaoAdicionarAula" > Rever </a>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                <!-- Mostra as Aulas do curso que o usuário NÃO completou -->
                                @foreach($incompletelessons as $lesson)
                                <tr>

                                    <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                        {{ $lesson['seq'] }}
                                    </td>

                                    <td id="linkDashboard" class="text-center align-middle">
                                        <a id="linkDashboard" href="#" class="custom-link-animation">
                                            {{ $lesson['title'] }}
                                        </a>
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                        Não
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                        <div class="d-flex flex-column align-items-center">
                                            -
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <a href="{{route('home')}}" class="btn btn-custom animated-button"  id="botaoAdicionarAula"> < Voltar </a>
                <!-- se o usuário NÃO COMEÇOU A FAZER o curso-->
                @if (!isset($hasjoined))
                <form action="{{route('courses.start',['course' => $course->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-custom animated-button"  id="botaoAdicionarAula" >
                        Iniciar >
                    </button>
        </form>
        <!-- se o usuário COMEÇOU A FAZER o curso, MAS NÃO COMPLETOU -->
        @elseif( !isset($completed))
        <a href="{{route('lessons.show',['course'=>$course->id, 'lesson'=> $nextlesson->id])}}" class="btn btn-custom animated-button"  id="botaoAdicionarAula" >
            Continuar >
        </a>
        @else
        <!-- se o usuário COMPLETOU O CURSO -->
        <a href="{{route('lessons.show',['course'=>$course->id, 'lesson'=> $firstlesson->id])}}" class="btn btn-custom animated-button"  id="botaoAdicionarAula" >
            Rever Conteúdo >
        </a>
        @endif
        </div>
    </div>
</div>
@endsection




