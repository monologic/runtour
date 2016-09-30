@extends('welcome')

@section('title', 'Registrate')

@section('content')
  <section class="row" ng-controller="negociosController" ng-init="openr()">
    <form class="frm" role="form" method="POST" action="{{ url('/addempresa') }}" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-6">
      <img src="images/registro.jpg" class="img-responsive" alt="">
    </div>
    <div class="col-md-6" style="margin-top:19px">
      <div class="row" style="max-width:400px;margin:0px auto 20px auto">
        <section id="p-section" class="c-f">
          <h3 class="tit-h3">Ingrese su información</h3>
          <div class="form-group">
            <label for="exampleInputEmail1">Nombres y Apellidos</label>
            <input type="text" class="form-control" id="nombres" placeholder="" name="nombre">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" placeholder="" name="telefono">
          </div>
          <div class="form-group">
            <label for="correo">Email</label>
            <input type="email" class="form-control" id="correo" placeholder="" name="correo">
          </div>
          <br>
          <a class="btn btn-app center-block" ng-click="pasar(1)"> Siguiente &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </section>

        <section id="s-section" class="c-f">
          <h3 class="tit-h3">Ingrese información de su negocio</h3>
          <div class="form-group">
              <label for="empresa">Nombre del negocio</label>
              <input type="text" class="form-control" id="empresa" placeholder="" name="empresa">
          </div>
          <div>
          <div class="col-md-6" style="margin-left:-15px">
            <label for="categoria">Categoria</label>
            <select id="opcat" class="form-control" ng-model="elCateg" ng-change="desplegar()">
                <option value="1">Alojamiento</option>
                <option value="2">Atracctivo turistico</option>
                <option value="3">Entretenimiento</option>
                <option value="4">Entidad financiera</option>
                <option value="5">Restaurante</option>
                <option value="6">Tienda</option>
                <option value="7">Transporte turistico</option>
            </select>
          </div>
            <div class="col-md-6">
              <label for="categoria">Negocio</label>
              <select class="form-control" name="categoria_id" ng-model="subc" ng-options="listc as listc.name for listc in listc track by listc.value">
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="url">Url o dominio</label>
            <input type="text" class="form-control" id="url" placeholder="" name="url">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="" cols="30" rows="7" class="form-control"></textarea>
          </div><br>
          <div class="col-md-6">
             <a class="btn btn-app center-block" ng-click="pasar(2)"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Atras  </a>
          </div>
          <div class="col-md-6">
            <a class="btn btn-app center-block" ng-click="pasar(2)"> Siguiente &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
          </div>
         
          
        </section>

        <section id="t-section" class="c-f">
          <h3 class="tit-h3">Ingrese la ubicación del negocio</h3>
          <div class="form-group col-md-6">
            <label for="pais">Pais</label>
            <input type="text" class="form-control paices" id="pais" placeholder="" name="pais">
          </div>
          <div class="form-group col-md-6">
            <label for="region">Region / Estado</label>
            <input type="text" class="form-control" id="region" placeholder="" name="region">
          </div>
          <div style="width:95%;margin:0px auto 0px auto">
            <div class="form-group">
              <label for="direc">Dirección</label>
              <input type="text" class="form-control" id="direc" placeholder="" name="direccion">
            </div>
            <div style="width:100px;margin:10px auto 20px auto">
              <a class="btn btn-success" onclick="codeAddress()"><i class="fa fa-map-marker" aria-hidden="true"></i> UBICAR EN EL MAPA </a>
            </div>
            <map id="map2" style="display: block;width:100%;height:100%;margin-bottom:20px;margin-top:20px"></map>
            <div class="form-group">
                <label>Ingrese su logo</label>
                <input id="file-3" type="file" name="imagen" multiple=false>
            </div>
            <input type="hidden" id="lon" name="longitud">
            <input type="hidden" id="lat" name="latitud">
          </div>
          <div class="col-md-6">
             <a class="btn btn-app center-block" ng-click="pasar(2)"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Atras  </a>
          </div>
          <div class="col-md-6">
           <button class="btn btn-app center-block" ng-click="pasar(2)"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp; Registrar  </button>
          </div>
        </section>
      </div>
    </form>
  </section>


  <script>
    $("#file-3").fileinput({
      showCaption: false,
      browseClass: "btn btn-primary btn-lg",
      fileType: "any"
    });
      var geocoder;
      var map;
      var markersArray = [];
      function initMap() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
          zoom: 16,
          center: latlng
        }
        map = new google.maps.Map(document.getElementById("map2"), mapOptions);
        google.maps.event.addListener(map, 'click', function(event) {
            clearOverlays();
            addMarker(event.latLng);
          });
        }
      
      function addMarker(location) {
          ubicar(location);
          $('#lat').val(location.lat() );
          $('#lon').val(location.lng ());
          console.log(location);
          marker = new google.maps.Marker({
            position: location,
            map: map
          });
          markersArray.push(marker);
      }
      function clearOverlays() {
        if (markersArray) {
          for (i in markersArray) {
            markersArray[i].setMap(null);
          }
        }
      }
      function codeAddress() {
        var pais = $('#pais').val();
        var region = $('#region').val();
        var direc = $('#direc').val();
        var address = pais +" "+region+" "+ direc;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            addMarker(results[0].geometry.location);
            
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });
      }
      function ubicar(location){
        geocoder.geocode({'latLng': location}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              
              var todo = results[0].formatted_address;
              var part = todo.split(",");
              $('#region').val(part[1]);
              $('#direc').val(part[0]);
              $('.paices').val(part[2]);
              google.maps.event.addListener(marker, 'click', function(){
                  infowindow.setContent(results[0].formatted_address);
                  infowindow.open(map, marker);
              });
            } else {
              alert('No results found');
            }
          } else {
            alert('Geocoder failed due to: ' + status);
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCACx5jRrZBQGgjU_3QXdo5X7S5jDi0f9E&callback=initMap"
    async defer></script>
@endsection