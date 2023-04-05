<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/app.css">

        <title>@yield('title')</title>
    </head>
<body>

<!-- Navbar -->
    <nav class="navbar nav-border bg-dark navbar-dark" id="navbar">
        <div class="container-fluid">

<!-- Sidebar -->
    <div class="offcanvas offcanvas-start" id="demo">
        <div class="offcanvas-header">
        <h1 class="offcanvas-title">Conta</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body" id="sidebar">
        <p>Some text lorem ipsum.</p>
        <p>Cursos</p>
        </div>
    </div>
  
  <!-- Icone do Offcanvas-->

  <a class="navbar-brand" href="#">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
        <span class="navbar-toggler-icon" id="navbar"><img src="img/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24"></span>
      </button>
  </a>
  
  
 <!-- Barra de pesquisa -->
    <form class="d-flex d-flex-size rounded-pill" id="navbar">
        <input type="text" class="form-control m-2 rounded-pill" placeholder="Barra de Pesquisa" style="text-align: center;">
        <button class="btn btn-tertiary m-2" style="color: violet">
            <span class="material-symbols-outlined">
                    Buscar
            </span>
        </button>
    </form>        
              
              <a href="#" class="navbar-brand">
                <img src="img/icon-piggy.png" width="60px"/>
              </a>
              
            </div>
          </nav>
    
          <br> <br> <br>
    
          <h1 style="text-align: center;">TELA INICIAL</h1>
    
          <br> <br>

      @yield('content')

<!-- Footer -->
      <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
          </ul>
          <p class="text-center text-muted">&copy; 2023 PiggyLearn, Inc</p>
        </footer>
      </div>
    

    </body>
</html>