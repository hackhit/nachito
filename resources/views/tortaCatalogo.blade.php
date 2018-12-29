@extends('layouts.baseNueva')

@section('title','Torta')

@section('content')

@if(Session::has('sessionTrabajador') or Session::has('miSessionRut'))
  

     <form action="{{route('ingresarPedido')}}" method="POST">
      {{ csrf_field() }}
      
            <div class="product">             
              <h3>{{$tortaCatalogo->Nombre}}</h3>
              <input type="text" name="nombreTorta" hidden="" value="{{$tortaCatalogo->Nombre}}">
              <input type="text" name="idTorta" hidden="" value="{{$tortaCatalogo->id}}">
              <img src="{{asset($tortaCatalogo->Imagen)}}" alt="" width="250">
                <div class="product-info">
                       <p>{{$tortaCatalogo->Descripción}}</p>
                       <div class="cantPersonas">
                            
                           @foreach($canP as $cantPe)
                              <p>Para {{$cantPe->cantidad}} Personas: ${{$cantPe->Precio}} &nbsp  &nbsp<input type="radio" name="cantPer" value="{{$cantPe->cantidad}}" required=""></p>

                           @endforeach                         
                               

                       </div>
                       <div>
                         <i class="fas fa-comments fa-lg"> </i><label for="inputEmail4">&nbsp Ingrese una dedicatoria</label> 
                         <textarea class="form-control rut" name="dedicatoria" maxlength="30"></textarea>
                       </div><br>
                 
                   
  
                      
                      <div>
                        <i class="fas fa-comments fa-lg"> </i><label for="inputEmail4">&nbsp Cantidad de Tortas</label> 
                         <input type="number" name="cantTortas" required="" min="1" max="4"></p>
                       </div><br>                    
                    

                        <div>
                        <i class="fas fa-comments fa-lg"> </i><label for="inputEmail4">&nbsp Fecha Entrega</label> 
                         <input type="date" name="fechaEntrega" required="" min="{{$fechaMañana}}" max="{{$fechaProxMes}}"></p>

                           <div>
                        <i class="fas fa-comments fa-lg"> </i><label for="inputEmail4">&nbsp Hora de Retiro formato(24 hrs)</label> 
                         <input type="time" name="horaEntrega" required="" min="09:00" max="20:00"></p>
                       </div><br>                    
                    

                         
                       </div><br>   
                        
                         
                       <div>
                          <button type="submit" class="btn btn-success">Hacer Pedido</button>
                           <a class="btn btn-info" href="{{ route('catalogo') }}">Regresar</a>
                       </div>
                          
                </div>
           
            </div>
        </form>

@endif
@endsection