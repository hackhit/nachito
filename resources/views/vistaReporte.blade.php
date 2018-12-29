@extends('layouts.baseNueva')

@section('title','Acceso Cliente')

@section('content')




<h1>Reportes</h1>



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" colspan="4">Tipo de Reporte</th>
    
    
    </tr>
  </thead>
  <tbody>
    
       
          
          
   
       <tr>
        <td scope="row">Cantidad de Preparaciones por Empleado</td>
          <form class="formEmpleado" method="POST" action="{{route('mejorTrabajador')}}">
            {{csrf_field()}}
        <td scope="row"><input type="date" class="form-control" name="fecha1" required=""></td>
        <td><input type="date" class="form-control" name="fecha2" required=""></input> </td>
      
        <td>
        <button type="submit" class="btn btn-info" name="formRegistrar">Generar</button>          
          </td> 
         </form>
       </tr>   
       



  <tr>
        <td scope="row">Tortas más vendidas</td>
          <form class="formEmpleado" method="POST" action="{{route('tortaMasVendida')}}">
            {{csrf_field()}}
        <td scope="row"><input type="date" class="form-control" name="fecha1" required=""></td>
        <td><input type="date" class="form-control" name="fecha2" required=""></input> </td>
      
        <td>
        <button type="submit" class="btn btn-info" name="formRegistrar">Generar</button>          
          </td> 
         </form>
       </tr>   
       



  <tr>
        <td scope="row">Mejores Clientes</td>
          <form class="formEmpleado" method="POST" action="{{route('mejorCliente')}}">
            {{csrf_field()}}
        <td scope="row"><input type="date" class="form-control" name="fecha1" required=""></td>
        <td><input type="date" class="form-control" name="fecha2" required=""></input> </td>
      
        <td>
        <button type="submit" class="btn btn-info" name="formRegistrar">Generar</button>          
          </td> 
         </form>
       </tr>   
  
  </tbody>
</table>







@endsection