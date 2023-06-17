@extends('layouts.main')

@section('title', 'PL - Criar Conta')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" id="cardLogin">

                <div id="tituloCardlogin" class="card-header">{{ __('Criar Conta') }}</div>
                    <div class="card-body" id="cardLogin2">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="container text-start">  
                             
                                <div class="row">
                                    <div class="col"> 
                                        <label id="tituloPlaceH" for="name" lass="col">{{ __('Insira seu nome de usuário:') }}</label>

                                        <div id="plcaceHoldersL" class="col">
                                            <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name') <!-- A mensagem alem de estar em vermrlho, está em ingles. Tem como mudar? -->
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col"> 
                                        <label id="tituloPlaceH" for="email" lass="col">{{ __('Endereço de E-mail Valido:') }}</label>

                                        <div id="plcaceHoldersL" class="col">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email') <!-- A mensagem alem de estar em vermrlho, está em ingles. Tem como mudar? -->
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col"> 
                                        <label id="tituloPlaceH" for="password" class="col" >{{ __('Crie sua Senha:') }}</label>

                                        <div id="plcaceHoldersL" class="col">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password') <!-- A mensagem alem de estar em vermrlho, está em ingles. Tem como mudar? -->
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col"> 
                                        <label id="tituloPlaceH" for="password-confirm" lass="col">{{ __('Confirme Senha: ') }}</label>

                                        <div id="plcaceHoldersL" class="col">
                                            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                            <footer id="footerAreaL">
                                

                                    <div class="container text-center">
                                        <div class="row">
        
                                            <div class="col">
                                                <button id="botaoCriarCo2" type="submit" class="btn btn-custom">
                                                    {{ __('Criar Conta') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
