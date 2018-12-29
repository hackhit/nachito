@extends('layouts.baseNueva')

@section('title','Nueva Torta')

@section('content')


 @if(Session::has('sessionTrabajador'))

            <div class="row">
                <div class="col-md-4 col-sm-12" >
              
              </div>

              <div class="col-md-4 col-sm-12 mt-3 text-center">
                <h1 class='tituRegistro'>Ingresar Nueva Torta</h1> 
                 @include('flash::message') 
              </div>
              <div class="col-md-4 col-sm-12">
              
              </div>

          </div> 



      <form class="formRegistro" method="POST" action="{{route('nuevaTorta')}}" enctype ="multipart/form-data">
                     {{ csrf_field() }}

                     <div class="row">
                            <div class="col-md-4 col-sm-12" >
                          
                          </div>

                          <div class="col-md-4 col-sm-12">
                             @include('flash::message') 
                          </div>
                          <div class="col-md-4 col-sm-12">
                          
                          </div>

                     </div>  

                    <div class="row">
                           <div class="col-md-4 col-sm-12">
                          
                           </div>
                          <div class="col-md-4">
                            <i class="fas fa-balance-scale"> </i><label for="inputEmail4">&nbsp Nombre de Nueva Torta</label> 
                            <input type="text" class="form-control"  name="nuevaTorta" required >
                          </div>
                          <div class="col-md-4 col-sm-12">
                    
                      </div>

                    
                    </div>

                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                      
                       </div>
                      <div class="col-md-4">
                        <i class="fas fa-balance-scale"> </i><label for="inputEmail4">&nbsp Ingrese el Código</label> 
                        <input type="text" class="form-control"  name="codTorta" required >
                      </div>
                      <div class="col-md-4 col-sm-12">
                    
                      </div>


                    </div>
           <br><br>


                   <div class="row">
                       <div class="col-md-4 col-sm-12">
                          
                           </div>
                          <div class="col-md-4">
                            <i class="fas fa-balance-scale"> </i><label for="inputEmail4">&nbsp Descripción</label> 
                            <br>
                            <textarea name="descripcion" id="codTorta" cols="60" rows="5" required></textarea> 
                           
                          </div>
                          <div class="col-md-4 col-sm-12">
                        
                          </div>

                    </div>

 <br><br>
                     <div class="row">
                       <div class="col-md-4 col-sm-12">
                      
                       </div>
                      <div class="col-md-4">
                        <i class="fas fa-balance-scale"> </i><label for="inputEmail4">&nbsp Suba una imagen</label>
                        <br>
                       <input type="file" name="imagen" required="">
                       
                      </div>
                      <div class="col-md-4 col-sm-12">
                    
                      </div>


                    </div>

                     <br><br>
                  <div class="row">
                       <div class="col-md-4 col-sm-12">
                      
                       </div>
                      <div class="col-md-4">
                         <button type="submit" class="btn btn-primary btn-lg btn-block" name="formRegistrar">Ingresar Nueva Torta</button>                       
                      </div>
                      <div class="col-md-4 col-sm-12">
                    
                      </div>


                    </div>              


      </form>
@endif








@endsection