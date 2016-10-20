admin.controller('pagoController', function($scope,$http) {
	$scope.getAll = function(){
		$http.get('getEmpresa').then(function successCallback(response) {
            $scope.negocios = response.data;
            console.log($scope.negocios) 
        }, function errorCallback(response) {
        	alert('no se encontro');
        });
	}
	$scope.open = function (){
		$scope.complet = 'true';
	}
	$scope.negos = function () {
		pais = $scope.pais;
		region = $scope.region;
      	$http.get('pagoall/'+ pais + '/' + region).then(function successCallback(response) {
              $scope.negocios = response.data;
        	}, function errorCallback(response) {
          // called asynchronously if an error occurs
          // or server returns response with an error status.
        });
      }
});