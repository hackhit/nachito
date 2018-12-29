<!DOCTYPE html>

<html>
    <head>
        <title>Tesis-@yield('title')</title>
        	<meta charset="UTF-8">
			<meta name="description" content="Proyecto Tesis">
         
         <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">           
          <link rel="stylesheet" type="text/css" href="{{asset('fonts/css/fontawesome-all.css')}}">
          <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.min.css')}}"> 
          <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
         
            <script src="{{asset('public/js/jquery.min.js')}}"></script>               
            <script src="{{asset('js/bootstrap.minjs')}}"></script>
            <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>          
            <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script> 
            <script src="{{asset('js/app.js') }}" defer></script> 
            <script src="{{asset('js/pinterest_grid.js')}}"></script>             
            <script src="{{asset('js/jaliswall.js')}}"></script>  
             <script src="{{asset('js/catalogo.js')}}"></script> 

    </head>
    <body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark sticky-top">
        
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      @if(Session::has('miSessionRut'))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acceso
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="{{route('catalogo')}}">Catálogo</a> 
           <a class="dropdown-item" href="{{route('verPedidos')}}">Ver Pedidos</a>            
          <a class="dropdown-item" href="{{route('cerrarSesion')}}">cerrar sesión</a>
           
        </div>
      </li>
     @endif
  
  
 @if(Session::has('sessionTrabajador'))
  @foreach(Session::get('sessionTrabajador') as $traba)
    @if($traba->cod_cargo ==1)<!--ADMIN -->
   
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acceso Trabajador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('registrarTrabajador')}}">Registro Trabajador</a>
          <a class="dropdown-item" href="{{route('verClientes')}}">Ver Clientes</a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('verPedidosTrabajador')}}">Ver Pedidos</a> 
          <a class="dropdown-item" href="{{route('nuevaTorta')}}">Nueva Torta</a>  
          <a class="dropdown-item" href="{{route('materiaPrima')}}">Nuevo Insumo</a>  
          <a class="dropdown-item" href="{{route('insumosTortas')}}">Insumos de Torta</a>  
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('precios')}}">Precios</a> 
           <a class="dropdown-item" href="{{route('catalogo')}}">Catálogo</a>  
            <div class="dropdown-divider"></div>     
          <a class="dropdown-item" href="{{route('Reportes')}}">Reportes</a>
       
           <div class="dropdown-divider"></div>           
          <a class="dropdown-item" href="{{route('cerrarSesion')}}">cerrar sesión</a>



        
    @elseif($traba->cod_cargo ==2) <!--cajer@ -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acceso Cajero

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">             
      
          <a class="dropdown-item" href="{{route('verPedidosTrabajador')}}">Ver Pedidos</a>          
          <a class="dropdown-item" href="{{route('cerrarSesion')}}">cerrar sesión</a>
          
        </div>
      </li>
      @elseif($traba->cod_cargo ==3) <!--Pasteler@ -->
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acceso Pastelero 

              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">    
                <a class="dropdown-item" href="{{route('verPedidosTrabajador')}}">Ver Pedidos</a>          
                <a class="dropdown-item" href="{{route('cerrarSesion')}}">cerrar sesión</a>
                
              </div>
            </li>
      @endif



 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stock
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
           <a class="dropdown-item" href="{{route('stock')}}">Ver Stock</a>
              <div class="dropdown-divider"></div> 
           <a class="dropdown-item" href="{{route('entradas')}}">Ver Entradas de Insumos</a>
           <a class="dropdown-item" href="{{route('salidas')}}">Ver Salidas de Insumos</a>
         
          </div>  

    















    @endforeach
  @endif
    
    </ul>

  </div>
</nav>





<div class="container-fluid">
  @yield('content')
</div>

    </body>

</html>






