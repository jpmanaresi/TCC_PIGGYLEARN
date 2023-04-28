@extends ('layouts.main')

@section('title', $course->title ) 

@section('content')


<div class="container-md" id="showborda">
<div class="row">
    <div id="info-container" class="col">
        
        <h1 id="tituloCurso">{{$course->course_title}}</h1>

    </div>

    <span id="regua"></span>

    <div class="col-md-12" id="description-container">

        <h2 id="h2-show1">Sobre o curso:</h2>

        <p id="p-show1" class="event-description">{{$course->course_description}}</p>
        
    </div>
</div>

</div>
@endsection




