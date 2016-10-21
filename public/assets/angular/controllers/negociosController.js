app.controller('negociosController', function($scope,$http) {
    $scope.getn = function (){
    	pas = $('#pais-send').val();
        $http.get('negocios/'+ pas + '/' + $scope.region).then(function successCallback(response) {
            $scope.all = response.data;
            $scope.negocios = response.data;
        }, function errorCallback(response) {
        	alert('no se encontro');
        });
    }
    $scope.sendSession = function (){
      paise= $('#selpais').val();
      regione= $('#selregion').val();
      $http.post('addDataSession',
            {   'pais':paise,
                'region':regione
            }).then(function successCallback(response) {
                $scope.dtubicacion();
                $scope.moverS();
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
    }
    $scope.getPag = function (pais,region) {
        $http.get('pagoall/'+ pais + '/' + region).then(function successCallback(response) {
              $scope.nj = response.data;
          }, function errorCallback(response) {
          // called asynchronously if an error occurs
          // or server returns response with an error status.
        });
    }
    $scope.getRank = function (){
      $http.get('homeRank').then(function successCallback(response) {
            $scope.hRanking = response.data;
        }, function errorCallback(response) {
          alert('no se encontro');
        });
    }
    $scope.moverS = function (){
      $('html, body').animate({
          scrollTop: $("#first").offset().top
      }, 2000);
    }
    $scope.openr = function (){
      $('#p-section').addClass('active-r');
    }
    $scope.pasar = function (num){
      if (num == 1) {
        $('#p-section').removeClass('active-r');
        $('#s-section').addClass('active-r');
      }
      if (num == 2) {
        $('#s-section').removeClass('active-r');
        $('#t-section').addClass('active-r');
      }
      
    }
    $scope.hospedajes = true;
    $scope.hoteles = true;
   
    $scope.construc = function (){
    	 m = new Array();
    	 c = 0;
    	 $scope.negocios = "";
    	 var negocios = new Array();
    	for (var i = 1; i < 9; i++) {
    		for (var j = 1; j < 9; j++) {
    			if ( $('#' + i + '-' + j).prop('checked')) {
    				id = i + "-" + j;
    				for (var k = 0; k < $scope.all.length; k++) {
    					if (id == $scope.all[k].categoria_id) {
    						negocios.push($scope.all[k]);
    					}
    				}
    			}
    		}
    	}
    	$scope.negocios=negocios;
    }
    $scope.dtubicacion = function (){
         $http.get('getDataSession').then(function successCallback(response) {
                data = response.data;
                $scope.dataSess = data;
                $scope.openDat = $scope.dataSess['region'];
                $('#selpais').val($scope.dataSess['pais']);
                $('#selregion').val($scope.dataSess['region']);
                $scope.getRank();
                $scope.getPag($scope.dataSess['pais'],$scope.dataSess['region']);
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.alojamiento = [
      {name:'Hospedaje', value:'1-1'},
      {name:'Hotel', value:'1-2'},
      {name:'Albergues', value:'1-3'},
    ];
    $scope.turismo = [
      {name:'Parque', value:'2-1'},
      {name:'Museo', value:'2-2'},
    ];
    $scope.entretenimiento = [
      {name:'Bar - Puvs', value:'3-1'},
      {name:'Cine', value:'3-2'},
      {name:'Discoteca', value:'3-3'},
      {name:'Karaoke', value:'3-4'},
      {name:'Teatro', value:'3-5'},
    ];
    $scope.entidades = [
      {name:'Banco', value:'4-1'},
      {name:'Caja', value:'4-2'},
      {name:'Cooperativa', value:'1-3'},
    ];
    $scope.restaurante = [
      {name:'Parrilla', value:'5-1'},
      {name:'Pitzeria', value:'4-2'},
      {name:'Polleria', value:'5-3'},
      {name:'Restaurante', value:'5-4'},
      {name:'Snack', value:'5-5'},
    ];
    $scope.tienda = [
      {name:'Artefactos', value:'6-1'},
      {name:'Calzado', value:'6-2'},
      {name:'Informática', value:'6-3'},
      {name:'Lenceria', value:'6-4'},
      {name:'Ropa', value:'6-5'},
    ];
    $scope.tras = [
      {name:'interno', value:'7-1'},
      {name:'externo', value:'7-2'},
    ];
    $scope.desplegar = function (x){
        opt = $('#opcat').val();
        if (opt == 1) {
            $scope.listc =  $scope.alojamiento;
        }
        if (opt == 2) {
            $scope.listc =  $scope.turismo;
        }
        if (opt == 3) {
            $scope.listc =  $scope.entretenimiento;
        }
        if (opt == 4) {
            $scope.listc =  $scope.entidades;
        }
        if (opt == 5) {
            $scope.listc =  $scope.restaurante;
        }
        if (opt == 6) {
            $scope.listc =  $scope.tienda;
        }
        if (opt == 7) {
            $scope.listc =  $scope.tras;
        }
    }
});