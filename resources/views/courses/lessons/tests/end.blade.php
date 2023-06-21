@extends ('layouts.main')

@section('title', $test->title ) 

@section('content')

<div alt="container-CriarCurso" class="col-md-6 offset-md-3">
    <div id="corpoContainerCC" class="container">

        <div id="corpoCriarCurso"> 

            @if (isset($completed) && $completed == 1)
            <div id="info-container" class="col">
                <h1 id="tituloCurso">Você conlucluiu o Teste: {{$test->title}}.</h1>
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




