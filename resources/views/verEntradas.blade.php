@extends('layouts.baseNueva')

@section('title','Registro Usuario')

@section('content')

<h1 class='tituRegistro'>Ver Entrada de Insumos</h1>


<table class='table'>
  <tr>
    <td>Nombre</td>
    <td>Cantidad</td>
     <td>Fecha de Entrada</td>   
  </tr>
  @foreach($verMateriaEntradas as $verMa)
  <tr>
    <td>{{$verMa->Nombre}}</td>
     <td>{{$verMa->cantidad}}</td>
    <td>{{\Carbon\Carbon::parse($verMa->fechaEntrada)->format('d/m/Y')}}</td>
  
  <tr>

  @endforeach
  
</table>



@endsection