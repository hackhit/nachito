@extends('layouts.baseNueva')

@section('title','Ingreso Insumos Torta')

@section('content')

<div class="container">
	



{{-- INGRESAR precios--}}


<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3 text-center">
      <h1 class='tituRegistro'>Ingresar Precios</h1> 
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>
 @include('flash::message') 
</div> 
<form action="{{route('precios')}}" method="post">
	  {{ csrf_field() }}

<table class="table">

<tr>
	<th>
		<label>Seleccione una torta</label>		
		<select  class="form-control" name='idTorta'>
			@foreach($datosTortas as $items)
                    <option value="{{$items->id}}">{{$items->Nombre}}</option>
			@endforeach
		</select>
	
	</th>

</tr>
<tr>
	<th>
		<label>Seleccione Cantidad de Personas</label>		
		<select  class="form-control" name='idCantPer'>
			@foreach($cantPer as $canP)
                    <option value="{{$canP->id}}">{{$canP->cantidad}}</option>
			@endforeach
		</select>
	
	</th>
	
</tr>
<tr>
	<th>
		<label >Ingrese Precio</label>
		<input type="number" name="precio" required="">
	</th>
</tr>

<tr>
	<th>
	    <button type="submit" class="btn btn-primary btn-lg btn-block" name="formRegistrar">Ingresar Precio</button>
	</th>
</tr>
</table>
</form>



</div>
@endsection