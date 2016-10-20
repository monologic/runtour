@extends('panel')

@section('title', 'Pagos')

@section('content')
<section ng-controller="pagoController">
  <h1>Seccion de pago</h1>
  <section class="card">
    <button type="button" class="btn btn-primary" ng-click="open()"> <i class="fa fa-plus"></i> Agregar Negocio</button>
    <div style="margin:30px 0px ">
    <hr>
      <div class="row">
        <div class="col-md-4">
          <label for="pais">Pais</label>
          <input type="text" id="pais" ng-model="pais" class="form-control">
        </div>
        <div class="col-md-4">
          <label for="pais">Region</label>
          <input type="text" id="region" ng-model="region" class="form-control">
        </div>
      </div><br>
      <button class="btn btn-primary" ng-click="negos()">Buscar</button>
    </div>
    <hr>
    </section>
    <section class="card" ng-if="complet = 'true'">
      <input type="text" class="form-control" style="max-width:300px" ng-model="search" placeholder="Buscar..">
      <table class="table">
        <thead>
          <tr>
            <th>Logo</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Pago</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="n in negocios | filter : search ">
            <td><img src="../logos/empresa/@{{n.logo}}" class="circle img-responsive" style="width:40px" alt=""></td>
              <td>@{{n.empresa}}</td>
              <td>@{{n.nombre}}</td>
              <td>@{{n.telefono}}</td>
              <td><i class="fa fa-cog" aria-hidden="true" ng-if="n.pago == 0"></i> <i class="fa fa-money" aria-hidden="true" ng-if="n.pago == 1"></i></td>
          </tr>
        </tbody>
      </table>
    </section>
</section>
  

<!--  close Modal-->

@endsection