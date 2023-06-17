@extends('layouts.main')

@section('title', 'PL - Entrar')

@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div id="cardLogin" class="card">

            <div id="tituloCardlogin" class="card-header">Area de Login</div>
                <div id="cardLogin2" class="card-body">

                    <form method="POST"action="{{ route('login') }}">
                        @csrf

                        <div class="container text-start">  
                            
                            <div class="row">   
                                <div class="col">             
                                    <label id="tituloPlaceH" for="email" class="col">{{ __('Endereço de Email') }}</label>

                                    <div id="plcaceHoldersL" class="col">
                                        <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email') <!-- A mensagem alem de estar em vermrlho, está em ingles. Tem como mudar? -->
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                            </div>
                            
                            <div class="row"> 
                                <div class="col">
                                    <label id="tituloPlaceH" for="password" class="col">{{ __('Senha') }}</label>

                                    <div id="plcaceHoldersL" class="col">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password') <!-- A mensagem alem de estar em vermrlho, está em ingles. Tem como mudar? -->
                                            <span class="invalid-feedback" role="alert" id="fontelogin">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>    
                        
                            <div class="row">
                                <div class="col">
                                    <div id="checkLembrarU" class="form-check">
                                        <input id="checkLembrarU" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label id="lembrarUsuario" class="form-check-label" for="remember">
                                            {{ __('Lembrar de mim') }}
                                        </label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col text-end">
                                        <a class="btn btn-custom" id="botaoEsqueciS" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            
                        

                            <div class="container text-center">
                                <div class="row">

                                    <div class="col">
                                        <button type="submit" class="btn btn-custom" id="botaoEntrar">
                                            {{ __('Entrar') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                 
                        <footer id="footerAreaL">
                            <div class="container text-center">    
                                <div class="row">   
                                    <h6>Não tem conta?</h5 >
                                </div>
                                <div class="row">
                                    <div class="col">        
                                        <a class="btn btn-custom" id="botaoCriarCo" href="/register">Criar Conta</a>
                                    </div>
                                        
                                </div>
                            </div>
                            
                        </footer>
                    </div>
                </div>
            </form>
        </div>  
    </div>
</div>


@endsection
