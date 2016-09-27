@extends('welcome')

@section('title', 'Registrate')

@section('content')
  <h3 class="text-center titulo">Registro</h3>
  <section class="row cart">
    <form class="frm" role="form" method="POST" action="{{ url('/addempresa') }}" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-6">
          <div class="row">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombres y Apellidos</label>
                <input type="text" class="form-control" id="nombres" placeholder="" name="nombre">
              </div>
              <div class="form-group">
                <label for="empresa">Nombre del negocio</label>
                <input type="text" class="form-control" id="empresa" placeholder="" name="empresa">
              </div>
              <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id="" class="form-control" style="padding:2px" name="categoria_id">
                  <option value="0">Turismo</option>
                  <option value="1">Restaurat</option>
                  <option value="2">Hotel</option>
                  <option value="3">Museo</option>
                  <option value="4">Parque</option>
                  <option value="5">Banco</option>
                  <option value="6">Ropa</option>
                  <option value="7">Tiendas</option>
                </select>
              </div>
              <div class="form-group">
                <label for="url">Url o dominio</label>
                <input type="text" class="form-control" id="url" placeholder="" name="url">
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" placeholder="" name="telefono">
              </div>
              <div class="form-group">
                <label for="correo">Email</label>
                <input type="email" class="form-control" id="correo" placeholder="" name="correo">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="" cols="30" rows="7" class="form-control"></textarea>
              </div>
          </div>
    </div>
    <div class="col-md-6" style="margin-top:19px">
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
    </div>
      <div class="col-xs-12">
        <input type="submit" class="btn btn-app oo" value="Registrar">
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
      function initialize() {
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