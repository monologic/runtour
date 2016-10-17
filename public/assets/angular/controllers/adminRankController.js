admin.controller('adminRankController', function($scope,$http) {
	$scope.getAll = function(){
		$http.get('getEmpresa').then(function successCallback(response) {
            $scope.negocios = response.data;
            console.log($scope.negocios) 
        }, function errorCallback(response) {
        	alert('no se encontro');
        });
	}
});