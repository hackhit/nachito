@extends('layouts.baseNueva')

@section('title','Panel ')

@section('content')

@if(Session::has('miSessionRut'))
@foreach(Session::get('miSessionRut') as $ses)
<h1>Bienvenid@ {{$ses->cliente}}</h1>  



<br><br><br>


{{-- Acá Muestra los Pedidos--}}
<h3 class='tituRegistro'>Ingrese Pedido </h3>

  <form class="formRegistro" method="POST" action="{{route('ingresarPedido')}}">
   {{ csrf_field() }}
   <div>
      @include('flash::message')  
   </div>
   <div class="form-row">    
     <div class="form-group col-md-4">
        <i class="fas fa-birthday-cake fa-lg"></i><label for="inputState">&nbsp Seleccione Torta</label>
     <select class="form-control" name='torta' >
       
                          @foreach($torta as $tor)
                          <option value="{{$tor->id}}"> {{ $tor->nombre }} </option>
                          @endforeach

     </select>      
    </div>


   </div>    
    <div class="form-row">
    
     <div class="form-group col-md-4">
        <i class="fas fa-users fa-lg"></i><label for="inputState">&nbsp Cantidad de Personas</label>
    
      <select class="form-control" name='cantPer' >
       
                          @foreach($cantPer as $cantP)
                          <option value="{{$cantP->id}}"> {{ $cantP->cantidad }} </option>
                          @endforeach

     </select>
    </div>
    
   </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <i class="fas fa-comments fa-lg"> </i><label for="inputEmail4">&nbsp Ingrese una dedicatoria</label> 
      <textarea class="form-control rut" name="dedicatoria"></textarea>
   
    </div>
   
  </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <i class="fas fa-calendar-alt fa-lg"> </i><label >&nbsp Fecha de Retiro</label> 
      <input type="date" class="form-control rut" name="fechaRetiro"></input>
   
    </div>
   
  </div>

 <div class="form-row">

  <button type="submit" class="btn btn-primary" name="formRegistrar">Ingresar Pedido</button>
</div>


</form>
@endforeach

@endif




@endsection