@extends('layouts.base')

@section('title','Registro Usuario')

@section('content')

<h1 class='tituRegistro'>Ver Salidas</h1>


<table class='table'>
  <tr>
    <td>Usuario Trabajador</td>
    <td>Fecha Salida</td>
     <td>Código Torta</td>
     <td>Insumo</td>
     <td>cantidad</td>

  </tr>
  @foreach($verMateriaEntradas as $verMa)
  <tr>
    <td>{{$verMa->usuario}}</td>
    <td>{{\Carbon\Carbon::parse($verMa->fechaSalida)->format('d/m/Y')}}</td>
    <td>{{$verMa->codigoCliente}}</td>
    <td>{{$verMa->Insumo}}</td>
    <td>{{$verMa->cantidad}}</td>
  <tr>

  @endforeach
  
</table>



@endsection



