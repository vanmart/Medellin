<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Medellin by Vanmartc</title>
        {{ stylesheet_link_tag() }}
        <style>
            body { padding-top: 60px;
                    padding-left: 30px;
                    padding-right: 10px;
                }
                     /* 60px to make the container go all the way to the bottom of the topbar */
        </style>
        {{ javascript_include_tag() }}
        <meta name="viewport" content="width=device-width, initial-scale=1" maximum-sacale=1  user-scalable=no>
        @section('scripts')
         <!--  Utilizo esta seccion para anecar solo los scripts que necesite cada blade-->
        @yield('scripts')
    </head>
    <body >
       <!-- <nav class="navbar navbar-inverse" role="navigation"> -->
        <div class="navbar navbar-fixed-top" class="container_fluit">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="/">Medellin</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            @section('navigation')
                            <li ><a href="/">Home</a></li>
                            <li ><a href="ejercicio1">Ejercicio 1</a></li>
                            <li ><a href="ejercicio2">Ejercicio 2</a></li>
                            <li ><a href="ejercicio3">Ejercicio 3</a></li>
                            <li ><a href="ejercicio4">Ejercicio 4</a></li>
                            <li ><a href="archivoconfiguracion">subida de archivos</a></li>
                            <li ><a href="ejercicio5">Ejercicio 5</a></li>
                            @yield('navigation')
                            
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!--  </nav> -->
        <div class="container-fluit">
            @section('tablas')
            @yield('tablas')
            @section('numeroAleatorio')
            @yield('numeroAleatorio')
            <div class="row">
                <div class="row-fluit">
                     @section('content')
                      @yield('content')
                    
                            @section('formulario')
                            @yield('formulario')
                    <hr>
                    @section('call')
                        
                    @yield('call')
                    @yield('import')
                    @section('continue')
                    @yield('continue')
                </div>

            </div>
            @if(Session::has('message'))    
                {{ Session::get('message') }}
            @endif 
            <hr>
        </div>

        <footer>
                <p>&copy; Vanmart 2014.</p>
        </footer>
   
    </body>
</html>