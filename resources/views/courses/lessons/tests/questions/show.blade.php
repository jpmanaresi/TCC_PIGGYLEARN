@extends ('layouts.main')

@section('title', $question->title) 

@section('content')

    <div alt="container-CriarCurso" class="col-md-6 offset-md-3">
        <div id="corpoContainerCC" class="container">
            <div id="corpoCriarCurso"> 

                <div id="tituloMostrarC" class="col-md-12" id="description-container">
                    <h1 id="tituloMostrarC" class="event-description"> Questão {{$question->seq}}</h1>
                </div>

                <div id="descricaoMostrarT" class="col-md-12" id="description-container">
                    <p id="descricaoMostrarT" class="event-description">{{$question->question}}</h1>
                </div>

                <div id="corpoTabela" class="col-md-12">
                    <div class="form-group">
                        <form action="/validate-answer" method="POST" id="validate-question">
                            @csrf
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <input type="hidden" name="questionId" value="{{$question->id}}">
                    
                            <div class="row justify-content-center">
                                <div style="margin-left: 4px;" class="col-auto d-flex align-items-center">
                                    <input type="radio" name="answer" id="answer_1" value="alt_1" data-question-id="{{$question->id}}">

                                    <p id="textoRespostaQ" class="event-description">{{$question->alt_1}}</p>
                                </div>
                            </div>
                    
                            <div class="row justify-content-center">
                                <div style="margin-left: 4px;" value="alt_2" class="col-auto d-flex align-items-center">
                                    <input type="radio" name="answer" id="answer_2"  data-question-id="{{$question->id}}">
                                
                                    <p id="textoRespostaQ" class="event-description">{{$question->alt_2}}</p>
                                </div>
                            </div>
                    
                            <div class="row justify-content-center">
                                <div style="margin-left: 4px;" class="col-auto d-flex align-items-center">
                                    <input type="radio" name="answer" id="answer_3" value="alt_3" data-question-id="{{$question->id}}">
                               
                                    <p id="textoRespostaQ" class="event-description">{{$question->alt_3}}</p>
                                </div>
                            </div>
                    
                            <div class="row justify-content-center">
                                <div style="margin-left: 4px;" class="col-auto d-flex align-items-center">
                                    <input type="radio" name="answer" id="answer_4" value="alt_4" data-question-id="{{$question->id}}">
                               
                                    <p id="textoRespostaQ" class="event-description">{{$question->alt_4}}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                @csrf
                <div class="col d-flex justify-content-end" style="padding-right: 0px;">
                    <input form="validate-question" type="submit" class="btn btn-custom animated-button"value="Validar Resposta" id="btnvalidar">
                </div>
                    
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/validarResposta.js') }}"></script>


@endsection




