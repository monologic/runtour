@extends('welcome')

@section('title', 'TourMaps')

@section('content')
        <div ng-controller="negociosController" ng-init="dtubicacion()">
            <div id="PrimeroParte">
                <section id="header"></section>
                <div class="frm-info">
                    <h2 class="text-center text-bv"><i class="fa fa-slack" aria-hidden="true"></i> <br> RunaTour</h2>
                    <form class="frm-session" ng-submit="sendSession()" role="form" method="POST">
                        {{ csrf_field() }}
                        <label for="">Pais</label>
                        <select name="pais" id="selpais" class="pa inp my-select">
                            <option value="PE"  data-img-src="images/mrk-1.png">Peru</option>
                            <option value="ARG" data-img-src="images/mrk-1.png">Argentina</option>
                            <option value="MX" data-img-src="images/mrk-1.png">Mexico</option>
                            <option value="BO" data-img-src="images/mrk-1.png">Bolibia</option>
                        </select>
                        <label for="">Region</label>
                        <input type="text" id="selregion" name="region" class="inp">
                        <input type="submit" class="btn btn-comenzar" value="Comenzar">
                    </form>
                </div>
            </div>
            <div id="SegundaParte" ng-if="openDat">
                <div class="cont-principal">
                    <section id="first" class="main">
                        <header>
                            <div class="container">
                                <h2>RunaTour</h2>
                                <p>Soy una aplicacion que te ayudara a conoces cada rincon del mundo, Descubriras luganres que nunca visitaste, conoceras a mucha gente</p>
                            </div>
                        </header>
                        <div class="content featured">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <section>
                                            <span class="feature-icon"><span class="icon fa-clock-o"></span></span>
                                            <header>
                                                <h3>Gravida</h3>
                                            </header>
                                            <p>Gravida dis placerat lectus ante vel nunc euismod est turpis sodales.
                                            Diam tempor dui lacinia accumsan vivamus. Gravida dis placerat lectus
                                            ante vel nunc euismod est turpis sodales. Diam tempor dui lacinia
                                            accumsan vivamus.</p>
                                        </section>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                    <hr>
                    <section id="second" class="main">
                         <header>
                            <div class="container">
                                <h2>Ranking del negocios</h2>
                            </div>
                        </header>
                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="row cont-rank" ng-repeat="u in hRanking" >
                                        <div class="col-xs-4">
                                             <img src="logos/empresa/@{{u.logo}}" class="rank-img" alt="">
                                        </div>
                                       <div class="col-xs-8">
                                           <b>@{{u.empresa}}</b> <br>
                                            <q>@{{u.direccion}}</q><br>
                                            <q>@{{u.telefono}}</q>
                                       </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="footer" style="background-color:white">
                        <ul class="icons">
                            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                            <li><a href="#" class="icon fa-youtube"><span class="label">Dribbble</span></a></li>
                        </ul>
                    </section> 
                </div>
                
            </div>
        </div>
@endsection