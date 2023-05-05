@extends('layouts.main')

@section('title', 'PL - Meus Cursos')

@section('content')

<div class="container" id="dashboard-background">
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Cursos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($courses) > 0)
    <table class="table">
        <thead>
            <tr>
                <th id="letra-tr" scope="col">#</th>
                <th id="letra-tr" scope="col">Nome</th>
                <th id="letra-tr" scope="col">Participantes</th>
                <th id="letra-tr" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td id="letra-tr" scropt="row">{{ $loop->index + 1 }}</td>
                    <td  ><a id="letra-tr" href="/courses/show/{{ $course->id }}">{{ $course->course_title }}</a></td>
                    <td id="letra-tr">0</td>
                    <td id="letra-tr">
                        <a id="letra-tr" href="/courses/{{$course->id}}/edit" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="#" method="POST">
    
                            <button  id="letra-tr" type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
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
</div>
@endsection
