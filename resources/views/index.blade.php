@extends('layouts.main')

@section('title', 'PL - Inicio')
    
@section('content')


    <h1 id="tituloInicialI">
        Tela Inicial
    </h1>

    

    <div class="container">
        <div class="row">  

          @foreach ($courses as $course) 

            <div class="col-md-6 mb-4">
              <div id="cardBodyIndex1" class="card">
                <a href="/courses/show/{{$course->id}}"><div id="cardJenalaIndex" class="card-body">
                  <h5 id="tituloCardIndex1" class="card-title">
                  {{$course->course_title}}
                  </h5>

                  <p id="cardDescIndex" class="card-text">
                    {{$course->course_description}} 
                  </p>
                </div>
              </div></a>
            </div>

          @endforeach

          <div class="col-md-6 mb-4">
            <div id="cardBodyIndex2" class="card">
              <div id="cardJenalaIndex" class="card-body">
                <h5 id="tituloCardIndex2" class="card-title">
                  Titulo Foda
                </h5>

                <p id="cardDescIndex" class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec nibh dolor, gravida ac consequat sit amet, posuere sit amet augue. 
                    Donec lobortis id nunc et iaculis. Nunc nisl mi, venenatis non tristique eget, lobortis sit amet nulla. 
                    Maecenas vulputate odio id ipsum sodales convallis. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div id="cardBodyIndex2" class="card">
              <div id="cardJenalaIndex" class="card-body">
                <h5 id="tituloCardIndex2" class="card-title">
                  Titulo Muito Foda
                </h5>

                <p id="cardDescIndex" class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec nibh dolor, gravida ac consequat sit amet, posuere sit amet augue. 
                    Donec lobortis id nunc et iaculis. Nunc nisl mi, venenatis non tristique eget, lobortis sit amet nulla. 
                    Maecenas vulputate odio id ipsum sodales convallis. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div id="cardBodyIndex2" class="card">
              <div id="cardJenalaIndex" class="card-body"> 
                <h5 id="tituloCardIndex2" class="card-title">
                  Vai se Lascar vai
                </h5>

                <p id="cardDescIndex" class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec nibh dolor, gravida ac consequat sit amet, posuere sit amet augue. 
                    Donec lobortis id nunc et iaculis. Nunc nisl mi, venenatis non tristique eget, lobortis sit amet nulla. 
                    Maecenas vulputate odio id ipsum sodales convallis. 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
         
      

@endsection


