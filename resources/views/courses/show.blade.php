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
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Tem teste?</th>
                                    <th id="TituloTabela" scope="col" class="text-center align-middle">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($lessons as $lesson)
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
                                        0
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                        <div class="d-flex flex-column align-items-center">
                                            0
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <a href="{{route('home')}}" class="btn btn-custom animated-button"  id="botaoAdicionarAula"> < Voltar </a>
                <form action="{{route('courses.start',['course' => $course->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-custom animated-button"  id="botaoAdicionarAula" >
                        Iniciar >
                    </button>
        </form>
        </div>
    </div>
</div>
@endsection




