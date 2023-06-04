<!DOCTYPE html>
<html lang="pt-br {{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="/css/app.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
      
      <title>@yield('title')</title>


  </head>
<body id="background">


  <!-- Navbar -->
    <nav class="navbar nav-border fixed-top" id="nav">
      <div class="container-fluid" alt="botaoMenu" >
    
        <a href="#" class="btn btn-custom d-flex align-items-center" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
          <div class="col-auto">
            <img width="35px" src="/img/User-60.svg" alt="Icone Porquinho">
          </div> 

          <div class="col d-flex align-items-center ms-2">
            <img style="" width="25px" src="/img/list.svg" alt="Tres barrinhas">
          </div>
        </a>
              
        @guest

          <div>
            <a href="/login" id="botoesEntrarNav" class="btn btn-custom text-start" type="button" > 
              Login   
            </a>
            <a href="/register" id="botoesCriarCoNav" class="btn btn-custom text-start" type="button" > 
              Criar Conta   
            </a>
          </div>

        @endguest

      </div>
    </nav>
    
  <!-- Offcanvas -->  
    <div class="offcanvas offcanvas-start text-white navbar-fixed-top" data-bs-theme="dark" data-bs-backdrop="false" data-bs-scroll="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div id="sidebar-linhaCima" class="offcanvas-header btn-custom">

        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

          <img src="/img/PorquinhoLogo.svg" alt="Logo Porquinho" id="botoesImgMenu">

          <h4 id="tituloInicialSB" class="offcanvas-title" id="offcanvasScrollingLabel">
            Menu
          </h4>

        </div>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      
      </div>


      <div class="offcanvas-body" id="sideBar">
        <div class="d-grid gap-2">
          
          <a href="/" id="botoesMenus" class="btn btn-custom text-start" type="button"> 
            <img id="botoesImg" src="/img/house.svg" alt="Icone Pagina Inicial">
            Tela Inicial 
          </a>

        @auth

          <a href="/profile" id="botoesMenus" class="btn btn-custom text-start" type="button"> 
            <img id="botoesImg" src="/img/file-person.svg" alt="Icone Perfil">
            Meu Perfil
          </a>


          <a href="/courses/create" id="botoesMenus" class="btn btn-custom text-start" type="button" > 
            <img id="botoesImg" src="/img/pencil-fill.svg" alt="Icone Editar">
            Criar Curso  
          </a>

          <a href="/dashboard" id="botoesMenus" class="btn btn-custom text-start" type="button"> 
           <img id="botoesImg"  src="/img/card-list.svg" alt="Icone Cursos"> 
           Cursos (DashBorad)
          </a>

          <form action="/logout" method="post" class="mt-auto">
            @csrf

            <a href="/login" id="botoesMenusS" class="btn btn-custom text-start" type="button" onclick="event.preventDefault();
            this.closest('form').submit();"> 
              <img id="botoesImg" src="/img/box-arrow-in-right.svg" alt="Icone de Sair">
              Sair
            </a>

          </form>

        @endauth

        </div>
      </div>
      
      <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3"> </ul>
            <p class="text-center text-muted" style="padding-bottom: 3rem; padding: 0">
              &copy; 2023 PiggyLearn, Inc
            </p>
        </footer>
      </div>

    </div>

    
    
  <!-- Conteudo -->

  <main>
    
    <div id="corpot"> 
      <div class="container-fluid">
        <div class="row">
            @if(session('msg'))
            <p class="msg">{{session('msg')}}</p>
            @endif
        </div>
    </div>
    
      @yield('content')
      
    </div> 
      
  </main>


</body>
    
</html>