<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Medellin by Vanmartc</title>
        {{ stylesheet_link_tag() }}
        <style>
            body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            padding-left: 15px;
            padding-right: 10px;
            }
        </style>
        {{ javascript_include_tag() }}

        <meta name="viewport" content="width=device-width, initial-scale=1" maximum-sacale=1  user-scalable=no>

    </head>
 
    <body>
    <div class="btn-group btn-group-vertical">

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="/">Medellin</a>
                    <div class="nav-collapse">
                        <ul class="nav nav-tabs nav-stacked">
                            @section('navigation')
                            <li ><a href="/">Home</a></li>
                            @yield('navigation')
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </div>   


 
        <div class="container-fluit">                       
            <div class="hero-unit">
                <div class="row-fluit"  >
                    <div class="row-fluit" class="jumbotron" class="center-block" >
                            <h1 class="text-center">Bienvenido!</h1><br>
                            <img src="assets/wp.jpg" class="img-rounded"  class="img-responsive" alt="Responsive image" />
                        </div>
                    <div class="jumbotron"  class="center-block">
                        
                        
                        <p class="text-center"><a href="/ejercicio1" class="btn btn-primary btn-large">Continar</a>
                            <span class="glyphicon glyphicon-search"></span>
                        </p>
                        
                    </div>
                    


                    
                    

                </div>

            </div>  
            @yield('content')
            <hr>
            <footer>
            <p>&copy; Vanmartc 2014.</p>
            </footer>
        </div> <!-- /container -->
    </body>
</html>