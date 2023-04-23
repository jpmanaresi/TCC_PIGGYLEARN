@extends('layouts.main')

@section('title', 'PL - Criar Curso')
    
@section('content')

<div alt="course-create-container" class="col-md-6 offset-md-3">

    <h1 id="tituloInicialC">
        Criar Curso
    </h1>
        
    <div id="corpoCriarCurso">
        <div class="row">
            <div class="col-md-6">
                <form action="/courses" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label id="tituloCriarCurso" for="title" >Título:</label>
                        <input type="text" id="title" class="form-control" name="title" placeholder="Nome do Curso">
                    </div>
                </form>
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
        <input id="botaoCriar" type="submit" value="Criar Curso" class="btn btn-custom">
    </div>
    

</div>


@endsection
