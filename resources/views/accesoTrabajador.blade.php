<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar sesión</title>

          
          

          



          <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">   
          <link rel="stylesheet" type="text/css" href="{{asset('css/paginaInicio.css')}}">
          <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
         
            <script src="{{asset('public/js/jquery.min.js')}}"></script>               
            <script src="{{asset('js/bootstrap.minjs')}}"></script>
            <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>          
            <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script> 
            <script src="{{asset('js/app.js') }}" defer></script> 
            <script src="{{asset('js/pinterest_grid.js')}}"></script>             
            <script src="{{asset('js/jaliswall.js')}}"></script>  
            <script src="{{asset('js/catalogo.js')}}"></script> 




  
    

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">


    

  </head>

  <body >

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Pasteleria</span>
      <span class="site-heading-lower">Nachito</span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="{{route('inicio')}}">volver
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="{{route('accesoTrabajador')}}">Trabajador</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="{{route('accesoCliente')}}" >Cliente</a>
            </li>
            
            
          </ul>
        </div>
      </div>
    </nav>





  
<div class="container">

<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Login Trabajador</h2>
   <p>Por favor ingrese su Rut y contraseña</p>
   </div>

    <form class="formRegistro" method="POST" id="Login" action="{{route('accesoTrabajador')}}">
   {{ csrf_field() }}

        <div class="form-group">


            <input type="text" class="form-control" id="inputR" name="rut"  required placeholder="Rut Trabajador">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputClave" name="password" placeholder="Contraseña"  required maxlength="30">

        </div>
        <div class="forgot">
        <a href="reset.html">¿Olvidó su contraseña?</a>
        <div class="col-sm-12">
       @include('flash::message') 
    </div>
</div>
        <button type="submit" class="btn btn-primary" name="formRegistrar">Ingresar</button>
      
    </form>
    </div>
</div></div></div>


</body>


    

    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">NACHITO</span>
                <span class="section-heading-lower">pasteleria</span>
              </h2>
              
            </div>
          </div>
        </div>
      </div>
    </section>








    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; Nachito Pasteleria 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    

  </body>

</html>



