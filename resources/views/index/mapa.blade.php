@extends('welcome')

@section('title', 'Mapa')

@section('content')
  <section  ng-controller="paicesController" ng-init="get()">
    <div class="btn-floting">
      <a href="" class="btn btn-danger circle" ng-click="bsq()"><i class="fa fa-crosshairs" aria-hidden="true"></i></a>
      <a href="" class="btn btn-danger circle" ng-click="bsq2()"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
    </div>
    <div class="btn-floting-control">
      <a href="" class="btn btn-danger circle" ng-click="mas()"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <a href="" class="btn btn-danger circle" ng-click="menos()"><i class="fa fa-minus" aria-hidden="true"></i></a>
    </div>
    <div id="globo">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ng-click="closebqd()"><span aria-hidden="true">&times;</span></button>
      <h1 class="text-center font" style="margin-top:12px">¿DONDE BUSCAR?</h1>
      <div class="col-xs-12">
        <label for="" style="color:black" class="font">Pais</label>
        <select  id="pais"  ng-model="PS" class="form-control2 paises">
          <option  ng-repeat="x in paices" value="@{{x.Codigo}}">@{{x.Pais}}</option>
        </select>
      </div>
      <div class="col-xs-12">
        <label for="" style="color:black" class="font">Región / Ciudad</label>
        <input type="text" id="region" class="form-control2">
      </div>
      <div class="col-xs-12" style="margin:20px auto 10px auto">
        <a href="" class="btn btn-primary" style="width:100%"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
      </div> 
    </div>
    <div id="report">
      <button type="button" class="close2" data-dismiss="alert" aria-label="Close" ng-click="closeinfo()"><span aria-hidden="true">&times;</span></button>
      <div id="cont-img" class="col-xs-3"></div>
      <div id="cont-title" class="col-xs-9"></div>
      <div id="cont-desc" class="col-xs-12"></div>
      <a class='btn btn-success rsl' ng-click='enrutando()'> <i class='fa fa-map-signs' aria-hidden='true'></i>  Trazar ruta</a>
    </div>
    <div id="globo2">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ng-click="closebqd2()"><span aria-hidden="true">&times;</span></button>
      <h1 class="text-center font" style="margin-top:12px">CATEGORIAS</h1>
      <div class="col-xs-12 nas">
        <ul>
          <li>
            <label class="control control--checkbox">Turismo
              <input type="checkbox" id="op0" ng-model="rs0" ng-change="addMaker()"/>
              <div class="control__indicator"></div>
            </label>
          </li>
          <li>
            <label class="control control--checkbox">Restaurantes
              <input type="checkbox" id="op1" ng-model="rs1" ng-change="addMaker()"/>
              <div class="control__indicator"></div>
            </label>
          </li>
          <li>
            <label class="control control--checkbox">Hoteles
              <input type="checkbox"  id="op2" ng-model="rs2" ng-change="addMaker()" />
              <div class="control__indicator"></div>
            </label>
          </li>
          <li>
            <label class="control control--checkbox">Museo
              <input type="checkbox" id="op3" ng-model="rs3" ng-change="addMaker()" />
              <div class="control__indicator"></div>
            </label>
          </li>
          <li>
            <label class="control control--checkbox">Parques
              <input type="checkbox" id="op4" ng-model="rs4" ng-change="addMaker()"/>
              <div class="control__indicator"></div>
            </label>
          </li>
          <li>
            <label class="control control--checkbox">Bancos
              <input type="checkbox" id="op5" ng-model="rs5" ng-change="addMaker()"/>
              <div class="control__indicator"></div>
            </label>
          </li>
          <li>
            <label class="control control--checkbox">Ropa
              <input type="checkbox" id="op6" ng-model="rs6" ng-change="addMaker()"/>
              <div class="control__indicator"></div>
            </label>
          </li>
          <li>
            <label class="control control--checkbox">Tiendas
              <input type="checkbox" id="op7" ng-model="rs7" ng-change="addMaker()"/>
              <div class="control__indicator"></div>
            </label>
          </li>
        </ul>
      </div>
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