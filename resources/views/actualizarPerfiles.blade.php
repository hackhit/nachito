@extends('layouts.baseNueva')

@section('title','Registro Cliente')

@section('content')




@if(Session::has('miSessionRut'))
         

<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3 text-center">
      <h3 class='tituRegistro'>Actualizar Datos Cliente</h3> 
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

</div> 



<form class="formRegistro" method="POST" action="{{route('actualizarPerfil')}}">
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
      <div class="col-md-4 col-sm-12" >
    
    </div>
    @foreach($datos as $ses)

    <div class="col-md-4 col-sm-12">
      <i class="fas fa-address-card fa-lg"> </i><label for="inputEmail4">&nbsp Rut:</label> 
       <input type="text" class="form-control rut" id="" name="" value="{{ $ses->rut }}"  maxlength="12" disabled>
      <input type="hidden" class="form-control rut" id="inputR" name="rut" value="{{ $ses->rut }}"  maxlength="12">
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


  <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="fas fa-edit fa-lg"></i> <label for="inputPassword4">&nbsp Nombre</label>
      <input type="text" class="form-control nombre" id="inputNombre" name="nombre" value="{{ $ses->nombre }}"  required maxlength="30" >
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>



  <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="fas fa-edit fa-lg"></i> <label for="inputPassword4">&nbsp Apellido</label>
      <input type="text" value="{{ $ses->apellido }}" class="form-control ape" id="inputApe" name="apellido" maxlength="30" >
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>



  <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="fas fa-phone-square fa-lg"></i><label for="inputState">&nbsp Teléfono +56 9</label>
      <input type="text" class="form-control tele" id="inputTele" name="telefono" value="{{ $ses->telefono }}"  required maxlength="8">
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


     <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="far fa-envelope fa-lg"></i><label for="inputEmail4">&nbsp  Email</label>
      <input type="email" class="form-control" id="inputCorreo" name="email" value="{{ $ses->email }}"  maxlength="30" disable>
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>

   <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


<div class="row">
  <div class="col-md-4">
     
    </div>
    <div class="col-md-4 col-sm-12 mt-3">
       <button type="submit" class="btn btn-success btn-lg btn-block" name="formRegistrar">Actualizar</button>

    </div>
    <div class="col-md-4">
     
    </div>
  
</div>

</form>
@endforeach
@endif





@if(Session::has('sessionTrabajador'))
         

<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3 text-center">
      <h3 class='tituRegistro'>Actualizar Datos Trabajador</h3> 
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

</div> 



<form class="formRegistro" method="POST" action="{{route('actualizarPerfil')}}">
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
      <div class="col-md-4 col-sm-12" >
    
    </div>
    @foreach($datos as $ses)

    <div class="col-md-4 col-sm-12">
      <i class="fas fa-address-card fa-lg"> </i><label for="inputEmail4">&nbsp Rut:</label> 
       <input type="text" class="form-control rut" id="" name="" value="{{ $ses->rut }}"  maxlength="12" disabled>
      <input type="hidden" class="form-control rut" id="inputR" name="rut" value="{{ $ses->rut }}"  maxlength="12">
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


  <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="fas fa-edit fa-lg"></i> <label for="inputPassword4">&nbsp Nombre</label>
      <input type="text" class="form-control nombre" id="inputNombre" name="nombre" value="{{ $ses->nombre }}"  required maxlength="30" >
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>



  <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="fas fa-edit fa-lg"></i> <label for="inputPassword4">&nbsp Apellido</label>
      <input type="text" value="{{ $ses->apellido }}" class="form-control ape" id="inputApe" name="apellido" maxlength="30" >
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


   <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>
    @php
      
    @endphp

  
    <div class="col-md-4 col-sm-12 mt-3">
      <i class="fas fa-edit fa-lg"></i> <label for="inputPassword4">&nbsp Cargo Actual</label>
      <input type="text" value="{{ $ses->nombreCargo }}" class="form-control ape" maxlength="30" disabled >
    </div>
    
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


     <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="far fa-address-card fa-lg"></i> <label for="inputPassword4">&nbsp Nuevo cargo</label>
      <select class="form-control" name='cargo' >
       
                          @foreach($cargo as $car)
                          <option value="{{$car->id}}"> {{ $car->nombre }} </option>
                          @endforeach

     </select>
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>




  <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="fas fa-phone-square fa-lg"></i><label for="inputState">&nbsp Teléfono +56 9</label>
      <input type="text" class="form-control tele" id="inputTele" name="telefono" value="{{ $ses->telefono }}"  required maxlength="8">
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


     <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3">
      <i class="far fa-envelope fa-lg"></i><label for="inputEmail4">&nbsp  Email</label>
      <input type="email" class="form-control" id="inputCorreo" name="email" value="{{ $ses->email }}"  maxlength="30" disable>
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>

   <div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    
    <div class="col-md-4 col-sm-12">
    
    </div>

   </div>


<div class="row">
  <div class="col-md-4">
     
    </div>
    <div class="col-md-4 col-sm-12 mt-3">
       <button type="submit" class="btn btn-success btn-lg btn-block" name="formRegistrar">Actualizar</button>

    </div>
    <div class="col-md-4">
     
    </div>
  
</div>

</form>
@endforeach
@endif

@endsection