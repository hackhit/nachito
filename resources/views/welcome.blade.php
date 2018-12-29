<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pastelería</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->


        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Acceder</a>
                        <a href="{{ route('register') }}">Registrar</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Pastelería
                </div>
                   
                <div class="links">
                    <a href="{{route('registrarCliente')}}">Registro CLiente</a>               
                    <a href="{{route('accesoTrabajador')}}">Acceso Trabajador</a>
                    <a href="{{route('accesoCliente')}}">Acceso Cliente</a>
               
                </div>
                    
            </div>
        </div>
    </body>


</html>



<!-- 
PARA LA ENTREGA FINAL, ES NECESARIO REALIZAR TODOS LOS COMPONENTES NECESARIOS PARA REALIZAR EL PEDIDO, LA CONFIRMACIÓN, LA ENTREGA DEL CODIGO, ACTUALIZAR EL STOCK DE ACUERDO A LOS PEDIDOS, ESTABLACER LA HORA CUANDO NO SE HA RETIRADO LA TORTA Y SI NO SE RETIRA A TIEMPO, SE ENVIA INFO A TODOS LOS USUARIOS QUE HAN SELECCIONADO ESA TORTA EN ALGUNA OPORTUNIDAD Y SE DA UN PLAZO PARA RETIRAR LA TORTA QUE NO FUE PAGADA POR OTRO USUARIO. ESTABLECER UN REPORTE DIARIO DE LAS TORTAS QUE NO FUERON RETIRADAS Y POR QUIEN.

-->