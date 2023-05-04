@extends ('layouts.main')

@section('title', $course->title ) 

@section('content')

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




