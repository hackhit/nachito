@extends('layouts.baseNueva')

@section('title','Ingreso Materia Prima')

@section('content')

<div class="container">

	{{-- INGRESAR NUEVO INSUMO--}}
	 @if(Session::has('sessionTrabajador'))

	<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3 text-center">
      <h1 class='tituRegistro'>Ingresar Nuevo Insumo</h1> 
       @include('flash::message') 
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

</div> 



<form class="formRegistro" method="POST" action="{{route('materiaPrima')}}">
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
      <i class="fas fa-balance-scale"> </i><label for="inputEmail4">&nbsp Insumo y Unidad Ej: Harina_gramos Sin Espacios</label> 
      <input type="text" class="form-control"  name="nuevoIns" required >
    </div>
    <div class="col-md-4 col-sm-12">
  
    </div>


  </div>

   <div class="row">
     <div class="col-md-4 col-sm-12">
    
     </div>
    <div class="col-md-4">
      <i class="fas fa-balance-scale"> </i><label for="inputEmail4">&nbsp Ingrese la Cantidad en la unidad definida</label> 
      <input type="number" class="form-control"  name="cantInsumo" required >
    </div>
    <div class="col-md-4 col-sm-12">
  
    </div>


  </div>

   <div class="row">
     <div class="col-md-4 col-sm-12">
    
     </div>
    <div class="col-md-4">
      <i class="fas fa-balance-scale"> </i><label for="inputEmail4">&nbsp Ingrese Stock Crítico en la unidad definida</label> 
      <input type="number" class="form-control"  name="stockCri" required >
    </div>
    <div class="col-md-4 col-sm-12">
  
    </div>


  </div>



<br>
<br>
<div class="row">
  <div class="col-md-4">
     
    </div>
    <div class="col-md-4">
       <button type="submit" class="btn btn-primary btn-lg btn-block" name="formRegistrar">Ingresar Insumo</button>
    </div>
    <div class="col-md-4">
     
    </div>
  
</div>


</form>


<br>
<br>

<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3 text-center">
      <h1 class='tituRegistro'>Materiales Ingresados</h1> 
    
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>

</div> 

<div class="row">
  <div class="col-md-4">
     
    </div>
    <div class="col-md-4">
       <table>
         <tr>
           <th>
             NOMBRE
           </th>

         </tr>
         @foreach($mat as $mate)
         <tr>          
           <th>
             {{$mate->Nombre}}
           </th>          
         </tr>
          @endforeach
       </table>
    </div>
    <div class="col-md-4">
     
    </div>
  
</div>

@endif

@endsection