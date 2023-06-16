@extends('layouts.main')

@section('title', 'PL - Recuperação de Senha')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" id="cardLogin">

                <div id="tituloCardlogin" class="card-header">{{ __('Recuperação de Senha') }}</div>
                    <div class="card-body" id="cardLogin2">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="container text-start">

                                <div class="row">
                                    <div class="col">
                                        <label id="tituloPlaceH" for="email" class="col">{{ __('Endereço de Email') }}</label>

                                        <div id="plcaceHoldersL" class="col">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <footer id="footerAreaL">
                                    <div class="container text-center">

                                        <div class="row">
                                            <div class="col">
                                                <button id="botaoCriarCo2" type="submit" class="btn btn-custom">
                                                    {{ __('Envie codigo de Recuperação') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
