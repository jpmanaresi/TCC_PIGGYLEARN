@extends('layouts.main')

@section('title', 'PL - Criar curso')
    
@section('content')

<div id="course-create-container" class="col-md-6 offset-md-3">

    <h1>Criar Curso</h1>
        <form action="/courses" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" >Título do curso:</label>
            <input type="text" id="title" class="form-control"name="title" placeholder="Nome do Curso">
        </div>
        <div class="form-group">
            <label for="title" >Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que será ensinado?"></textarea>
        </div>
</div>
        <input type="submit" value="Criar Curso" class="btn btn-primary">
        </form>

</div>

@endsection
