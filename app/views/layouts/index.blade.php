<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Medellin by Vanmartc</title>
        {{ stylesheet_link_tag() }}
        <style>
            body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
        {{ javascript_include_tag() }}

        <meta name="viewport" content="width=device-width, initial-scale=1" maximum-sacale=1  user-scalable=no>

    </head>
 
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="home">Medellin</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            @section('navigation')
                            <li class="active"><a href="home">Home</a></li>
                            @yield('navigation')
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>


 
        <div class="container-fluit">
            <div class="hero-unit">
                <div class="row"  >
                    <div class="span6"  class="center-block">
                        <h1 class="text-center">Welcome to Medellin!</h1><br>
                        <p class="text-center">Vanmartc is a genius, family and friends too.</p>
                        <p class="text-center">Wow them with your photo-filtering abilities!</p>
                        <p class="text-center">Let them see what a great photographer you are!</p>
                        <p class="text-center"><a href="about" class="btn btn-primary btn-large">Learn more &raquo;</a>
                            <span class="glyphicon glyphicon-search"></span>
                        </p>
                    </div>
                     
                    <div class="span4">
                        <img src="assets/medellin.jpg" class="img-responsive" alt="Responsive image" />
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