@extends ('layouts.main')

@section('title', $test->title ) 

@section('content')

    <div alt="container-CriarCurso" class="col-md-6 offset-md-3">
        <div id="corpoContainerCC" class="container">
            <div id="corpoCriarCurso"> 

                <div id="info-container" class="col">
                    <h1 id="tituloMostrarC">{{$test->title}}</h1>
                </div>

                <div id="corpoTabela" class="col-md-12" id="description-container">
                    <p id="descricaoMostrarP" class="event-description">{{$test->description}}</p>
                </div>

                <div class="row align-items-center">
                    <div class="col">
                        <a id="botaoVoltar" class="btn btn-custom" href="{{route('home')}}"> 
                            <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                            <span>Voltar</span> 
                        </a>
                    </div>
                
                    <div class="col d-flex justify-content-end">
                        <form action="{{route('tests.start',['course' => $test->lesson->course_id, 'lesson' => $test->lesson->id, 'test' => $test->id])}}" method="post">
                        @csrf
                            <button type="submit" class="btn btn-custom animated-button">
                                Próxima
                            </button>
                        </form>
                            
                        @if(isset($passed) && $passed == 1)
                        <div class="col d-flex justify-content-end" style="padding-right: 0px;">
                            <a  id="botaoCriarC" class="btn btn-custom"  href="{{route('tests.end',['test'=>$test->id])}}">
                                Pular Teste
                            </a>
                        </div>
                        @endif
                
                </div>
            </div>
        </div>
    </div>

@endsection




