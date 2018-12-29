


<h1 class='tituRegistro'>Respaldo y Restauración de la Base de datos</h1>


<form class="formRespaldo" method="POST" action="{{route('crearRespaldo')}}">
   {{ csrf_field() }}
  @include('flash::message') 
   <button type="submit" class="btn btn-primary" name="formRegistrar" disabled>Crear Respaldo Base de Datos</button>
      
</form>


<h3 class=''>Listado de Respaldos</h3>
<table class="table">
  <tr>
    <td>Respaldos</td>
  </tr>
  @foreach($respaldos as $res)
  <tr>
    <form method="post" action="{{route('restaurar')}}">
       {{ csrf_field() }}
    <td>{{$res}}</td>
    <input type="hidden" name="nomRespaldo" value="{{$res}}">
    <td><button  type="submit" class="btn btn-info">Restaurar</button></td>
    </form>
    <form action="{{route('borrarRespaldo')}}" method="post" >   
     {{ csrf_field() }} 
    <input type="hidden" name="nombreResp"value="{{$res}}">
    <td><button  type="submit" class="btn btn-danger" disabled>Borrar Respaldo</button></td>
    </form>

  </tr>

  @endforeach
</table>

