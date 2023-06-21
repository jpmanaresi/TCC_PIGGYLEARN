@extends ('layouts.main')

@section('title', $course->title ) 

@section('content')

    <div alt="container-CriarCurso" class="col-md-6 offset-md-3">
        <div id="corpoContainerCC" class="container">
            <div id="corpoCriarCurso"> 

                <div id="info-container" class="col">
                    <h1 id="tituloMostrarC">{{$course->course_title}}</h1>
                </div>

                <h3 id="descricaoMostrarT">Descrição</h3>

                <div id="corpoTabela" class="col-md-12" id="description-container">
                    <p  id="descricaoMostrarP" class="event-description">{{$course->course_description}}</p>
                </div>            

                <div class="container">
                    <div class="row align-items-center">

                        <div class="col" style="padding-left: 0px;">
                            <a id="botaoVoltar" class="btn btn-custom" href="{{route('home')}}"> 
                                <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                                <span>Voltar</span> 
                            </a>
                        </div>

                        <div class="col text-center">
                            <h1 id="TituloTabelaDepoisD">
                                Aulas
                            </h1>
                        </div>

                        <div class="col" style="padding-right: 0px;" alt="Coluna vazia pra deixar as coisas ajustadas"> </div>
                    </div>
                </div>

                <div id="corpoTabela" class="col-md-12"> 
                    <div class="table-responsive">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th id="TituloTabela" scope="col" class="text-center align-middle">#</th>
                                        <th id="TituloTabela" scope="col" class="text-center align-middle">Nome</th>
                                        <!-- Quantidades de Aulas -->  
                                        <th id="TituloTabela" scope="col" class="text-center align-middle">Completa</th>
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
                                                <a id="botaoRever" class="btn btn-custom mr-2" href="{{route('lessons.show',['course'=>$course->id, 'lesson'=> $lesson['id']])}}"> 
                                                    <img id="imgBotoes" src="\img\arrow-counterclockwise.svg" alt="Icone de Rever">
                                                    <span>Rever</span> 
                                                </a>
                                            </div>
                                        </td>

                                        </tr>
                                    @endforeach
                                    <!-- Mostra as Aulas do curso que o usuário NÃO completou -->
                                    @foreach($incompletelessons as $lesson)
                                    <tr class="incomplete">
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

                    @if (!isset($hasjoined))
                    <!-- se o usuário NÃO COMEÇOU A FAZER o curso -->
                    <div class="col d-flex justify-content-end" style="padding-right: 0px;">
                        <form action="{{route('courses.start',['course' => $course->id])}}" method="post">
                        @csrf
                            <button type="submit" class="btn btn-custom animated-button" id="botaoAdicionarAula" >
                                Iniciar
                            </button>
                        </form>
                    </div>
                    
                    @elseif( !isset($completed))
                    <!-- se o usuário COMEÇOU A FAZER o curso, MAS NÃO COMPLETOU -->
                    <div class="col d-flex justify-content-end" style="padding-right: 0px;">
                        <a class="btn btn-custom animated-button mr-2" href="{{route('lessons.show',['course'=>$course->id, 'lesson'=> $nextlesson->id])}}">
                            <span>Continuar</span>
                        </a>
                    </div>

                    @else
                    <!-- se o usuário COMPLETOU O CURSO -->
                    <div class="col d-flex justify-content-start" style="padding-left: 0px;">
                        <a id="botaoRever" class="btn btn-custom mr-2" href="{{route('lessons.show',['course'=>$course->id, 'lesson'=> $firstlesson->id])}}" class="btn btn-custom" id="botaoVoltar">
                            <img id="imgBotoes" src="\img\arrow-counterclockwise.svg" alt="Icone de Rever">
                            <Span>Rever Conteúdo</Span>
                        </a>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

@endsection




