@extends('layouts.baseNueva')

@section('title','Ingreso Insumos Torta')

@section('content')

<div class="container">
	



{{-- INGRESAR INSUMOS PARA TORTAS TORTA--}}


<div class="row">
      <div class="col-md-4 col-sm-12" >
    
    </div>

    <div class="col-md-4 col-sm-12 mt-3 text-center">
      <h1 class='tituRegistro'>Ingresar Insumos utilizados en la Torta</h1> 
    </div>
    <div class="col-md-4 col-sm-12">
    
    </div>
 @include('flash::message') 
</div> 
<form action="{{route('nuevaTorta')}}" method="post" enctype ="multipart/form-data">
	  {{ csrf_field() }}

<table class="table">

<tr>
	<th>
		<label>Seleccione una torta</label>		
		<select  class="form-control" name='tortaNombre'>
			@foreach($datosTortas as $items)
                    <option value="{{$items->id}}">{{$items->Nombre}}</option>
			@endforeach
		</select>
	
	</th>

</tr>
<tr>
	<th>
		<label>Seleccione Cantidad de Personas</label>		
		<select  class="form-control" name='cantPer'>
			@foreach($cantPer as $canP)
                    <option value="{{$canP->id}}">{{$canP->cantidad}}</option>
			@endforeach
		</select>
	
	</th>
	
</tr>
 @foreach($columns as $col)
	<tr>
		<th>
			@if($col=='id' || $col=="Nombre" || $col=="Cantidad_Personas")	

			@else
			{{$col}}
			@endif
		</th>
		<th>
			@if($col=='id' || $col=="Nombre" || $col=="Cantidad_Personas")			
			
			@else
				<input type="number" name={{$col}} value={{old($col)}}>
			@endif		
		</th>	
	<tr>
@endforeach
<tr>
	<th>
	    <button type="submit" class="btn btn-primary btn-lg btn-block" name="formRegistrar">Ingresar Insumos de Torta</button>
	</th>
</tr>
</table>
</form>



</div>
@endsection