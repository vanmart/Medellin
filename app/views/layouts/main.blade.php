<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Medellin by Vanmartc</title>
        {{ stylesheet_link_tag() }}
        <style>
            body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            padding-left: 30px;/* para organizar problema de bootstrap */
            padding-right: 10px;
            }
        </style>
        {{ javascript_include_tag() }}

        <!-- PARA QUE TENGA EN CUENTA LAS RESOLUCIONES-->
        <meta name="viewport" content="width=device-width, initial-scale=1" maximum-sacale=1  user-scalable=no>

    </head>
 
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="/">Medellin</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            @section('navigation')
                            <li class="active"><a href="/">Home</a></li>
                            @yield('navigation')
                            
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>


 
        <div class="container-fluit">
            <div class="hero-unit">
                <div class="row">
                    <div class="span6 offset3" class="text-center">
                        <h1>Registro!</h1>
                        @section('formulario')
                        
                        @yield('formulario')
                       <p><a href="about" class="btn btn-primary btn-large">Learn more &raquo;</a>
                           <span class="glyphicon glyphicon-search"></span>
                        </p>
                    </div>
                    
                </div>
                 @yield('content')
            </div>  
            
            <hr>
            <footer>
            <p>&copy; Vanmart 2014.</p>
            </footer>
        </div> <!-- /container -->
    </body>
</html>