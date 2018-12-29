@extends('layouts.baseNueva')

@section('title','Catálogo de Tortas')

@section('content')
@if(Session::has('sessionTrabajador') or Session::has('miSessionRut'))

<div class="container">
  <div id ="wall"> 
  	  @include('flash::message') 
      <br>
   @foreach($torta as $tor)
              
            <div class="wall-item wall-column">
              <h3>{{$tor->Nombre}}</h3>
              <img src="{{asset($tor->Imagen)}}">
              
                    <p>{{$tor->Descripción}}</p>
                    <p><a class="btn btn-success" href="{{ route('torta-detalle',$tor->id) }}">Leer Más</a></p>              
           
            </div>   
      
   @endforeach 
 </div> 
</div>


@endif
@endsection