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

<nav class="navbar nav-border" id="nav">
  <div class="container-fluid">

    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
      Perfil Menu</button>
      <!-- Obs: Depois de abrir o offcanvas, se clicar fora o menu continua aberto.
      Procurar jeito de como fazer com que ele suma ao clicar fora do menu. -->

      <a href="/index" class="navbar-brand">
        <img src="img/icon-piggy(semcopy).png" width="40px" id="IconePorquinho">
      </a>
  </div>
</nav> 
      
<!-- Offcanvas -->

<div class="offcanvas offcanvas-start text-white" data-bs-theme="dark" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" style="color: " id="offcanvasScrollingLabel">
    Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body " id="sideBar">
    <div class="d-grid gap-2">
      <button id="botoesMenus" class="btn btn-custom text-start border-start-0 border-end-0" type="button">Button</button>
      <button id="botoesMenus" class="btn btn-custom text-start border-start-0 border-end-0" type="button">Button</button>
    </div>
  </div>
</div>

<!-- Conteudo -->

              
        
    
          


<!-- Conteudo da pagina que fica na view welcome -->

      @yield('content')



<!-- Footer -->

      <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            
          </ul>
          <p class="text-center text-muted">&copy; 2023 PiggyLearn, Inc</p>
        </footer>
      </div>
    

    </body>
</html>