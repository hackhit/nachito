@extends('layouts.baseNueva')

@section('title','Ingreso Insumos Torta')

@section('content')

<div class="container">
	

{{-- INGRESAR stock--}}



<table class="table">
	<tr colspan=3>
		<td>Stock de Materia Prima</td>
	</tr>
	<tr>
		<td>Producto</td>
		<td>Agregar</td>
		<td>Cantidad</td>
		<td>Crítico</td>
		

	</tr>
	<form method="POST" action="{{route('stock')}}">
		{{csrf_field()}}
	@foreach($total as $tot)
     
			    <tr>
			      <td>{{$tot->Nombre}}</td>
                  <td><input type="number" name="{{$tot->Nombre}}" value=0 min=0 required></td>

			        @if($tot->stock < $tot->stockCritico)
			        <td style="color: red">{{$tot->stock}}</td>
			        @else
			      <td>{{$tot->stock}}</td>
			      @endif
			    

			       <td>{{$tot->stockCritico}}</td>
			     
			    </tr>
	@endforeach
    
    
</table>
<button type="submit" class="btn btn-success btn-lg btn-block" name="ingresarInsumo" >Ingresar</button>
</form>
</div>
@endsection