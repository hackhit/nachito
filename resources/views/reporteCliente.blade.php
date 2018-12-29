
<style type="text/css">
  
table{
  width: 100%;
}

th , td {
  width: 25%;
  text-align: center;
  vertical-align: top;
}


caption {
   padding: 0.3em;
   color: #000;

}

th {
   background: #eee;
}

.logo{
  width: 150px; 
  height: 150px;
}

</style>


<table>
  <tr>
    <td><img src="imagenes/pasteleria.png" class="logo"></td>
    <td><h1>Mejores Clientes</h1></td>
    <td></td>
  </tr>
</table>

Entre {{$fecha1}} y {{$fecha2}}
<br><br>
<table class="tablaReporte">
<caption>Reporte de los Mejores Clientes</caption> 
<br>
    <tr>   
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Cantidad de Pedidos</th>
      <th scope="col">Total Comprado</th>        
    </tr>

  <tbody>
    
      @if(Session::has('sessionTrabajador')) <!--Muestra los datos cliente cuando inicia sesión-->
       


     @foreach($mejorCliente as $cli)
      <tr>
        
          <td scope="row">{{$cli->nombre}}</td>
          <td scope="row">{{$cli->apellido}}</td>
          <td scope="row">{{$cli->cant}}</td>
          <td scope="row">$ {{$cli->total}}</td>
      </tr>
      @endforeach
      @endif
  </tbody>
</table>



















