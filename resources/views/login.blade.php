@extends('layouts.main')

@section('title', 'PL - Login')
    
@section('content')

<h1 style="text-align: center; padding-top: 10rem; padding-bottom: 4rem; font-family:Carlito">
  Login
</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-gradient-custom" id="cardLogin">
          <div class="card-body">
            <h5 class="card-title">Criar Conta</h5>
            <hr>
            <form>
              <div class="mb-3">
                <label for="usuario" class="form-label">
                  Usuário
                </label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu nome de usuário">
              </div>
              
              <div class="mb-3">
                <label for="email" class="form-label">
                  E-mail
                </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
              </div>

              <div class="mb-3">
                <label for="senha" class="form-label">
                  Senha
                </label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
              </div>

              <button type="submit" class="btn btn-primary">
                Enviar
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
@endsection