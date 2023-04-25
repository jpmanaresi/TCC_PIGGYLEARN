@extends('layouts.main')

@section('title', 'PL - Criar Curso')
    
@section('content')

<div alt="course-create-container" class="col-md-6 offset-md-3">

    <h1 id="tituloInicialC">
        Criar Curso
    </h1>
        
    <div id="corpoCriarCurso">
    <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="POST">
    @csrf

    <input type="hidden" name="is_edit" value="{{ isset($course) ? 'true' : 'false' }}">
        <div class="row">
            <div class="col-md-6">
            @if(isset($curso))
             @method('PUT')
            @endif
                    <div class="form-group">
                        <label id="tituloCriarCurso" for="title" >Título:</label>
                        <input type="text" id="title" class="form-control" name="title" placeholder="Nome do Curso">
                    </div>
                
            </div>
            <div class="col-md-6">
                <div id="descricaoCriarCurso">
                    <div class="form-group">
                        <label id="tituloCriarCurso" for="title" >Descrição:</label>
                        <textarea name="description" id="description" class="form-control" placeholder="O que será ensinado?"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <input id="botaoCriar" type="submit" class="btn btn-custom" type="submit" value="{{ isset($course) ? 'Atualizar' : 'Criar' }}" >
        <button  ></button>
        <div class="col-md-10 offset-md-1 dashboard-title-container">
            <h1>Meus Eventos</h1>
        </div>
            <div class="col-md-10 offset-md-1 dashboard-events-container">
                @if(count($courses) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td scropt="row">{{ $loop->index + 1 }}</td>
                                <td><a href="/courses/{{ $course->id }}">{{ $course->course_title }}</a></td>
                                <td>0</td>
                                <td>
                                    <a href="#" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                                    <form action="#" method="POST">
                
                                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
                @else
                <p>Você ainda não tem eventos, <a href="/courses/create">criar evento</a></p>
                @endif
            </div>
        </form>
    </div>
    

</div>


@endsection
