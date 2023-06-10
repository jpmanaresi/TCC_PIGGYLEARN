@extends('layouts.main')

@if(isset($course))
    @section('title', 'PL - Editar Curso') 
@else
    @section('title', 'PL - Criar Curso')           
@endif

    
@section('content')

<!-- Criar Curso (CC) --> 
    <div alt="course-create-container" class="col-md-6 offset-md-3">
        <div class="container" id="dashboard-background-create" style= "padding-left: 0px; padding-right: 0px;" >

        <h1 id="tituloInicialp">
            @if(isset($course))
            Editar Curso   
                  @else
                  Criar Curso            
            @endif
        </h1>

        <!-- Card Criar Curso (CCC) (VOCE TA AQUI FILHA DA PUTA) -->      
            <div id="corpoCriarCurso">
                <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store')}}" method="POST">
                    @csrf

                    <input type="hidden" name="is_edit" value="{{ isset($course) ? 'true' : 'false' }}">
                    
                    <div class="row">
                        <div class="col-md-12">

                            @if(isset($course))
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$course->id}}"> 
                            @endif

                            <div class="form-group">
                                <label id="tituloCriarCurso" for="title" >      Título      </label>
                                <input type="text" id="titlecriar" class="form-control" name="title" placeholder="Inserir Título" @if(isset($course)) value="{{$course->course_title}}"@endif>
                            </div> 

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label id="descricaoCriarCurso" for="title" >      Descrição   </label>
                                <textarea name="description" id="titlecriar" class="form-control" placeholder="Inserir Descrição">@if (isset($course)){{$course->course_description}}@endif</textarea>
                            </div>

                        </div>

                    </div>
        
                    <h1 class="text-center align-self-center" style="margin: 15px; font-weight: lighter">
                        Aulas
                    </h1> 
                    

                    <div style="background-color: aqua"> 

                        <div class="col-md-10 offset-md-1 dashboard-events-container">
                                @if (isset($course))        
                                    </form> <!-- Gambiara do Jão -->  
                                @if(count($lessons) > 0)

                            <table class="table"> 

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col"></th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($lessons as $lesson)
                                        <tr>
                                            <td scropt="row">{{ $lesson['seq'] }}</td>
                                            <td><a href="#">{{ $lesson['title'] }}</a></td>
                                            <td>0</td>
                                            <td>
                                                <a href="{{ route('lessons.edit', ['course' => $course->id, 'lesson' => $lesson['id']]) }}" class="btn btn-info edit-btn">Editar</a> 
                                                <form action="{{ route('lessons.destroy', ['course' => $course->id, 'id' => $lesson['id']]) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
        
                                        <tr>
                                            <td scropt="row"></td>
                                            <td colspan="4">
                                            <a href="/courses/{{$course->id}}/lessons/create" id="botaoAdicionarAula"  class="btn btn-custom">Adicionar Aula</a> 
                                            </td>
                                        </tr>    
                                </tbody>

                            </table>

                            @else
                                <div id="divcriaraula">
                                    <p id="cortexto">Este curso ainda não possui aulas</p><a id="botaoCriarAulas" class="btn btn-custom" href="/courses/{{$course->id}}/lessons/create">Adicionar Aula</a>
                                </div>
                            @endif

                            @else
                                <input type="hidden" name="create_course_and_add_lesson" value="1">
                                <button id="botaoCriar" type="submit" class="btn btn-custom">Adicionar Aula</button>
                                <!-- Botão de criar aula -->
                            @endif

                        </div>
                    </div>

                <input id="botaoCriar" class="btn btn-custom text-md-center " type="submit" name="action" value="{{ isset($course) ? 'Salvar' : 'Criar' }}" >
                <!-- Falta ter um aviso de "curso criado" -->
            </form> 
            </div>
        <!-- CCC --> 
    </div>
<!-- CC --> 

@endsection