@extends('layouts.baseNueva')

@section('title','Registro Usuario')

@section('content')
<h1 class='tituRegistro'>Registro de Trabajador</h1>

  <form class="formRegistro" method="POST" action="{{route('registrarTrabajador')}}">
   {{ csrf_field() }}
   <div>
      @include('flash::message')  
   </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <i class="fas fa-address-card fa-lg"> </i><label for="inputEmail4">&nbsp Rut</label> 
      <input type="text" class="form-control rut" id="inputR" name="rut" placeholder="11111111-1"  required  maxlength="12">
    </div>


    <div class="form-group col-md-4">
     <i class="fas fa-edit fa-lg"></i> <label for="inputPassword4">&nbsp Nombre</label>
      <input type="text" class="form-control nombre" id="inputNombre" name="nombre" placeholder="Maxi Comegato"  required maxlength="30" >
    </div>
   
    <div class="form-group col-md-4">
     <i class="fas fa-edit fa-lg"></i> <label for="inputPassword4">&nbsp Apellido</label>
      <input type="text" class="form-control ape" id="inputApe" name="apellido" placeholder="Apellido"  required maxlength="30">
    </div>


  </div>

   <div class="form-row">
    
    <div class="form-group col-md-4">
      <i class="fas fa-phone-square fa-lg"></i><label for="inputState">&nbsp Teléfono +56 9</label>
      <input type="number" class="form-control tele" id="inputTele" name="telefono" placeholder="555555"  required max="99999999">
    </div>
    <div class="form-group col-md-4">
    <i class="far fa-envelope fa-lg"></i><label for="inputEmail4">&nbsp  Email</label>
      <input type="email" class="form-control" id="inputCorreo" name="email" placeholder="Correo Electrónico"  required maxlength="30">
  </div>

    <div class="form-group col-md-4">
        <i class="far fa-address-card fa-lg"></i><label for="inputState">&nbsp Cargo</label>
     <select class="form-control" name='cargo' >
       
                          @foreach($cargo as $car)
                          <option value="{{$car->id}}"> {{ $car->nombre }} </option>
                          @endforeach

     </select>
    </div>

    
   </div>


   <div class="form-row">
    
    <div class="form-group col-md-4">
      <i class="fas fa-edit fa-lg"></i><label for="inputState">Usuario</label>
      <input type="text" class="form-control tele" id="inputTele" name="usuario" placeholder="xapellido"  required maxlength="8">
    </div>

    </div>

    
   </div>


    


 <div class="form-row">
    <div class="form-group col-md-6">
      <i class="fas fa-key fa-lg"></i><label for="inputCity">&nbsp Contraseña</label>
      <input type="password" class="form-control" id="inputClave" name="password" placeholder="Contraseña"  required maxlength="30">
    </div>
    <div class="form-group col-md-6">
      <i class="fas fa-key fa-lg"></i><label for="inputState">&nbsp Repita Contraseña</label>
       <input type="password" class="form-control" id="inputClave2" name="password2" placeholder="Repita Contraseña" required maxlength="30">
    </div>


  <button type="submit" class="btn btn-primary" name="formRegistrar">Registrar</button>
</form>









@endsection