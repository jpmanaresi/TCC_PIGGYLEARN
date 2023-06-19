@extends('layouts.main')

@if(isset($lesson))
    @section('title', 'PL - Editar Aula') 
@else
    @section('title', 'PL - Criar Aula')           
@endif
    
@section('content')

<h1 id="tituloInicialp">
    @if(isset($lesson))
    Editar Aula   
    @else
    Criar Aula            
    @endif
</h1>

<div alt="container-CriarCurso" class="col-md-6 offset-md-3">
    <div id="corpoContainerCC" class="container">
        
        <div id="corpoCriarCurso">

            <form id="create_lesson" action="{{ isset($lesson) ? route('lessons.update', ['id'=>$lesson->course_id,'lesson_id'=> $lesson->id]) : route('lessons.store', $course->id)}}" method="POST">
                @csrf
        
                @if(isset($lesson))
                    <input type="hidden" name="id" value="{{$lesson->id}}"> 
                    @method('PUT')
                @endif

                <input type="hidden" name="course_id" value="{{ $course->id }}">

                <div class="form-group">
                    <label id="tituloCriarCurso" for="title">          Título da Aula          </label>
                    <input type="text" class="form-control" id="placeholderTitulo" name="title" placeholder="Inserir Titulo" @if(isset($lesson)) value="{{$lesson->title}}"@endif>
                </div>

                <div class="form-group">
                    <label id="descricaoCriarCurso" for="title">       Conteudo      </label>
                    <textarea name="content" id="placeholderDesc" class="form-control" placeholder="Qual o conteúdo desta aula?">@if (isset($lesson)){{$lesson->content}}@endif</textarea>
                </div>

            </form>

            <div class="form-group">
                
                
                <div class="container">
                    <div class="row align-items-center">
                
                        <div class="col" style="padding-left: 0px;">
                            <a id="botaoVoltar" class="btn btn-custom mr-2" href="#">
                                <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                                <span>Voltar</span>
                            </a>
                        </div>
                
                        <div class="col text-center">
                            <h1 id="TituloTabelaDepoisD">
                                Avaliação
                            </h1>
                        </div>
                
                        <div class="col" style="padding-right: 0px;" alt="Coluna vazia pra deixar as coisas ajustadas"> </div>
                    </div>
                </div>

                <div id="corpoTabela" class="col-md-12"> 
                    @if (isset($lesson))        
                        @if($lesson->hasTest == 1)

                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th id="TituloTabela2No" scope="col" class="text-center align-middle">Nome</th>
                              <!--       <th id="TituloTabelaNu" scope="col" class="text-center align-middle">Qtd.</th>  -->
                                    <th id="TituloTabela4Ac" scope="col" class="text-center align-middle">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td id="letraDashboard" class="text-center align-middle">
                                        <a id="linkDashboard" class="custom-link-animation" href="#">{{ $test['title'] }}</a>
                                    </td>

                                   <!--  <td id="letraDashboard" class="text-center align-middle">
                                        0
                                    </td>  -->  

                                    <td id="letraDashboard" class="text-center align-middle">

                                        <div class="d-flex justify-content-center">
                                            <a id="botaoEditar" class="btn btn-custom mr-2" href="{{ route('tests.edit', ['lesson' => $lesson->id, 'test' => $test->id]) }}" class="btn btn-info edit-btn">
                                                <img id="imgBotoes" src="/img/pencil-square.svg" alt="Ícone Editar">
                                                <span>Editar</span>
                                            </a>

                                            <form action="{{ route('tests.destroy', ['lesson' => $lesson->id, 'id' => $test->id]) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button id="botaoDeletar" type="submit" class="btn btn-custom">
                                                    <img id="imgBotoes" src="/img/x-circle.svg" alt="Ícone Deletar">
                                                    <span>Deletar</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @else
                            <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                            
                                <span id="textoSemAula">
                                    Esta Aula Não Possui Avaliação,
                                </span>

                                <a id="botaoAdicionarAula" class="btn btn-custom animated-button" href="{{route('tests.create',['id' => $course->id, 'lesson'=> $lesson->id])}}">
                                    Adicionar?
                                </a>
                            </div>
                        @endif

                        @else
                            <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                                <input type="hidden" name="create_lesson_and_add_test" value="1">
                                <span id="textoSemAula">
                                    Esta Aula Não Possui Avaliação,
                                </span>

                                <input form="create_lesson" id="botaoAdicionarAula" type="submit" class="btn btn-custom animated-button" name="action" value="Adicionar?">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex justify-content-end">
                        <input id="botaoCriarC" class="btn btn-custom" form="create_lesson" type="submit" name="action" value="{{ isset($lesson) ? 'Atualizar Aula' : 'Criar Aula' }}">
                    <!-- Falta ter um aviso de "curso criado" -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection