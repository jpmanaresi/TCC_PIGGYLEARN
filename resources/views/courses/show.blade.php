@extends ('layouts.main')

@section('title', $course->title ) 

@section('content')
<<<<<<< HEAD
=======


<div class="container-md" id="showborda">
<div class="row">
    <div id="info-container" class="col">
        
        <h1 id="tituloCurso">{{$course->course_title}}</h1>

    </div>

    <span id="regua"></span>

    <div class="col" id="description-container">

        <h2 id="h2-show1">Sobre o curso:</h2>

        <p id="p-show1" class="event-description">{{$course->course_description}}</p>
        
    </div>
</div>
>>>>>>> 41ec641626eaec17a69243e9beb062169bc86fc7

<div class="container" id="course-show-container">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-6">
                <h1>{{$course->course_title}}</h1>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o curso:</h3>
                <p class="event-description">{{$course->course_description}}</p>
            </div>
        </div>
    </div>
</div>
@endsection




