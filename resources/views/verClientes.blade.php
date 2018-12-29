@extends('layouts.baseNueva')

@section('title','Acceso Cliente')

@section('content')




<h1>Ver Clientes</h1>


<table>
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">rut</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Email</th>
      <th><button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar Cliente</button></th>
    
    </tr>
  </thead>
  <tbody>
    
      @foreach($clientes as $cliente)


    @if ($cliente->codigoCategoria==2 )
      
    
    
      
      <tr>
          <td scope="row" style="color: red">{{$cliente->rut}}</td>
          <td scope="row" style="color: red">{{$cliente->nombre}}</td>
          <td scope="row" style="color: red">{{$cliente->apellido}}</td>
          <td scope="row" style="color: red">{{$cliente->telefono}}</td>
          <td scope="row" style="color: red">{{$cliente->email}}</td> 
          
         
          <td> 

              <form class="formRegistro" method="POST" action="{{route('quitarCastigo')}}">
                {{csrf_field()}}
                <input type="hidden" name="quitarCastigo" value="{{ $cliente->id}}">
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2">Motivo</button>
               <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="">Quitar Castigo</button>
               
              </form>
            </td>
             
    @else
      
    <tr>
          <td scope="row">{{$cliente->rut}}</td>
          <td scope="row">{{$cliente->nombre}}</td>
          <td scope="row">{{$cliente->apellido}}</td>
          <td scope="row">{{$cliente->telefono}}</td>
          <td scope="row">{{$cliente->email}}</td> 
          
          
          


  @endif
  @endforeach


          
          </tr>   
      
      
  </tbody>
</table>

<!-- Button to Open the Modal -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Seleccione Cliente a eliminar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      <form class="formRegistro" method="POST" action="{{route('eliminarCliente')}}">
          {{csrf_field()}}
                  <div class="form-group">
                    <select class="form-control" name='idCliente' >
              
                         
                          @foreach($clientes as $cliente)
                          @if ($cliente->codigoCategoria==1) 
                          <option  value="{{$cliente->id}}"> {{ $cliente->nombre }} {{ $cliente->apellido }} </option>
                          @endif
                          @endforeach
                          

                    </select>
            <label for="comment">Especifique la razón de la eliminación del cliente:</label>
            <textarea style="width: 450px" rows="5" name="descripcion" maxlength="50"></textarea>

                  </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="formRegistrar">Eliminar</button>
      </div>
  </form>
    </div>
  </div>
</div>



<!-- The Modal 2 -->
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Motivos de eliminación de cliente</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
         

      <label> por no retirar a tiempo</label>

        

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>






@endsection