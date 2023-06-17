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

<!-- Criar Curso (CC) --> 
<div alt="container-CriarCurso" class="col-md-6 offset-md-3">
    <div id="corpoContainerCC" class="container" >

        <!-- Card Criar Curso (CCC) -->      
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
                            <input type="text" class="form-control" name="title" placeholder="Inserir Título" @if(isset($course)) value="{{$course->course_title}}"@endif>
                        </div> 

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label id="descricaoCriarCurso" for="title" >       Descrição       </label>
                                <textarea name="description" id="placeholderDesc" class="form-control" placeholder="Inserir Descrição">@if (isset($course)){{$course->course_description}}@endif</textarea>
                            </div>

                        </div>

                    </div>
                </form>
                    <h1 class="text-center align-self-center" style="margin: 15px; font-weight: bold">
                        Aulas
                    </h1> 
                    
                    <div id="corpoTabela" class="col-md-12"> 

                        <div class="table-responsive">
                            @if (isset($course))        
                                <!-- Gambiara do Jão -->  
                            @if(count($lessons) > 0)

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th id="TituloTabela" scope="col" class="text-center align-middle">#</th>
                                        <th id="TituloTabela" scope="col" class="text-center align-middle">Nome</th>
                                        <!-- Quantidades de Aulas -->  
                                        <th id="TituloTabela" scope="col" class="text-center align-middle">Tem teste?</th>
                                        <th id="TituloTabela" scope="col" class="text-center align-middle">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($lessons as $lesson)
                                    <tr>

                                        <td id="letraDashboard" scropt="row" class="text-center align-middle">
                                            {{ $lesson['seq'] }}
                                        </td>

                                        <td id="linkDashboard" class="text-center align-middle">
                                            <a id="linkDashboard" href="#" class="custom-link-animation">
                                                {{ $lesson['title'] }}
                                            </a>
                                        </td>

                                        <td id="letraDashboard" class="text-center align-middle">
                                            @if ($lesson['hasTest']==1) Sim
                                            @else Não
                                            @endif
                                        </td>

                                        <td id="letraDashboard" class="text-center align-middle">
                                            <div class="d-flex flex-column align-items-center">

                                                <a id="botaoEditar" class="btn btn-custom btn-padrao"  href="{{ route('lessons.edit', ['course' => $course->id, 'lesson' => $lesson['id']]) }}">
                                                    <img src="/img/pencil-square.svg" alt="Ícone Editar" class="iconebotao">
                                                    <span>Editar</span>
                                                </a>
                                                
                                                <form action="{{ route('lessons.destroy', ['course' => $course->id, 'id' => $lesson['id']]) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="botaoDeletar" type="submit" class="btn btn-custom btn-padrao">
                                                        <img src="/img/x-circle.svg" alt="Ícone Deletar" class="iconebotao">
                                                        <span>Deletar</span>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach

                                    <tr> 
                                        <td colspan="4" class="text-center align-center" style="border: 0px"> <!-- Botão de Criar Aulas depois de já existir uma tabela com algumas/uma aulas -->
                                            <a href="/courses/{{$course->id}}/lessons/create" id="botaoAdicionarAula" class="btn btn-custom animated-button">
                                                Adicionar +
                                            </a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                            
                            
                            @else
                                <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                                    <p id="textoSemAula">Este Curso ainda não possui Aulas.</p>
                                    <a id="botaoAdicionarAula"  href="/courses/{{$course->id}}/lessons/create" class="btn btn-custom animated-button">Adicionar Aula
                                    </a>
                                </div>
                            @endif

                            @else
                                <div class="d-flex flex-wrap align-items-center justify-content-center text-center">
                                    <p id="textoSemAula" class="align-self-center mt-3">Este Curso ainda não possui Aulas.</p>
                                    <input type="hidden" name="create_course_and_add_lesson" value="1">
                                        <input form="create_course" id="botaoAdicionarAula" name="action" type="submit" class="btn btn-custom animated-button" value="Adicionar Aula">
                                     
                                </div> <!-- Botão de criar aula -->
                            @endif

                            
                        </div>
                    </div> 
                    
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-start">
                                <input id="ChecktornarVisisel" form="create_course" id="visible" type="checkbox" name="setvisible" value="1"{{ isset($course) && $course->setvisible == 1 ? 'checked' : '' }}>
                                <label id="tornarVisisel" for="visible">Tornar Curso Visível</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <input form="create_course" id="botaoCriarC" class="btn btn-custom" type="submit" name="action" value="{{ isset($course) ? 'Salvar Alterações' : 'Criar Curso' }}">
                                <!-- Falta ter um aviso de "curso criado" -->
                            </div>
                        </div>
                    </div>
                    

            </div>
        <!-- CCC --> 
    </div>
<!-- CC --> 

@endsection