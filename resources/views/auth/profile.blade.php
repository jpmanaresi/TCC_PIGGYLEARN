@extends('layouts.main')

@section('title', 'PL - Meu Perfil')
    
@section('content')

<div class="container-md" id="profileborda">

    <br> <br>
    <form>
    <div class="row">
        <div class="col mx-auto text-center">
            <div id="displayflex text-center">
            <img id="imagemperfil" src="/img/User-60.svg" alt="">
            <span class="input-group-addon  justify-content-md-center">
                <label for="arquivo" id="uploadbtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                      </svg>
                </label>
                <input type="file" name="arquivo" id="arquivo" >
              </span> 
            </div>
            <br> <br>
            
        
            <h1 id="tituloProfileI">
                Nome de Usuário
            </h1>
        </form>
           
        </div>
    </div>

    <br> <br>
    <span id="regua"></span>
    <br>

    <form>

     

        
            <div class="row row-cols-2" id="marginrow">
              <div class="col">
                <label for="email" class="form-label">
                    <p id="p-label">
                        Nome
                    </p>
                 </label>
   
                 <div id="displayflex"> <!-- div para colocar os elementos um ao lado do outro -->  
                   <input type="text" aria-label="First name" placeholder="Nome completo" class="form-control" id="exampleInput1">
   
                 <span class="input-group-addon d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary me-md-2" id="iconlapis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                    </button>
                  </span>
              </div>
              </div>

              <div class="col">
                <label for="email" class="form-label">
                    <p id="p-label">
                        Telefone
                    </p>
                 </label>
                 <div id="displayflex"> <!-- div para colocar os elementos um ao lado do outro --> 
                 <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+55</span>
                    <input type="text" class="form-control" id="exampleInput1" placeholder="(xx) x xxxx-xxxx" aria-label="Username" aria-describedby="basic-addon1">
                  
                
                 <span class="input-group-addon d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary me-md-2" id="iconlapis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                    </button>
                  </span>
                </div>
             </div>
              </div>

              <br><br><br><br><br><br>

              <div class="col">
                <!-- texto email -->        
                <label for="email" class="form-label">
                  <p id="p-label">
                    Endereço de Email
                  </p>
                </label>

                 <div id="displayflex"> <!-- div para colocar os elementos um ao lado do outro -->  
                  <input type="email" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="exemplo@exemplo.com" > 

                  <span class="input-group-addon d-grid gap-2 d-md-flex justify-content-md-end">
                      <button class="btn btn-secondary me-md-2" id="iconlapis">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                      </button>
                  </span>

                 </div>

              </div>

              <div class="col">
                
                <label for="email" class="form-label">
                    <p id="p-label">
                        Gênero 
                    </p>
                 </label>
   
                 <div id="displayflex"> <!-- div para colocar os elementos um ao lado do outro -->  
                    <select class="form-select" aria-label="Default select example" id="exampleInput1">
                      <option id="exampleInput1" selected>Selecione...</option>
                      <option id="exampleInput1" value="1">Feminino</option>
                      <option id="exampleInput1" value="2">Masculino</option>
                      <option id="exampleInput1" value="3">Outro</option>
                    </select> 
                </div>

              </div>

            </div>
          


    </form>
   
</div>

@endsection