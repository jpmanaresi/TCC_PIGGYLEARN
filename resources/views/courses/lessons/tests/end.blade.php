@extends ('layouts.main')

@section('title', $test->title ) 

@section('content')

<div class="container" id="cardBodyIndex1"> <!-- TEMPORARIO PORRA: Isso é a formatação do card inicial. Depois eu faço um proprio e tal -->
    <div class="col-md-10 offset-md-1">
        <div class="row">
            @if (isset($completed) && $completed == 1)
            <div id="info-container" class="col">
                <h1 id="tituloCurso">Você conlucluiu o teste: {{$test->title}}.</h1>
            </div>

            <span id="regua"></span>
            <div class="col-md-12" id="description-container">
                <p class="event-description" id="p-show1">Parabéns! Agora você pode continuar o curso!</p>
            </div>
            @else
            <div id="info-container" class="col">
                <h1 id="tituloCurso">Você não conlucluiu o teste: {{$test->title}}.</h1>
            </div>

            <span id="regua"></span>
            <div class="col-md-12" id="description-container">
                <p class="event-description" id="p-show1">Você pode rever o conteúdo do curso clicando em voltar. Ou rever a última aula clicando em Rever conteúdo</p>
            </div>
            @endif
                <a href="{{route('home')}}" class="btn btn-custom animated-button"  id="botaoAdicionarAula"> < Voltar </a>
                <form action="{{route('tests.nextlesson',['course' => $test->lesson->course_id, 'lesson' => $test->lesson->id, 'test' => $test->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="completed" value="{{isset($completed) && $completed== true ? 1 : 0}}">
                    <button type="submit" class="btn btn-custom animated-button"  id="botaoAdicionarAula" >
                        Próxima Aula >
                    </button>
        </form>
        </div>
    </div>
</div>
@endsection




