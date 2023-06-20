<!DOCTYPE html>
<html lang="pt-br {{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">

    <!-- Fonte dos Titulos e Afins  -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inria+Sans" rel="stylesheet">
    <!---->

    <title>@yield('title')</title>

</head>

<body id="background">

  <!-- Navbar (N) -->
    <nav class="navbar nav-border fixed-top" id="nav">
      <div class="container-fluid" alt="botaoMenu" >
    
        <a href="#" class="btn btn-custom d-flex align-items-center" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
          <div class="col-auto">
            <img width="25px" src="/img/User-60.svg" alt="Icone Usuario">
          </div> 

          <div class="col d-flex align-items-center ms-2">
            <img width="15px" src="/img/list.svg" alt="Tres barrinhas">
          </div>
        </a>

        <!-- Contas (C) -->      
          @guest
            <div>
              <a href="/login" id="botoesEntrarNav" class="btn btn-custom text-start" type="button" style=""> 
                Login   
              </a>
              <a href="/register" id="botoesCriarCoNav" class="btn btn-custom text-start animated-button" type="button" > 
                Criar Conta   
              </a>
            </div>

          @endguest
        <!-- C -->
        
        <!-- Modo Dark ta sem funcionar. Criar a função depois. Obs: criar uma animação pra quando trocar de modo 
          
        <a href="" id="modoDarkNB">  
          <img src="\img\moon-stars.svg" style="color: aliceblue" alt="">
        </a>
        
        -->

      </div>
    </nav>
  <!-- N -->

  <!-- SideBar (SB) -->  
    <div class="offcanvas offcanvas-start text-white navbar-fixed-top offcanvas-custom" data-bs-theme="dark" data-bs-backdrop="false" data-bs-scroll="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="border-right-width: 0px;">
      <div id="sidebar-linhaCima" class="offcanvas-header btn-custom">
        
        <div class="d-flex align-items-center" >
          <img src="/img/PorquinhoLogo.svg" alt="Logo Porquinho" id="imgOpcoes">
          <h4 id="tituloInicialsb" class="offcanvas-title" id="offcanvasScrollingLabel">
              Opções
          </h4>
        </div>
      
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"> </button>

      </div>

      <div class="offcanvas-body" id="sideBar">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <a href="/" id="botoesMenus" class="btn btn-custom btn-block btn-lg text-start"> 
              <img id="botoesImg" src="/img/house.svg" alt="Icone Pagina Destaques">
              Destaques
            </a>
          </div>

          @auth
      
          <div class="col-md-6">
            <a href="/profile" id="botoesMenus" class="btn btn-custom btn-block btn-lg text-start"> 
              <img id="botoesImg" src="/img/file-person.svg" alt="Icone Perfil">
              Meu Perfil
            </a>
          </div>

          <div class="col-md-6">
            <a href="/dashboard" id="botoesMenus" class="btn btn-custom btn-block btn-lg text-start"> 
              <img id="botoesImg"  src="/img/card-list.svg" alt="Icone Cursos"> 
              Meus Cursos 
            </a>
          </div>
          @if (auth()->user()->usertype ==2)
          <div class="col-md-6">
            <a href="/courses/create" id="botoesMenus" class="btn btn-custom btn-block btn-lg text-start" > 
              <img id="botoesImg" src="/img/pencil-fill.svg" alt="Icone Editar">
              Criar Curso  
            </a>
          </div>
          @endif
          @endauth
          <div class="col-md-6">
            <a href="/calculator" id="botoesMenus" class="btn btn-custom btn-block btn-lg text-start"> 
              <img id="botoesImg" src="\img\calculator.svg" alt="Icone Perfil">
              Calculadora
            </a>
          </div>
        </div>
      </div>
      
      
      
      <!-- Creditos -->
      <div class="container">
      
        @auth <!-- Botão de Sair -->
        <form action="/logout" method="post" class="mt-auto">
          @csrf
            <a href="/login" id="botoesMenusS" class="btn btn-custom btn-block btn-lg text-start" type="button" onclick="event.preventDefault(); this.closest('form').submit();"> 
              <img id="botoesImg" src="/img/box-arrow-in-right.svg" alt="Icone de Sair">
              Sair da Conta
            </a>
        </form>
        @endauth

        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3"> </ul>
            <p class="text-center text-muted">
            &copy; 2023 PiggyLearn, Inc </p>
        </footer>

      </div>

    </div>
  <!-- SB --> 

  <main> <!-- Conteudo -->
    
    <div id="corpot"> 
      <div class="container-fluid">
        <div class="row">

          @if(session('msg'))
            <div id="mensagemCard" class="card">
              <div class="card-body">
                <p id="mensagem" class="msg">
                  {{ session('msg') }}
                </p>
              </div>
            </div>
          @endif
    
      @yield('content')
      
    </div>       
  </main>

</body>   
</html>