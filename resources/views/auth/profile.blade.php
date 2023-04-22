@extends('layouts.main')

@section('title', 'PL - Perfil')
    
@section('content')

<div class="container-md" id="profileborda">

    <br> <br>

    <div class="row">
        <div class="col mx-auto text-center">
            <div id="displayflex text-center">
            <img id="imagemperfil" src="/img/User-60.svg" alt="">
            <span class="input-group-addon  justify-content-md-center">
                <button class="btn btn-secondary me-md-2" id="iconlapis">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                      </svg>
                </button>
              </span>
            </div>
            <br> <br>

        <form>
            <h1 id="tituloProfileI">
                Nome de Usuário
            </h1>
        </form>
           
        </div>
    </div>

    <br> <br>
    <span id="regua"></span>
    <Br>

    <form>
     <div class="row">
           <div class="col justify-content-around">    
            <!-- texto email -->        
                 <label for="email" class="form-label">
                    <p id="p-label">
                        Email
                    </p>
                 </label>

                 <div id="displayflex"> <!-- div para colocar os elementos um ao lado do outro -->  
                 <input type="email" class="form-control" id="exampleInput1" aria-describedby="emailHelp" > 

                 <span class="input-group-addon d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary me-md-2" id="iconlapis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                    </button>
                  </span>

                 </div>

                 <div id="emailHelp" class="form-text">Nós nunca compartilharemos seu email com ninguém</div>        
          </div>
         <div class="col justify-content-around">
            <label for="email" class="form-label">
                <p id="p-label">
                    Email
                </p>
             </label>

             <div id="displayflex"> <!-- div para colocar os elementos um ao lado do outro -->  
             <input type="email" class="form-control" id="exampleInput1" aria-describedby="emailHelp" > 

             <span class="input-group-addon d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-secondary me-md-2" id="iconlapis">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                      </svg>
                </button>
              </span>
         </div>
        </div>


 <!-- NOMES -->
        <div class="row">
            <div class="col justify-content-around">         
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
              
          </div>
         </div>
    </form>
</div>






@endsection