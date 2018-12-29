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
    <td><h1>Tortas más vendidas</h1></td>
    <td></td>
  </tr>
</table>






  Entre {{$fecha1}} y {{$fecha2}}
<br><br>
<table class="tablaReporte">
<caption>Reporte de las Tortas más Vendidas</caption> 
<br>
    <tr>   
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad de Tortas</th>
         
    </tr>

  <tbody>
    
      @if(Session::has('sessionTrabajador')) <!--Muestra los datos cliente cuando inicia sesión-->
       


     @foreach($tortaMasVendida as $tor)
      <tr>
        
          <td scope="row">{{$tor->nombreTorta}}</td>
          <td scope="row">{{$tor->Tortas}}</td>
         
      
      </tr>
      @endforeach
      
      @endif
  </tbody>
</table>
