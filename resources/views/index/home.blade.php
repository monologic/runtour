@extends('welcome')

@section('title', 'TourMaps')

@section('content')
        <div ng-controller="negociosController">
            <section id="header" class="dark" style="top:-75px;z-index:-10">
                <header>
                    <h1>Bienvido <br> RunaTour</h1>
                    
                </header>
                <footer>
                    <a href="#first" class="button scrolly">Descubrir</a>

                </footer>
               
                    
            </section>
             <div class="frm-info">
                <form role="form" method="POST" action="{{ url('/addDataSession') }}">
                    {{ csrf_field() }}
                    <label for="">Pais</label>
                    <input type="text" name="pais" class="pa inp">
                    <label for="">Region</label>
                    <input type="text" name="region" class="inp">
                    <input type="submit" class="btn btn-app oo" value="Guardar">
                </form>
            </div>
            <!-- First -->
            <section id="first" class="main">
                <header>
                    <div class="container">
                        <h2>RunaTour</h2>
                        <p>Soy una aplicacion que te ayudara a conoces cada rincon del mundo, Descubriras luganres que nunca visitaste, conoceras a mucha gente</p>
                    </div>
                </header>
                <div class="content dark style1 featured">
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
                            <div class="col-md-4">
                                <section>
                                    <span class="feature-icon"><span class="icon fa-bolt"></span></span>
                                    <header>
                                        <h3>Vivamus</h3>
                                    </header>
                                    <p>Gravida dis placerat lectus ante vel nunc euismod est turpis sodales.
                                    Diam tempor dui lacinia accumsan vivamus. Gravida dis placerat lectus
                                    ante vel nunc euismod est turpis sodales. Diam tempor dui lacinia
                                    accumsan vivamus.</p>
                                </section>
                            </div>
                            <div class="col-md-4">
                                <section>
                                    <span class="feature-icon"><span class="icon fa-cloud"></span></span>
                                    <header>
                                        <h3>Accumsan</h3>
                                    </header>
                                    <p>Gravida dis placerat lectus ante vel nunc euismod est turpis sodales.
                                    Diam tempor dui lacinia accumsan vivamus. Gravida dis placerat lectus
                                    ante vel nunc euismod est turpis sodales. Diam tempor dui lacinia
                                    accumsan vivamus.</p>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <footer>
                                    <a href="#second" class="button scrolly">Gravida tempor lacinia</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Second -->
            <section id="second" class="main">
                <header>
                    <div class="container">
                        <h2>Euismod sed feugiat lorem tempus magna</h2>
                        <p>Gravida dis placerat lectus ante vel nunc euismod eget ornare varius gravida euismod lorem ipsum dolor sit amet consequat<br />
                        feugiat. Gravida dis placerat lectus ante vel nunc euismod eget ornare varius gravida euismod lorem ipsum dolor sit amet.</p>
                    </div>
                </header>
                <div class="content dark style2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <section>
                                    <h3>Augue vivamus sed ipsum commodo lorem dolor</h3>
                                    <p>Gravida dis placerat lectus ante vel nunc euismod est turpis sodales. Diam
                                    tempor dui lacinia eget ornare varius gravida. Gravida dis placerat lectus ante
                                    vel nunc euismod est turpis sodales. Diam tempor dui lacinia accumsan vivamus
                                    augue cubilia vivamus nisi eu eget ornare varius gravida euismod.  Gravida dis
                                    lorem ipsum dolor placerat magna tempus feugiat.</p>
                                    <p>Lectus ante vel nunc euismod est turpis sodales. Diam tempor dui lacinia
                                    accumsan vivamus augue cubilia vivamus nisi eu eget ornare varius gravida dolore
                                    euismod lorem ipsum dolor.</p>
                                    <footer>
                                        <a href="#third" class="button scrolly">Accumsan nisi tempor</a>
                                    </footer>
                                </section>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 spaceB"><a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a></div>
                                    <div class="col-md-6 spaceB"><a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a></div>
                                    <div class="col-md-6 spaceB"><a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a></div>
                                    <div class="col-md-6 spaceB"><a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a></div>
                                    <div class="col-md-6 spaceB"><a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a></div>
                                    <div class="col-md-6 spaceB"><a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a></div>
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
@endsection