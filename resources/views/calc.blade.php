@extends('layouts.main')

@section('title', 'PL - Calcular Juros compostos')

@section('content')
    
</head>
<body>
    <form>
    <Br><br><br><div class="container">
    <div class="row">
        <div class="col-sm">
            <p>VALOR</p>
            <input class="form-control" type="text" placeholder="Digite o valor inicial da aplicação." aria-label="default input example" name="valorini" id="valorini">
        </div>
    </div>
    <br><br><div class="row">
    <div class="col-md-4">
        <p>TEMPO</p>
        <select class="form-select" aria-label="Default select example" name = "tempo" id="time">
            <option value="3" name="3m" >3 Meses</option>
            <option value="6" name="6m" >6 Meses</option>
            <option value="12" name="1a" >1 Ano</option>
            <option value="36" name="3a" >3 Anos</option>
        </select>
    </div>
    <div class="col-sm">
        <p>EXECUTAR</p>
        <input class="form-control" type="submit" class="btn btn-primary" value="Calcular" id="calcular"></button> 
    </div>
  </div>
</div>
  
    <br><br><br>
    <div class="container">
        <div class="row"> <p  style="text-align: center;"> RESULTADOS</p>
            <div class="row"><p>Poupança</p></div>
            <div class="col-md-4">
                <input class="form-control" type="text" value="6.17" aria-label="Disabled input example" name="txpoupanca" id="txpoupanca">
            </div>
            <div class="col-sm">
                <input class="form-control" type="text" id="valorpoupanca" aria-label="Disabled input example" disabled readonly>
            </div>
        </div>
        
       <br><br> <div class="row"> 
            <div class="row"><p>CDB</p></div>
            <div class="col-md-4">
                <input class="form-control" type="text" value="13.75" name="txselic" id="txselic" aria-label="Disabled input example" >
            </div>
            <div class="col-sm">
                <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="valorselic">
            </div>
        </div>
        
        <br><br><div class="row"> 
            <div class="row"><p>Tesouro Selic</p></div> 
            <div class="col-md-4">
                <input class="form-control" type="text" value="11.26" name="txcdb" id="txcdb" aria-label="Disabled input example" >
            </div>
            <div class="col-sm">
                <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="valorcdb">
            </div>
        </div>
    </div>

</form>
<script src="/js/scripts/calculadora.js"></script>
<script src="/js/scripts/main.js" defer></script>
@endsection