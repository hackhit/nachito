<!DOCTYPE html>
<html lang="en">

<head>

          <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">         
          <link rel="stylesheet" type="text/css" href="{{asset('fonts/css/fontawesome-all.css')}}">
          <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.min.css')}}"> 
          <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">

           <link rel="stylesheet" type="text/css" href="{{asset('css/light-bootstrap-dashboard.css?v=2.0.1')}}">
          

             <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
             <link rel="apple-touch-icon" sizes="76x76" href="img/Cake-icon.png">
             <link rel="icon" type="image/png" href="img/cake.ico"> 
         
                <script src="{{asset('public/js/jquery.min.js')}}"></script>               
                <script src="{{asset('js/bootstrap.minjs')}}"></script>
                <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>          
                <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script> 
                <script src="{{asset('js/app.js') }}" defer></script> 
                <script src="{{asset('js/pinterest_grid.js')}}"></script>             
                <script src="{{asset('js/jaliswall.js')}}"></script>  
                <script src="{{asset('js/catalogo.js')}}"></script> 

                <script src="{{asset('js/core/jquery.3.2.1.min.js')}}"></script>
    
                 <script src="{{asset('js/core/popper.min.js')}}"></script> 
                 <script src="{{asset('js/plugins/bootstrap-switch.js')}}"></script> 
                 <script src="{{asset('js/plugins/chartist.min.js')}}"></script> 
                 <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script> 
                 <script src="{{asset('js/light-bootstrap-dashboard.js?v=2.0.1')}}"></script> 
                 <script src="{{asset('js/demo.js')}}"



<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>


    <meta charset="utf-8" />
    
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>Tesis-@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    
    <!-- CSS Files -->
    
    
</head>

<body>

    @if(Session::has('sessionTrabajador'))
    @foreach(Session::get('sessionTrabajador') as $traba)
    @if($traba->cod_cargo ==1)<!--ADMIN -->
    <div class="wrapper">
        <div class="sidebar" data-image="img/sidebar-6.jpg" data-color="purple">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        Perfil <br> Administrador
                    </a>
                </div>
                <ul class="nav      navbar-nav ml-auto ">
                   
                    <li>
                        <a class="nav-link" href="{{route('verClientes')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Ver Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('verPedidosTrabajador')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Ver Pedidos</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('Reportes')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Ver Reportes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('stock')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>ver Stock</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('registrarTrabajador')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Reg. Trabajador</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('nuevaTorta')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Nueva Torta</p>
                        </a>
                    </li>
                    
                    <li>
                        <a class="nav-link" href="{{route('insumosTortas')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Insumos de torta</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('materiaPrima')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Nuevo Insumo</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('precios')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Precios</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('catalogo')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Catálogo</p>
                        </a>
                    </li>
                    
                    <li>
                        <a class="nav-link" href="{{route('entradas')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Insumos Entradas</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('salidas')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Insumos salidas</p>
                        </a>
                    </li>


                   <li>
                        <a class="nav-link" href="{{route('actualizarPerfil')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Actualizar Perfil</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('cerrarSesion')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Cerrar sesión</p>
                        </a>
                    </li>
                   
                    


                                             
                </ul>

            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand"><h3>Bienvenido/a</h3> {{$traba->nombre}} {{$traba->apellido}} </a>
                    <i class="pe-7s-arc"></i>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                       
                        
                    </div>
                </div>
            </nav>


        @elseif($traba->cod_cargo ==2)<!--CAJERO -->
    <div class="wrapper">
        <div class="sidebar" data-image="img/sidebar-6.jpg" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        Perfil <br> Cajero/a
                    </a>
                </div>
                <ul class="nav      navbar-nav ml-auto ">
                   
                   
                    <li>
                        <a class="nav-link" href="{{route('verPedidosTrabajador')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Ver Pedidos</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('actualizarPerfil')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Actualizar Perfil</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('cerrarSesion')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Cerrar sesión</p>
                        </a>
                    </li>
                        
                </ul>

            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand"><h3>Bienvenido/a</h3> {{$traba->nombre}} {{$traba->apellido}} </a>
                    <i class="pe-7s-arc"></i>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                       
                        
                    </div>
                </div>
            </nav>
             @elseif($traba->cod_cargo ==3)<!--Pastelero -->
    <div class="wrapper">
        <div class="sidebar" data-image="img/sidebar-6.jpg" data-color="green">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        Perfil <br> Pastelero/a
                    </a>
                </div>
                <ul class="nav      navbar-nav ml-auto ">
                   
                   
                    <li>
                        <a class="nav-link" href="{{route('verPedidosTrabajador')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Ver Pedidos</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('actualizarPerfil')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Actualizar Perfil</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('cerrarSesion')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Cerrar sesión</p>
                        </a>
                    </li>
                        
                </ul>

            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand"><h3>Bienvenido/a</h3> {{$traba->nombre}} {{$traba->apellido}} </a>
                    <i class="pe-7s-arc"></i>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                       
                       
                    </div>
                </div>
            </nav>
        @endif   
        @endforeach
        @endif
        

         @if(Session::has('miSessionRut'))
         @foreach(Session::get('miSessionRut') as $ses)
    <div class="wrapper">
        <div class="sidebar" data-image="img/sidebar-6.jpg" data-color="azure">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        Perfil <br> Cliente
                    </a>
                </div>
                <ul class="nav      navbar-nav ml-auto ">
                   
                    
                   <li>
                        <a class="nav-link" href="{{route('catalogo')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Catálogo</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('verPedidos')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Ver Pedidos</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('actualizarPerfil')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Actualizar Perfil</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('cerrarSesion')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Cerrar sesión</p>
                        </a>
                    </li>
                        
                </ul>

            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand"><h3>Bienvenido/a</h3> {{$ses->cliente}} {{$ses->apellido}} </a>
                    <i class="pe-7s-arc"></i>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                       
                       
                    </div>
                </div>
            </nav>
        
        @endforeach
        @endif

        
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    
                    
                @yield('content')


                </div>
            </div>
            
        </div>
    </div>
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
                <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>
<!--   Core JS Files   -->


</html>