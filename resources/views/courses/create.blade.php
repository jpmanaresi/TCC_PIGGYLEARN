@extends('layouts.main')

@if(isset($course))
    @section('title', 'PL - Editar Curso') 
@else
    @section('title', 'PL - Criar Curso')           
@endif

@section('content')

    <h1 id="tituloInicialp">
        @if(isset($course))
        Editar Curso   
        @else
        Criar Curso            
        @endif
    </h1>
    <div alt="container-CriarCurso" class="col-md-6 offset-md-3">
        <div id="corpoContainerCC" class="container" >
    
            <div id="corpoCriarCurso">

                <form id="create_course" action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store')}}" method="POST">
                    @csrf

                    <input type="hidden" name="is_edit" value="{{ isset($course) ? 'true' : 'false' }}">
                        
                    <div class="row">
                        <div class="col-md-12">

                            @if(isset($course))
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$course->id}}"> 
                            @endif

                            <div class="form-group">
                                <label id="tituloCriarCurso" for="title" >          Título          </label>
                                <input type="text" id="placeholderTitulo" class="form-control" name="title" placeholder="Inserir Título" @if(isset($course)) value="{{$course->course_title}}"@endif>
                            </div> 
                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label id="descricaoCriarCurso" for="title" >       Descrição       </label>
                                <textarea name="description" id="placeholderDesc" class="form-control" placeholder="Inserir descrição para esse curso">@if (isset($course)){{$course->course_description}}@endif</textarea>
                            </div>
                        </div>
                    </div>

                </form>
                
                <div class="container">
                    <div class="row align-items-center">
                        
                        <div class="col" style="padding-left: 0px;">
                            <a id="botaoVoltar" class="btn btn-custom mr-2" href="{{route('dashboard')}}">
                                <img id="imgBotoes" src="\img\arrow-left-short.svg" alt="icone de voltar">
                                <span>Voltar</span>
                            </a>
                        </div>
                
                        <div class="col text-center">
                            <h1 id="TituloTabelaDepoisD">
                                Aulas
                            </h1>
                        </div>
                
                        <div class="col" style="padding-right: 0px;" alt="Coluna vazia pra deixar as coisas ajustadas"> </div>
                    </div>
                </div>
                
                <div id="corpoTabela" class="col-md-12"> 

                    <div class="table-responsive">
                        @if (isset($course))        
                            <!-- Gambiara do Jão -->  
                        @if(count($lessons) > 0)

                        <table class="table">

                            <thead>
                                <tr>
                                    <th id="TituloTabelaNu"     scope="col" class="text-center align-middle">#</th>
                                    <th id="TituloTabela2No"    scope="col" class="text-center align-middle">Nome</th>
                                    <!-- Quantidades de Aulas -->  
                                    <th id="TituloTabela3Av"    scope="col" class="text-center align-middle">Avaliação</th>
                                    <th id="TituloTabela4Ac"    scope="col" class="text-center align-middle">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($lessons as $lesson)
                            
                                <tr>
                                    <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                        {{ $lesson['seq'] }}
                                    </td>

                                    <td id="linkDashboard" class="col text-center align-middle">
                                        <a id="linkDashboard" class="custom-link-animation" href="#" style="text-overflow: ellipsis;/* white-space: nowrap; */overflow: hidden;">
                                            {{ $lesson['title'] }}
                                        </a>
                                    </td>
                                    
                                    

                                    <td id="letraDashboard" class="text-center align-middle">
                                        @if ($lesson['hasTest']==1) <p id="linkDashboard" class="custom-link-animation">Tem</p>
                                        @else Não Tem
                                        @endif
                                    </td>

                                    <td id="letraDashboard" class="text-center align-middle">
                                                
                                        <div class="d-flex justify-content-center">

                                            <a id="botaoEditar" class="btn btn-custom mr-2" href="{{route('lessons.edit', ['course' => $course->id, 'lesson' =>$lesson['id']])}}">
                                                <img id="imgBotoes" src="/img/pencil-square.svg" alt="Ícone Editar">
                                                <span>Editar</span>
                                            </a>
                                                    
                                            <form action="{{route('lessons.destroy', ['course' => $course->id, 'id' =>$lesson['id']])}}" method="POST">
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
                                @endforeach
                                <tr> 
                                    <td colspan="4" class="text-center align-center" style="border-bottom-width: 0px; padding-bottom: 0px">
                                        <a id="botaoAdicionarAula" class="btn btn-custom animated-button" href="/courses/{{$course->id}}/lessons/create">
                                            Adicionar +
                                        </a>
                                    </td>
                                </tr> <!-- Botão de Criar Aulas depois de já existir uma tabela com algumas/uma aulas -->
                            </tbody>
                        </table>
                                
                        @else
                            <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                                <p id="textoSemAula">
                                    Este Curso ainda não possui Aulas.
                                </p>
                                <a id="botaoAdicionarAula"  href="/courses/{{$course->id}}/lessons/create" class="btn btn-custom animated-button">
                                    Adicionar?
                                </a>
                            </div>
                        @endif

                        @else
                            <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                                <p id="textoSemAula" class="align-self-center">
                                    Este Curso ainda não possui Aulas.
                                </p>
                                <input type="hidden" name="create_course_and_add_lesson" value="1">
                                <input form="create_course" id="botaoAdicionarAula" name="action" type="submit" class="btn btn-custom animated-button" value="Adicionar?">
                            </div>
                        @endif                            
                    </div>
                </div> 
                        
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col d-flex align-items-center" style="padding-left: 0px;">
                            <input form="create_course" id="visible" type="checkbox" name="setvisible" value="1"{{ isset($course) && $course->setvisible == 1 ? 'checked' : '' }}>
                            <label id="TestoTornarV" for="visible">
                                Tornar Curso Visível
                            </label>
                        </div>
                        
                        <div class="col d-flex justify-content-end" style="padding-right: 0px;">
                            <input id="botaoCriarC" class="btn btn-custom" form="create_course" type="submit" name="action" value="{{ isset($course) ? 'Salvar Alterações' : 'Criar Curso' }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection