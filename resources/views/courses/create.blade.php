@extends('layouts.main')

@section('title', 'PL - Criar curso')
    
@section('content')

<div alt="course-create-container" class="col-md-6 offset-md-3">

    <h1 id="tituloInicialC">
        Criar Curso
    </h1>
        
    <div id="corpoCriarCurso">

        <form action="/courses" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
              <label  id="tituloCurso1" for="title" >Título do curso:</label>
              <input type="text" id="title" class="form-control"name="title" placeholder="Nome do Curso">
        </div>

        <div class="form-group">
            <label id="tituloCurso1" for="title" >Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que será ensinado?"></textarea>
        </div>

        <input id="botaoCriar" type="submit" value="Criar Curso" class="btn btn-primary">
        </form>

    </div>

</div>
        
@endsection
