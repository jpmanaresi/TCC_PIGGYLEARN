@extends('layouts.main')

@if(isset($lesson))
    @section('title', 'PL - Editar Questão') 
@else
    @section('title', 'PL - Criar Questão')           
@endif
    
@section('content')

    <h1 id="tituloInicialp">
        @if(isset($question))
        Editar Questão   
        @else
        Criar Questão            
        @endif
    </h1>

    <div alt="container-CriarCurso" class="col-md-6 offset-md-3">
        <div id="corpoContainerCC" class="container">

            <div id="corpoCriarCurso"> 
                <form method="POST" action="{{ isset($question) ? route('questions.update', $question->id) : route('questions.store') }}">
                    @csrf
                    @if (isset($question))
                        @method('PUT')
                    @endif
                    
                    <input type="hidden" name="test_id" value="{{$test->id}}">

                    <div class="form-group">
                        <div id="tituloCriarQ">
                            <label id="tituloCriarQ" for="title" >
                                Título da Questão
                            </label>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <input id="placeholderCriarQ" style="width: 258px;" type="text" id="title" class="form-control text-center" name="title" value="{{isset($question) ? 'Questão '. $question->seq : 'Nova Questão'}}" disabled>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label id="descricaoCriarCurso" for="question">
                            Qual a pergunta?
                        </label>

                        <textarea name="question" id="question" class="form-control" placeholder="Descrição">@if (isset($question)){{$question->question}}@endif</textarea>
                    </div>

                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col" style="padding-left: 0px;">
                                <a id="botaoVoltar" class="btn btn-custom" href="">
                                    <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                                    <span>Voltar</span>
                                </a>
                            </div>
                    
                            <div class="col text-center">
                                <h1 id="TituloTabelaDepoisD">
                                    Opções
                                </h1>
                            </div>
                    
                            <div class="col" style="padding-right: 0px;" alt="Coluna vazia pra deixar as coisas ajustadas"> </div>
                        </div>
                    </div>

                    <div id="corpoTabela" class="col-md-12"> 
                        <!-- <div alt="pra caso eu tenha feito merda">
                            <div class="form-group">
                                <label id="tituloOpcoes" for="alt_2">Alternativa 2</label>
        
                                <textarea name="alt_2" id="alt_2" class="form-control" placeholder="Alternativa 2">@if (isset($question)){{$question->alt_2}}@endif</textarea>
                                
                                <input type="radio" class="form-check-input" name="answer" value="alt_2" {{ isset($question) && $question->answer == 'alt_2' ? 'checked' : '' }}> 
                                Alternativa Correta
                            </div>
        
                            <div class="form-group">
                                <label id="tituloOpcoes" for="alt_3">Alternativa 3</label>
        
                                <textarea name="alt_3" id="alt_3" class="form-control" placeholder="Alternativa 3">@if (isset($question)){{$question->alt_3}}@endif</textarea>
                                
                                <input type="radio" class="form-check-input" name="answer" value="alt_3" {{ isset($question) && $question->answer == 'alt_3' ? 'checked' : '' }}> 
                                Alternativa Correta
                            </div>
        
                            <div class="form-group">
                                <label id="tituloOpcoes" for="alt_4">Alternativa 4</label>
        
                                <textarea name="alt_4" id="alt_4" class="form-control" placeholder="Alternativa 4">@if (isset($question)){{$question->alt_4}}@endif</textarea>
                                
                                <input type="radio" class="form-check-input" name="answer" value="alt_4" {{ isset($question) && $question->answer == 'alt_4' ? 'checked' : '' }}> 
                                Alternativa Correta
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label id="tituloOpcoes" for="alt_1">1º Alternativa</label>
                        
                            <div class="d-flex align-items-center justify-content-center">
                                <textarea id="placeholderOpcoes" name="alt_1" id="alt_1" class="form-control" placeholder="Conteudo da Alternativa">@if (isset($question)){{$question->alt_1}}@endif</textarea>
                                
                                <div class="ml-auto">
                                    <div class="col d-flex align-items-center">
                                        <input id="CheckAlternativaC" type="radio" class="form-check-input" name="answer" value="alt_1" {{ isset($question) && $question->answer == 'alt_1' ? 'checked' : '' }}> 
                                        <p class="text-center" id="textoAlternativaC">
                                            Opção Correta
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <label id="tituloOpcoes" for="alt_2">2º Alternativa</label>

                            <div class="d-flex align-items-center justify-content-center">
                                <textarea id="placeholderOpcoes" name="alt_2" id="alt_2" class="form-control" placeholder="Conteudo da Alternativa">@if (isset($question)){{$question->alt_2}}@endif</textarea>
                                
                                <div class="ml-auto">
                                    <div class="col d-flex align-items-center">
                                        <input id="CheckAlternativaC" type="radio" class="form-check-input" name="answer" value="alt_2" {{ isset($question) && $question->answer == 'alt_2' ? 'checked' : '' }}> 
                                        <p class="text-center" id="textoAlternativaC">
                                            Opção Correta
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label id="tituloOpcoes" for="alt_3">3º Alternativa</label>

                            <div class="d-flex align-items-center justify-content-center">
                                <textarea id="placeholderOpcoes" name="alt_3" id="alt_3" class="form-control" placeholder="Conteudo da Alternativa">@if (isset($question)){{$question->alt_3}}@endif</textarea>
                            
                            <div class="ml-auto">
                                <div class="col d-flex align-items-center">
                                    <input id="CheckAlternativaC" type="radio" class="form-check-input" name="answer" value="alt_3" {{ isset($question) && $question->answer == 'alt_3' ? 'checked' : '' }}> 
                                    <p class="text-center" id="textoAlternativaC">
                                        Opção Correta
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label id="tituloOpcoes" for="alt_4">4º Alternativa</label>

                            <div class="d-flex align-items-center justify-content-center">
                                <textarea id="placeholderOpcoes" name="alt_4" id="alt_4" class="form-control" placeholder="Alternativa 4">@if (isset($question)){{$question->alt_4}}@endif</textarea>
                            
                            <div class="ml-auto">
                                <div class="col d-flex align-items-center">
                                    <input id="CheckAlternativaC" type="radio" class="form-check-input" name="answer" value="alt_4" {{ isset($question) && $question->answer == 'alt_4' ? 'checked' : '' }}> 
                                    <p class="text-center" id="textoAlternativaC">
                                        Opção Correta
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
            </div>
            
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">           
                <button id="botaoVoltar" class="btn btn-custom"  type="submit">{{isset($question) ? 'Salvar e Voltar' : 'Criar e Voltar'}}</button>

                <button id="botaoAdicionarAula" class="btn btn-custom animated-button" style="width: 160px;" type="submit" name="action" value="{{isset($question) ? 'update_and_new' : 'create_and_new'}}">Salvar e Criar Nova</button>
            </div>
        </form>
        </div>
    </div>

@endsection