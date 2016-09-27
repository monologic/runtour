@extends('welcome')

@section('title', 'Negocios')

@section('content')
  <div ng-controller="negociosController" ng-init="ini()">
    <section class="categ">
          <div id="list-cate">
              <ul>
                  <li id="1"> Alojamiento
                  <ul>
                          <li><input type="checkbox" id="1-1" ng-model="hospedajes" ng-change="construc()"> Hospedajes</li>
                          <li><input type="checkbox" id="1-2" ng-model="hoteles" ng-change="construc()"> Hoteles</li>
                          <li><input type="checkbox" id="1-3" ng-model="albergues" ng-change="construc()"> Albergues</li>
                   </ul>
                  </li>
                  <li id="2">Atractivos Turisticos
                  </li>
                  <li id="3">Entretenimiento
                      <ul>
                        <li><input type="checkbox" id="3-1" ng-model="bares" ng-change="construc()"> Bares y puvs</li>
                        <li><input type="checkbox" id="3-2" ng-model="cines" ng-change="construc()"> Cines</li>
                        <li><input type="checkbox" id="3-3" ng-model="dicostecas" ng-change="construc()"> Discotecas</li>
                        <li><input type="checkbox" id="3-4" ng-model="karaoke" ng-change="construc()"> Karaoke</li>
                        <li><input type="checkbox" id="3-5" ng-model="teatro" ng-change="construc()"> Teatros</li>
                      </ul>
                  </li>
                  <li id="4">Entidades financieras
                      <ul>
                        <li><input type="checkbox" id="4-1" ng-model="bancos" ng-change="construc()"> Bancos</li>
                        <li><input type="checkbox" id="4-2"  ng-model="cajas" ng-change="construc()"> Cajas</li>
                        <li><input type="checkbox" id="4-3"  ng-model="cooperativas" ng-change="construc()"> Cooperativas</li>
                      </ul>
                  </li>
                  <li id="5">Restaurantes
                      <ul>
                        <li><input type="checkbox" value="5-1"  ng-model="parrilldas" ng-change="construc()"> Parrillas</li>
                        <li><input type="checkbox" value="5-2"  ng-model="pizeria" ng-change="construc()"> Pitzzerias</li>
                        <li><input type="checkbox" value="5-3"  ng-model="polleria" ng-change="construc()"> Pollerias</li>
                        <li><input type="checkbox" value="5-4"  ng-model="restaurates" ng-change="construc()"> Restaurantes</li>
                        <li><input type="checkbox" value="5-5"  ng-model="snacks" ng-change="construc()"> Snacks</li>
                      </ul>
                  </li>
                  <li id="6">Tiendas
                      <ul>
                        <li><input type="checkbox" id="6-1"  ng-model="artefactos" ng-change="construc()"> Artefactos</li>
                        <li><input type="checkbox" id="6-2"  ng-model="calzado" ng-change="construc()"> Calzado</li>
                        <li><input type="checkbox" id="6-3"  ng-model="informatica" ng-change="construc()"> Informatica</li>
                        <li><input type="checkbox" id="6-4"  ng-model="leceria" ng-change="construc()"> Lenceria</li>
                        <li><input type="checkbox" id="6-5"  ng-model="ropa" ng-change="construc()"> Ropa</li>
                      </ul>
                  </li>
                  <li id="7">Transporte turistico
                  </li>
              </ul>
          </div>
    </section>
    <div class="row" style="margin:-20px 30px 0px 280px;min-height:400px">
      <section class="col-md-12">
        <section class="row ctn bsq" style="max-width:650px">
          <div class="col-md-5">
            <label for="pais">Pa&iacute;s</label>
            <input type="text" id="pais-send" ng-model="pais" class="form-kira pa">
          </div>
          <div class="col-md-5">
            <label for="pais">Region</label>
            <input type="text" ng-model="region" class="form-kira">
          </div>
          <div class="col-md-2">
            <a class="btn-flot-p" ng-click="getn()"><i class="fa fa-search" aria-hidden="true"></i></a>
          </div>
        </section>
        <article dir-paginate="g in negocios | itemsPerPage: 1" class="row catg">
          <div class="col-md-3">
            <img src="logos/empresa/@{{g.logo}}" class="img-responsive">
          </div>
          <div class="col-md-6">
            <strongv>@{{g.empresa}}</strong>
            <hr style="margin-top:10px">
            <p class="cont-des">@{{g.descripcion}}</p>
          </div>
          <div class="col-md-2 cont-info">
            <p><i class="fa fa-phone"></i> @{{g.telefono}}</p>
            <p><i class="fa fa-envelope-o" aria-hidden="true"></i> @{{g.correo}}</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i></i> @{{g.direccion}}</p>
          </div>
        </article>
        <dir-pagination-controls></dir-pagination-controls>

      </section>
    </div>
  </div>
@endsection