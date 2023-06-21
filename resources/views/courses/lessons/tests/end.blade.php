@extends ('layouts.main')

@section('title', $test->title ) 

@section('content')

    <div alt="container-CriarCurso" class="col-md-6 offset-md-3">
        <div id="corpoContainerCC" class="container">
            <div id="corpoCriarCurso"> 

                @if (isset($completed) && $completed == 1)
                <div id="info-container" class="col">
                    <h1 id="tituloMostrarC">Você conlucluiu o Teste: {{$test->title}}</h1>
                </div>

                <div id="corpoTabela" class="col-md-12" id="description-container">
                    <p id="descricaoMostrarP">Parabéns! Agora você pode continuar o curso!</p>
                </div>

                @else

                <div id="info-container" class="col">
                    <h1 id="tituloMostrarC">Você não conlucluiu o teste: {{$test->title}}</h1>
                </div>


                <div id="corpoTabela" class="col-md-12" id="description-container">
                    <p id="descricaoMostrarP">
                        Você pode revisitar o conteúdo do curso clicando no botão "Voltar". Também é possível rever a última aula clicando em "Rever conteúdo".
                    </p>
                </div>
                @endif

                <div class="row align-items-center">
                    <div class="col">
                        <a id="botaoVoltar" class="btn btn-custom" href="{{route('home')}}"> 
                            <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                            <span>Voltar</span> 
                        </a>
                    </div>

                    <div class="col d-flex justify-content-end">
                        <form action="{{route('tests.nextlesson',['course' => $test->lesson->course_id, 'lesson' => $test->lesson->id, 'test' => $test->id])}}" method="post">
                        @csrf
                            <input type="hidden" name="completed" value="{{isset($completed) && $completed== true ? 1 : 0}}">
                            
                            <button type="submit" class="btn btn-custom animated-button">
                                <img id="imgBotoes" src="\img\arrow-counterclockwise.svg" alt="Icone de Rever">
                                <span>Rever Conteúdo</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




