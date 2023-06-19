@extends ('layouts.main')

@section('title', $test->title ) 

@section('content')

<div class="container" id="cardBodyIndex1"> <!-- TEMPORARIO PORRA: Isso é a formatação do card inicial. Depois eu faço um proprio e tal -->
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="info-container" class="col">
                <h1 id="tituloCurso">{{$test->title}}</h1>
            </div>

            <span id="regua"></span>
            <div class="col-md-12" id="description-container">
                <p class="event-description" id="p-show1">{{$test->description}}</p>
            </div>
                <a href="{{route('home')}}" class="btn btn-custom animated-button"  id="botaoAdicionarAula"> < Voltar </a>
                <form action="{{route('tests.start',['course' => $test->lesson->course_id, 'lesson' => $test->lesson->id, 'test' => $test->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-custom animated-button"  id="botaoAdicionarAula" >
                        Próxima >
                    </button>
                    @if(isset($passed) && $passed == 1)
                    <button type="submit" class="btn btn-custom animated-button"  id="botaoAdicionarAula" name="action" value="{{isset($passed) && $passed == 1 ? 1 : 0}}">
                        Pular Teste >
                    </button>
                    @endif
        </form>
        </div>
    </div>
</div>
@endsection




