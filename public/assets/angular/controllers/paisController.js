app.controller('paicesController', function($scope,$http) {
    $scope.dtubicacion = function (){
         $http.get('getDataSession').then(function successCallback(response) {
                data = response.data;
                $scope.dataSess = data;
                $('#selpais').val($scope.dataSess['pais']);
                $('#selregion').val($scope.dataSess['region']);

            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.get = function () {
        $http.get('paices').then(function successCallback(response) {
                $scope.paices = response.data;
                $scope.openMaps();
                //$scope.rs0=true;$scope.rs1=true;$scope.rs2=true;
                //$scope.rs3=true;$scope.rs4=true;$scope.rs5=true;$scope.rs6=true;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    var geocoder;
  	var markersArray = [];
  	var markers = [];
  	var map;
  	var image;
      var yo;
      var desti;
      $scope.openMaps = function (datos){
      	var image = 'images/yo.png';
        geocoder = new google.maps.Geocoder();
      	$scope.map = new google.maps.Map(document.getElementById('map'), {
  		    center: {lat: -34.397, lng: 150.644},
  		    zoom: 16,
  		    disableDefaultUI: true
  		  });
  		  // Try HTML5 geolocation.
  		  if (navigator.geolocation) {
  		    navigator.geolocation.getCurrentPosition(function(position) {
  		      var pos = {
  		        lat: position.coords.latitude,
  		        lng: position.coords.longitude
  		      };

  		      var yow = new google.maps.Marker({
  		          map: $scope.map,
  		          position: pos,
  		          icon: image
  		        });
                $scope.yo = pos;
                yo = pos;
  		      $scope.map.setCenter(pos);
  		      $scope.geo(pos);
  		    }, function() {
            $scope.manual();
  		      //handleLocationError(true, infoWindow, map.getCenter());
  		    });
  		  } else {
  		    // Browser doesn't support Geolocation
          alert('no se localizo');
  		    handleLocationError(false, infoWindow, map.getCenter());
  		  }
      }
      $scope.mas = function (){
  		  // Setup the click event listener - zoomIn
  		  	var oldZoom =  $scope.map.getZoom();
  		    $scope.map.setZoom(oldZoom + 1);
  		     
  	}
    $scope.manual = function(){
      //alert('alert');
      var ps;
      $http.get('getDataSession').then(function successCallback(response) {
                $scope.dt = response.data;
                pais = $scope.dt.pais;
                region = $scope.dt.region;
                $scope.ubic(pais,region)
            }, function errorCallback(response) {
            
            });
    }
    $scope.ubic = function (pais,region){
        var address = pais +" "+region;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
           $scope.map.setCenter(results[0].geometry.location);
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });
        $scope.markers(pais,region);
    }
  	$scope.menos = function (){
  		  // Setup the click event listener - zoomIn
  		  	var oldZoom =  $scope.map.getZoom();
  		    $scope.map.setZoom(oldZoom - 1);
  		     
  	}
   	 $scope.markers = function (pais,region) {
        console.log('allmarker/'+ pais + '/' + region);
          $http.get('allmarker/'+ pais + '/' + region).then(function successCallback(response) {
                  $scope.markers = response.data;
                  $scope.addMaker(0)
              }, function errorCallback(response) {
              // called asynchronously if an error occurs
              // or server returns response with an error status.
              });
      }
      $scope.hospedajes = true;
      $scope.hoteles = true;
      $scope.polleria = true;

      $scope.addMaker = function (){
      	$scope.clear();
      	im='';
      	for (var s = 1; s <= 7; s++) {
      		
          for (var t = 1; t <= 7; t++) {
            ve = 'rs' + s + "-" + t;
            
            if (document.getElementById("op" + s + "-" + t) != null) {
              
              opcion = document.getElementById("op" + s + "-" + t).checked;
              if (opcion) {
                
                for (var i = 0; i < $scope.markers.length; i++) {
                  
                  ct = $scope.markers[i].categoria_id;
                  if (ct ==  s + "-" + t) {
                    console.log($scope.markers[i]);
                    nombre= $scope.markers[i];
                    longi = $scope.markers[i].longitud;
                    lati = $scope.markers[i].latitud;
                    pos = new google.maps.LatLng(lati, longi)
                        setMarker(pos,s,nombre);
                    }
              }
            }
            
          }
      		
  			}
      	}
      	console.log(markersArray);
      }
      function setMarker(position,s,all) {
      		var im='images/mrk-'+s+'.png';
              var marker;
              var markerOptions = {
                  position: position,
                  map: $scope.map,
                  icon: im
              };

              marker = new google.maps.Marker(markerOptions);
              markers.push(marker); // add marker to array
              
              google.maps.event.addListener(marker, 'click', function () {
                 $scope.addCont(all);
                 l = parseFloat(all.latitud);
                 lo = parseFloat(all.longitud);
                 $scope.destino = {lat: l, lng: lo}
                 $('#report').css('display','block');
                 $('#report').addClass('plus-report');
                 $('#report').css('with','250px');
                 $('#cont-desc').addClass('plus-cont');
              });
          }
      $scope.clear= function(){
      	if (markers) {
            for (i in markers) {
              markers[i].setMap(null);
            }
          }
      }
      $scope.geo = function (location){
      	geocoder = new google.maps.Geocoder();
          geocoder.geocode({'latLng': location}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                var todo = results[0].formatted_address;
                var pas = results[0].address_components[5].short_name;
                var part = todo.split(",");
                $('#region').val(part[1]);
                $('.paises').val(pas);
                $scope.markers(pas,part[1]);
              } else {
                alert('No results found');
              }
            } else {
              alert('Geocoder failed due to: ' + status);
            }
          });
      }
      var vistos = []
      $scope.categorias = function (){
      	for (var i = 0; i < 7; i++) {
      		if (op[i]) {

      		}
      	}
      }
      $scope.addCont = function (data){
      	$( "#cont-title" ).html(" ");
      	$( "#cont-img" ).html(" ");
      	$( "#cont-desc" ).html(" ");
      	titulo = data.empresa;
      	$( "#cont-img" ).append( "<img src='logos/empresa/"+data.logo+"' width='30' height='30' >" );
      	$( "#cont-title" ).append( "<p>"+ titulo+"</p>" );
      	$( "#cont-desc" ).append( "<p>"+ data.descripcion+"</p><p><strong>Estamos en : "+data.direccion+"</strong><br><strong>Llamanos : "+data.telefono+"</strong><br><strong>Url : <a>"+data.url+"</a></strong></p>" );
      }
      $scope.closeinfo = function(){
      	$( "#cont-title" ).html(" ");
      	$( "#cont-img" ).html(" ");
      	$( "#cont-desc" ).html(" ");
      	$('#report').removeClass('plus-report');
         	$('#report').css('with','0px');
         	$('#cont-desc').removeClass('plus-cont');	
         	$('#report').css('display','none');
      }
      // Pass the directions request to the directions service.
       
      $scope.enrutando = function(){
          var directionsDisplay = [];
          directionsDisplay = new google.maps.DirectionsRenderer({
            map: $scope.map
          });
          var request = {
            destination: $scope.destino,
            origin: yo,
            travelMode: 'WALKING'
          };
          var directionsService = new google.maps.DirectionsService();
          directionsService.route(request, function(response, status) {
            if (status == 'OK') {
              // Display the route on the map.
              directionsDisplay.setDirections(response);
            }
          });
      }
      $scope.bsq = function (){
      	$('#globo').css('display','block');
      	$('#globo2').css('display','none');
      }
      $scope.closebqd = function (){
      	$('#globo').css('display','none');
      }
      $scope.bsq2 = function (){
      	$('#globo2').css('display','block');
      	$('#globo').css('display','none');
      }
      $scope.closebqd2 = function (){
      	$('#globo2').css('display','none');
      }
      $scope.aver = function(){
      	alert('aver');
      }
});