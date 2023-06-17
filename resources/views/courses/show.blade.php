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
            
            <button href="/courses/{{$course->id}}/start" id="botaoAdicionarAula" class="btn btn-custom animated-button">
                Adicionar +
            </a>
        </div>
    </div>
</div>
@endsection




