@extends('layouts.main')

@section('title', 'PL - Calcular Juros Compostos')

@section('content')

    <h1 id="tituloInicialp">
        Calcular Juros Compostos
    </h1>    

    <div alt="container-CriarCurso" class="col-md-6 offset-md-3">
        <div id="corpoContainerCC" class="container">

            <div id="corpoCriarCurso" style="padding-bottom: 9px">

                <form>
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <label id="tituloCriarCurso"class="text-center">Valor</label>
                            <input id="valorini" class="form-control text-center" style="margin-bottom: 0px" type="text" pattern="[0-9]+" placeholder="Digite o valor inicial da aplicação" aria-label="default input example" name="valorini">
                        </div>
                        

                        <div class="row">
                            <div class="col-md-4" style="padding-left: 0%">
                                
                                <div class="text-center">
                                    <Label id="tituloCriarCurso" >   Tempo </Label>
                                </div>

                                <select class="form-select" aria-label="Default select example" style="font-size: 14px" name = "tempo" id="time">
                                    <option value="3" name="3m" >3 Meses</option>
                                    <option value="6" name="6m" >6 Meses</option>
                                    <option value="12" name="1a" >1 Ano</option>
                                    <option value="36" name="3a" >3 Anos</option>
                                </select>
                            </div>

                            <div class="col">
                                <div class="text-center">
                                    <label id="tituloCriarCurso">   Executar </label>
                                </div>

                                <div class="row">
                                    <input class="btn btn-custom animated-button" class="form-control" type="submit" value="Calcular" id="calcular"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <h1 id="TituloTabelaDepoisD">
                                Resultados
                            </h1>
                        </div>
                    </div>
                    
                    <div id="corpoTabela" class="col-md-12"> 
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label id="tituloOpcoes" for="txpoupanca">Poupança</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input id="txpoupanca" class="form-control" type="text" value="6.17" name="txpoupanca" aria-label="Disabled input example">
                                </div>
                                <div class="col-md-8">
                                    <input id="valorpoupanca" class="form-control" type="text" value="" disabled readonly>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label id="tituloOpcoes" for="txselic">CDB</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input id="txcdb" class="form-control" type="text" value="13.75" name="txcdb" aria-label="Disabled input example">
                                </div>
                                <div class="col-md-8">
                                    <input id="valorcdb" class="form-control" type="text" value="" disabled readonly>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label id="tituloOpcoes" for="txcdb">Tesouro Selic</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input id="txselic" class="form-control" type="text" value="11.26" name="txselic" aria-label="Disabled input example">
                                </div>
                                <div class="col-md-8">
                                    <input id="valorselic" class="form-control" type="text" value="" disabled readonly >
                                </div>
                            </div>
                        </div>
                    </div>
                    
    
                </form>
            </div>
        </div>
    </div>

    <script src="/js/scripts/calculadora.js"></script>
    <script src="/js/scripts/main.js" defer></script>
    
@endsection