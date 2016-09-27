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
});