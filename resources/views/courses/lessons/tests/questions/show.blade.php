@extends ('layouts.main')

@section('title', $question->title ) 

@section('content')

<div class="container" id="cardBodyIndex1"> <!-- TEMPORARIO PORRA: Isso é a formatação do card inicial. Depois eu faço um proprio e tal -->
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="info-container" class="col">
                <h1 id="tituloCurso">{{$question->title}}</h1>
            </div>
            
            <span id="regua"></span>
            <div class="container">
                <form action="/validate-answer" method="POST" id ="validate-question">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="questionId" value="{{$question->id}}">
                    <div class="col-md-12" id="alt_1">
                        <input type="radio" name="answer" id="answer" value="alt_1" data-question-id="{{$question->id}}"><p class="event-description">{{$question->alt_1}}</p>
                    </div>
                    <div class="col-md-12" id="alt_2">
                        <input type="radio" name="answer" id="answer" value="alt_2" data-question-id="{{$question->id}}"><p class="event-description">{{$question->alt_2}}</p>
                    </div>
                    <div class="col-md-12" id="alt_3">
                        <input type="radio" name="answer" id="answer" value="alt_3" data-question-id="{{$question->id}}"><p class="event-description">{{$question->alt_3}}</p>
                    </div>
                    <div class="col-md-12" id="alt_4">
                        <input type="radio" name="answer" id="answer" value="alt_4" data-question-id="{{$question->id}}"><p class="event-description">{{$question->alt_4}}</p>
                    </div>
                </form>
            </div>

                    @csrf
                    <input form="validate-question" type="submit" class="btn btn-custom animated-button"  id="botaoAdicionarAula" value="Validar Resposta">
                    
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/validarResposta.js') }}"></script>


@endsection




