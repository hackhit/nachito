<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar sesión</title>

          
          
@php

$bloqueo = 0;

@endphp


@if(Session::has('sessionTrabajador'))

@php
 $bloqueo = 1;
@endphp


@endif
          



          <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">   
          <link rel="stylesheet" type="text/css" href="{{asset('css/paginaInicio.css')}}">
         
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

  <body>

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






    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="imagenes/intro.jpg" alt="">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Las mejores tortas</span>
              <span class="section-heading-lower">la mejor calidad</span>
            </h2>
            <p class="mb-3">Nachito se destaca desde hace muchos años gracias a la gran calidad de sus productos y su buen trato al cliente, ven a conocer la experiencia de consumir nuestros productos de una forma más fácil y rápida gracias a nuestro nueva pagina web.
            </p>
            <div class="intro-button mx-auto">
              <a class="btn btn-primary btn-xl" href="#">Registrate y pruebalo!</a>
            </div>
          </div>
        </div>
      </div>
    </section>

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
        <p class="m-0 small">Copyright &copy; Your Website 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    

  </body>

</html>