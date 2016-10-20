<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/awesome/css/font-awesome.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}" />

    </head>
    <body ng-app="AppAdmin">
       
    <nav>
        <ul>
            <li><a href="{{ url('admin/ranking') }}">Ranking</a></li>
            <li><a href="{{ url('admin/pago') }}">Pagados</a></li>
            <li><a href="{{ url('admin/ranking') }}">Recientes</a></li>
        </ul>
    </nav>
        <section style="width:calc(100% - 270px);margin:20px 260px">
            @yield('content')
        </section>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrolly.min.js')}}"></script>
        <script src="{{asset('assets/select-img/ImageSelect.jquery.js')}}"></script>
        <script src="{{asset('assets/angular/angular.min.js')}}"></script>
        <script src="{{asset('assets/angular/mainAdmin.js')}}"></script>
        <script src="{{asset('assets/angular/controllers/adminRankController.js')}}"></script>
        <script src="{{asset('assets/angular/controllers/pagoController.js')}}"></script>
        <script src="{{asset('assets/angular/directives/click/compileData.js')}}"></script>
        <script src="{{asset('assets/angular/directives/pagination/dirPagination.js')}}"></script>
        <script src="{{asset('assets/js/skel.min.js')}}"></script>
        <script src="{{asset('assets/js/util.js')}}"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="{{asset('assets/bootstrap/js/bootstrap.js')}}"></script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="{{asset('assets/files/js/fileinput.js')}}"></script>
        
        
    </body>
</html>