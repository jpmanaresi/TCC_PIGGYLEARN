@extends('layouts.main')

@if(isset($test))
    @section('title', 'PL - Editar Avaliação') 
@else
    @section('title', 'PL - Criar Avaliação')           
@endif
    
@section('content')

<h1 id="tituloInicialp">
    @if(isset($test))
    Editar Avaliação
    @else
    Criar Avaliação            
    @endif
</h1>

<div alt="container-CriarCurso" class="col-md-6 offset-md-3">
    <div id="corpoContainerCC" class="container">
    
        <div id="corpoCriarCurso">

            <form id="create_test" method="POST" action="{{ isset($test) ? route('tests.update', $test->id) : route('tests.store') }}">
                @csrf
                
                @if(isset($test))
                    @method('PUT')
                        <input type="hidden" name="test_id" value="{{ isset($test) ? $test->id : '' }}">
                    @endif

                <input type="hidden" name="lesson_id" value="{{  $lesson->id }}">
                
                <div class="form-group">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <label id="tituloCriarQ" style="width: 258px;" for="title">           Nome da Avaliação       </label>
                            <input id="placeholderCriarQ" class="form-control text-center" type="text"  name="title" value="{{ isset($test) ? $test->title : 'Avaliação: Aula ' . $lesson->seq }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label id="descricaoCriarCurso" for="title">       Descrição                </label>
                    <textarea name="description" id="placeholderDesc" class="form-control" placeholder="Descrição">{{ isset($test) ? $test->description : '' }}</textarea>
                </div>

                @if (!isset($test))
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col" style="padding-left: 0px;">
                            <a id="botaoVoltar" class="btn btn-custom mr-2" href="#">
                                <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                                <span>Voltar</span>
                            </a>
                        </div>

                        <div class="col d-flex justify-content-end" style="padding-right: 0px;">
                            <button id="botaoCriarAV" class="btn btn-custom" type="submit" name="action" value="create_test">
                                Criar Avaliação e Voltar
                            </button>
                        </div>
                        
                        <div class="row" style="margin: 0%; padding: 0%; margin-bottom: 5px">
                            <div class="col d-flex" style="padding-right: 0px; padding-left: 0px;">
                                <button id="botaoCriarC" class="btn btn-custom" style="width: 100%;" type="submit" name="action" value="create_questions">
                                    Criar Avaliação e Criar as Questões                     
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @else

            </form> 

                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col" style="padding-left: 0px;">
                                <a id="botaoVoltar" class="btn btn-custom mr-2" href="{{route('lessons.edit', ['course'=> $lesson->course_id,'lesson' => $lesson->id])}}">
                                    <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                                    <span>Voltar</span>
                                </a>
                            </div>
                    
                            <div class="col text-center">
                                <h1 id="TituloTabelaDepoisD">
                                    Questões
                                </h1>
                            </div>
                    
                            <div class="col" style="padding-right: 0px;" alt="Coluna vazia pra deixar as coisas ajustadas"> </div>
                        </div>
                    </div>

            <div id="corpoTabela" class="col-md-12"> 

                <div class="table-responsive">    
                <!-- Gambiara do Jão -->  
                @if(count($questions) > 0)

                    <table class="table"> 

                        <thead>
                            <tr>
                                <th id="TituloTabelaNu" scope="col" class="text-center align-middle">#</th>
                                <th id="TituloTabela2No" scope="col" class="text-center align-middle">Nome</th>
                                <th id="TituloTabela3Av" scope="col" class="text-center align-middle">Qtd. de Perguntas</th>
                                <th id="TituloTabela4Ac" scope="col" class="text-center align-middle">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($questions as $question)
                            <tr>
                                <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                    {{ $question['seq'] }}
                                </td>

                                <td id="linkDashboard" class="text-center align-middle">
                                    <a id="linkDashboard" class="custom-link-animation" href="#">
                                        {{ $question['question'] }}
                                    </a>
                                </td>

                                <td id="letraDashboard" class="text-center align-middle">
                                    0
                                </td>

                                <td id="letraDashboard" class="text-center align-middle">
                                            
                                    <div class="d-flex justify-content-center">

                                        <a  id="botaoEditar" class="btn btn-custom mr-2" href="{{ route('questions.edit', ['test' => $test->id, 'question' => $question['id']]) }}" class="btn btn-info edit-btn">
                                            <img id="imgBotoes" src="/img/pencil-square.svg" alt="Ícone Editar">
                                            Editar
                                        </a>

                                        <form action="{{ route('questions.destroy', [ 'id' => $question['id']]) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button id="botaoDeletar" type="submit" class="btn btn-custom">
                                                <img id="imgBotoes" src="/img/x-circle.svg" alt="Ícone Deletar">
                                                <span>
                                                    Deletar
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach  
                            @endif 
                            <tr>
                                <div class="text-center align-center">
                                    <a id="botaoAdicionarAula" class="btn btn-custom animated-button" href="{{ route('questions.create', ['course' => $lesson->course_id, 'lesson' => $lesson->id, 'test' => $test->id]) }}">
                                        Adicionar +
                                    </a> 
                                </div>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>

            <div class="col">
                <div class="d-flex justify-content-end">
                    <input id="botaoCriarC" class="btn btn-custom" form="create_test" type="submit" name="action" value="Atualizar Avaliação">
                </div>
            </div>
            
            @endif
        </div>
    </div>
</div>

@endsection