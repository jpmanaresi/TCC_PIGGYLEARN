@extends('layouts.main')

@section('title', 'PL - Entrar')

@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card" id="cardLogin">

            <div id="tituloCardlogin" class="card-header">Area de Login</div>
                <div class="card-body" id="cardLogin2">

                    <form method="POST"action="{{ route('login') }}">
                        @csrf

                        <div class="container text-start">  
                            
                            <div class="row">   
                                <div class="col">             
                                    <label id="tituloPlaceH" for="email" class="col" id="fontelogin">{{ __('Endereço de Email') }}</label>

                                    <div class="col" id="plcaceHoldersL">
                                        <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert" id="fontelogin" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                            </div>
                            
                            <div class="row"> 
                                <div class="col">
                                    <label  id="tituloPlaceH" for="password" class="col" id="fontelogin">{{ __('Senha') }}</label>

                                    <div class="col" id="plcaceHoldersL">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert" id="fontelogin">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>    
                        
                            <div class="row">
                                <div class="col">

                                    <div class="form-check" id="checkLembrarU">
                                        <input id="checkLembrarU" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        
                                        <label id="lembrarUsuario" class="form-check-label" for="remember">
                                            {{ __('Lembrar de mim') }}
                                        </label>
                                    </div>
                                </div>
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
                            <div>
                                        
                                @if (Route::has('password.request'))
                                <div class="container text-center">
                                    <div class="row">
    
                                        <div class="col">
                                            <a class="btn btn-custom" id="botaoEsqueciS" href="{{ route('password.request') }}">
                                                {{ __('Esqueceu sua senha?') }}
                                            </a>
                                        </div>    
                                @endif 

                                <div class="col">        
                                    <a class="btn btn-custom animated-button" id="botaoCriarCo" href="/register">Criar Conta</a>
                                </div>
                                        
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
