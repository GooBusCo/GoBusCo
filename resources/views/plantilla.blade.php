<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('meta')
    <title>@yield('title')</title>    
</head>
<body>

    <div class="navbar-fixed">
        <nav style="background-color: #fff;" >
            <div class="nav-wrapper">
                <a href="{{ route('home')}}" class="left"><img src="{{asset('imagenes/Logo-GOBUS.png')}}" class="responsive-img" style="max-height: 65px;" ></a>
                <a href="#" data-target="menu-responsive" style="color: #2e7d32  ;" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down" style="padding-right:20px">
                    <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Nuestro grupo</b></a></li> 
                    <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Facturación</b></a></li>
                    <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Imprime tu boleto</b></a></li> 
                    <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Empleo</b></a></li>
                    <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Cambia tu boleto</b></a></li> 
                </ul>
            </div>
        </nav>
    </div>

    <ul class="sidenav" style="background-color: #fff"  id="menu-responsive">
        <li><a href="{{ route('home')}}" style="color: #2e7d32  ;"><b>Inicio</b></a></li> 
        <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Nuestro grupo</b></a></li> 
        <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Facturación</b></a></li>
        <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Imprime tu boleto</b></a></li> 
        <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Empleo</b></a></li>
        <li><a href="#" class="white" style="color: #2e7d32  ;"><b>Cambia tu boleto</b></a></li> 
    </ul>


    

   

    <div class="">
        @yield('content')
    </div>
    
    

    <footer class="page-footer" style="background-color: #2e7d32;">
        <div class="container">
        <div class="row">
            <div class="col l6 s12">
            <h5 class="white-text">Nosotros</h5>
            <ul>
                <li><a class="grey-text text-lighten-3" href="#">¿Quienes somos?</a></li>
                <li><a class="grey-text text-lighten-3" href="#">Contacto</a></li>
            </ul>
            </div>
            <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Legal</h5>
            <ul>
                <li><a class="grey-text text-lighten-3" href="#">Politica de privacidad</a></li>
                <li><a class="grey-text text-lighten-3" href="#">Terminos y condiciones</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="footer-copyright">
        <div class="container">
        © 2023 GO-BUS Transport 
        </div>
        </div>
    </footer>
    
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });

        window.costo=0;
        window.salida=0;
        window.llegada=0; 
        window.duracion=0;
    </script>

    @yield('scripts')
</body>
</html>
