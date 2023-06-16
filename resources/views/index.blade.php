@extends('layouts.main')

@section('title', 'PL - Inicio')
    
@section('content')

  <h1 id="tituloInicialp">
    Destaques
  </h1>

  <div class="container">
      <div class="row">  

        @foreach ($courses as $course) 

          <div class="col-md-6 mb-4">
            <div id="cardBodyIndex1" class="card">
              <a href="{{route('courses.show',['id'=> $course->id])}}"><div id="cardJenalaIndex" class="card-body">
                <h5 id="tituloCardIndex1" class="card-title">
                {{$course->course_title}}
                </h5>

                <p id="cardDescIndex" class="card-text">
                  {{$course->course_description}} 
                </p>
              </div>
            </div> </a>
          </div>

        @endforeach       

@endsection


