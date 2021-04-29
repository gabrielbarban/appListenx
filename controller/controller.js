var listaController = angular.module('listaControllerApp', []);
 
listaController.controller('ListaControllerCtrl', ['$scope','$http', function($scope,$http) {

    $http({
		  method: 'GET',
		  url: 'api/v1/Listagem.php'
		}).then(function successCallback(response) {
		    $scope.itens = response.data;
		  }, function errorCallback(response) {
		    
	});
 
}]);
