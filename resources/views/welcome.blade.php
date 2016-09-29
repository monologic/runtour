<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="{{asset('assets/files/css/fileinput.css')}}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/awesome/css/font-awesome.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/kira.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/check.css')}}" />
    </head>
    <body ng-app="App">
        <!-- Header -->
        <div class="btn-pais" id="pais2"></div>
        <nav class="navbar navbar-default" style="background-color:#F9690E;border-radius:0px;border-color:transparent">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/" style="color:white">TourMaps</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/mapa" style="color:white;font-family: 'Montserrat', sans-serif;">MAPA</a></li>
                <li><a href="/registro" style="color:white;font-family: 'Montserrat', sans-serif;">REGISTRO</a></li>
                <li><a href="/negocios" style="color:white;font-family: 'Montserrat', sans-serif;">NEGOCIOS</a></li>
                <li><a href="/contacto" style="color:white;font-family: 'Montserrat', sans-serif;">CONTACTO</a></li>
                <li class="pais-id">PAIS</li>

              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        @yield('content')
        <!-- Footer -->

        <!-- Scripts -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrolly.min.js')}}"></script>
        <script src="{{asset('assets/angular/angular.min.js')}}"></script>
        <script src="{{asset('assets/angular/main.js')}}"></script>
        <script src="{{asset('assets/angular/negociosController.js')}}"></script>
        <script src="{{asset('assets/angular/directives/pagination/dirPagination.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/skel.min.js')}}"></script>
        <script src="{{asset('assets/js/util.js')}}"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="{{asset('assets/bootstrap/js/bootstrap.js')}}"></script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="{{asset('assets/files/js/fileinput.js')}}"></script>
        
    
         <script>
            $.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
                datos=data;
                ht="<div class='cont-band'><img class='band' src='assets/flags/"+data.address.country_code+".png'><strong>"+data.address.country_code+"</strong></div><div id='datos'>"+data.latitude+" "+data.longitude+" "+ data.zoom+"<div>";
                $('.pais-id').html(ht);
                $('.pa').val(data.address.country);
            });
            </script>
    </body>
</html>