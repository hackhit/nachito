@extends('layouts.baseNueva')

@section('title','Acceso Cliente')

@section('content')


<h1>Ver Pedidos</h1>



<table>
   @include('flash::message') 
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Torta</th>
      <th scope="col">Código</th>
      <th scope="col">N°Personas</th>
      <th scope="col">Dedicatoria</th>
      <th scope="col">N°Tortas</th>
      <th scope="col">Estado</th>  
        @if(session::has('sessionTrabajador'))
      <th scope="col">Usuario Preparador</th>    
       @endif 
      <th scope="col">Fecha Pedido</th>
      <th scope="col">Fecha Entrega</th>
      <th scope="col">Hora Entrega</th>
      <th scope="col">Total</th>
    
       @if(session::has('sessionTrabajador'))
      <th scope="col">Cancelar</th> 
      <th scope="col">Cambiar Estado</th> 
       @endif

    </tr>
  </thead>
  <tbody>
   
      @if(Session::has('miSessionRut')) 
       
     @foreach($verPedidos as $verPed)

      <tr>
          <td scope="row">{{$verPed->Cliente}}</td>
          <td>{{$verPed->apellido}}</td>
          <td>{{$verPed->nombreTorta}}</td>
          <td>{{$verPed->codigoCliente}}</td>          
          <td>{{$verPed->cantPersonas}}</td>
          <td>{{$verPed->dedicatoria}}</td>
          <td>{{$verPed->cantidadTortas}}</td>
          <td>{{$verPed->estado}}</td>         
          <td>{{\Carbon\Carbon::parse($verPed->fechaPedido)->format('d/m/Y')}}</td>          
          <td style="color:#FF0000">{{\Carbon\Carbon::parse($verPed->fechaEntrega)->format('d/m/Y')}}</td>             
          <td style="color:#FF0000">{{$verPed->horaEntrega}} hrs</td>             
          <td>$ {{$verPed->precioTotal}}</td>          
      </tr>   
      @endforeach

      @endif



      @if(session::has('sessionTrabajador'))
          
             @foreach($verPedidosTra as $verPedTra)
                
          <tr> 
          <td>{{$verPedTra->cliente}}</td> 
          <td>{{$verPedTra->apellido}}</td> 
          <td>{{$verPedTra->nombreTorta}}</td> 
          <td>{{$verPedTra->codigoCliente}}</td>          
          <td>{{$verPedTra->cantPersonas}}</td> 
          <td>{{$verPedTra->dedicatoria}}</td> 
          <td>{{$verPedTra->cantidadTortas}}</td>
          <td>{{$verPedTra->estado}}</td>
          <td>{{$verPedTra->preparador}}</td>
          <td>{{\Carbon\Carbon::parse($verPedTra->fechaPedido)->format('d/m/Y')}}</td> 
          <td>{{\Carbon\Carbon::parse($verPedTra->fechaEntrega)->format('d/m/Y')}}</td> 
            <td>{{$verPedTra->horaEntrega}}</td>

          <td>$ {{$verPedTra->precioTotal}}</td>
               
          <form class="formRegistro" method="POST" action="{{route('cancelarPedido')}}">
            {{csrf_field()}}
          <td>


            @if($verPedTra->estado=="Cancelado")
        
         
          <td>            
         
          <span class="alert alert-danger">Cancelado</span>
        
          </td> 

          @elseif($verPedTra->estado=="Entregada")
          <td>            
         
          <span class="alert alert-success">Entregado</span>
        
          </td> 

          @elseif($verPedTra->estado=="Esperando Preparación")

          <button type="submit" class="btn btn-primary" name="formRegistrar">Cancelar Pedido</button>
          <input type="hidden" name="cancelarPedido" value="{{ $verPedTra->id}}">    
         
          
          @endif
        
          </td>           
          </form> 

          @if($verPedTra->estado=="Esperando Preparación")
                   <form class="formRegistro" method="POST" action="{{route('prepararPedido')}}">
            {{csrf_field()}}
          <td>            
        <button type="submit" class="btn btn-success" name="formRegistrar">Preparar Pedido</button>
        <input type="hidden" name="cambiarEstado" value="{{ $verPedTra->id}}">
        <input type="hidden" name="cantidadTortas" value="{{ $verPedTra->cantidadTortas}}"> 

        {{-- Acá se hace el descuento de los insumos de la torta en la tabla stock--}} 

          <input type="hidden" name="nombreTortaStock" value="{{ $verPedTra->nombreTorta}}">
          <input type="hidden" name="cantidadPersonasStcok" value="{{ $verPedTra->cantPersonas}}"> 

          </td> 
          </form>
          @endif

          @if($verPedTra->estado=="En Preparación")
        
          <form class="formRegistro" method="POST" action="{{route('completarPedido')}}">
            {{csrf_field()}}
          <td>            
        <button type="submit" class="btn btn-warning" name="formRegistrar">Completar</button>
        <input type="hidden" name="completarPedido" value="{{ $verPedTra->id}}">          
          </td> 
          </form>
          @endif


             @if($verPedTra->estado=="Completada")
        
          <form class="formRegistro" method="POST" action="{{route('entregarPedido')}}">
            {{csrf_field()}}

        
    @foreach(Session::get('sessionTrabajador') as $traba)
      @if($traba->cod_cargo ==2)

          <td>
                  
        <button type="submit" class="btn btn-info" name="formRegistrar">Entregar</button>
        <input type="hidden" name="entregarPedido" value="{{ $verPedTra->id}}" > 

          </td> 
    @else

        <td>
                  
        <button type="submit" class="btn btn-info" name="formRegistrar" disabled>Entregar</button>
        <input type="hidden" name="entregarPedido" value="{{ $verPedTra->id}}"> 

          </td>

    @endif

    @endforeach
      
          </form>
          @endif          

          </tr>  
                   
             
          @endforeach

                    

      @endif
 

 
      
  </tbody>
</table>















@endsection