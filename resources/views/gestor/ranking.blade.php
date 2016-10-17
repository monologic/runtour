@extends('panel')

@section('title', 'Ranking')

@section('content')
<div ng-controller="adminRankController" ng-init="getAll()">
  <h1>Ranking de negocios</h1>
  <section class="card">
    <table class="table">
      <thead>
        <tr>
          <th>Logo</th>
          <th>Empresa</th>
          <th>Pais</th>
          <th>Region</th>
          <th>Visitas</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="g in negocios ">
          <td><img src="../logos/empresa/@{{g.logo}}" alt="" class="img-responsive" style="max-width:50px"></td>
          <td>@{{g.empresa}}</td>
          <td>@{{g.pais}}</td>
          <td>@{{g.region}}</td>
          <td>@{{g.visitas}}</td>
        </tr>
      </tbody>
    </table>
  </section>
</div>
@endsection