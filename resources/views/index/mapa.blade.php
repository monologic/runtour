@extends('welcome')

@section('title', 'Mapa')

@section('content')
  <section  ng-controller="paicesController" ng-init="get();dtubicacion()">
    <section class="categ">
          <div id="list-cate">
              <ul>
                  <li id="1"> Alojamiento
                  <ul>
                          <li><input type="checkbox" id="op1-1" ng-model="hospedajes" ng-change="addMaker()"> Hospedajes</li>
                          <li><input type="checkbox" id="op1-2" ng-model="hoteles" ng-change="addMaker()"> Hoteles</li>
                          <li><input type="checkbox" id="op1-3" ng-model="albergues" ng-change="addMaker()"> Albergues</li>
                   </ul>
                  </li>
                  <li id="2">Atractivos Turisticos
                  </li>
                  <li id="3">Entretenimiento
                      <ul>
                        <li><input type="checkbox" id="op3-1" ng-model="bares" ng-change="addMaker()"> Bares y puvs</li>
                        <li><input type="checkbox" id="op3-2" ng-model="cines" ng-change="addMaker()"> Cines</li>
                        <li><input type="checkbox" id="op3-3" ng-model="dicostecas" ng-change="addMaker()"> Discotecas</li>
                        <li><input type="checkbox" id="op3-4" ng-model="karaoke" ng-change="addMaker()"> Karaoke</li>
                        <li><input type="checkbox" id="op3-5" ng-model="teatro" ng-change="addMaker()"> Teatros</li>
                      </ul>
                  </li>
                  <li id="4">Entidades financieras
                      <ul>
                        <li><input type="checkbox" id="op4-1" ng-model="bancos" ng-change="addMaker()"> Bancos</li>
                        <li><input type="checkbox" id="op4-2"  ng-model="cajas" ng-change="addMaker()"> Cajas</li>
                        <li><input type="checkbox" id="op4-3"  ng-model="cooperativas" ng-change="addMaker()"> Cooperativas</li>
                      </ul>
                  </li>
                  <li id="5">Restaurantes
                      <ul>
                        <li><input type="checkbox" id="op5-1"  ng-model="parrilldas" ng-change="addMaker()"> Parrillas</li>
                        <li><input type="checkbox" id="op5-2"  ng-model="pizeria" ng-change="addMaker()"> Pitzzerias</li>
                        <li><input type="checkbox" id="op5-3"  ng-model="polleria" ng-change="addMaker()"> Pollerias</li>
                        <li><input type="checkbox" id="op5-4"  ng-model="restaurates" ng-change="addMaker()"> Restaurantes</li>
                        <li><input type="checkbox" id="op5-5"  ng-model="snacks" ng-change="addMaker()"> Snacks</li>
                      </ul>
                  </li>
                  <li id="6">Tiendas
                      <ul>
                        <li><input type="checkbox" id="op6-1"  ng-model="artefactos" ng-change="addMaker()"> Artefactos</li>
                        <li><input type="checkbox" id="op6-2"  ng-model="calzado" ng-change="addMaker()"> Calzado</li>
                        <li><input type="checkbox" id="op6-3"  ng-model="informatica" ng-change="addMaker()"> Informatica</li>
                        <li><input type="checkbox" id="op6-4"  ng-model="leceria" ng-change="addMaker()"> Lenceria</li>
                        <li><input type="checkbox" id="op6-5"  ng-model="ropa" ng-change="addMaker()"> Ropa</li>
                      </ul>
                  </li>
                  <li id="7">Transporte turistico
                  </li>
              </ul>
          </div>
    </section>
    <div class="btn-floting-control">
      <a href="" class="btn btn-danger circle" ng-click="mas()"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <a href="" class="btn btn-danger circle" ng-click="menos()"><i class="fa fa-minus" aria-hidden="true"></i></a>
    </div>
    <div id="globo">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ng-click="closebqd();dtubicacion()"><span aria-hidden="true">&times;</span></button>
      <h1 class="text-center font" style="margin-top:12px">¿DONDE BUSCAR?</h1>
      <div class="col-xs-5">
        <label for="" style="color:black" class="font">Pais</label>
        <select name="pais" id="selpais" class="form-control2">
            <option value="PE"  data-img-src="images/mrk-1.png">Peru</option>
            <option value="ARG" data-img-src="images/mrk-1.png">Argentina</option>
            <option value="MX" data-img-src="images/mrk-1.png">Mexico</option>
            <option value="BO" data-img-src="images/mrk-1.png">Bolibia</option>
        </select>
      </div>
      <div class="col-xs-5">
        <label for="" style="color:black" class="font">Región / Ciudad</label>
        <input type="text" id="selregion" class="form-control2">
      </div>
      <div class="col-xs-2" style="margin:20px auto 10px auto">
        <a href="" class="btn btn-primary circle" style="width:100%"><i class="fa fa-search" style="margin-left:-4px"></i></a>
      </div> 
    </div>
    <div id="report">
      <button type="button" class="close2" data-dismiss="alert" aria-label="Close" ng-click="closeinfo()"><span aria-hidden="true">&times;</span></button>
      <div id="cont-img" class="col-xs-3"></div>
      <div id="cont-title" class="col-xs-9"></div>
      <div id="cont-desc" class="col-xs-12"></div>
      <a class='btn btn-success rsl' ng-click='enrutando()'> <i class='fa fa-map-signs' aria-hidden='true'></i>  Trazar ruta</a>
    </div>
    <map id="map">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
      </map>
  </section>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCACx5jRrZBQGgjU_3QXdo5X7S5jDi0f9E"
    async defer></script>
@endsection