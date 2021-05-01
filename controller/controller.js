var listaController = angular.module('listaControllerApp', []);
 
listaController.controller('ListaControllerCtrl', ['$scope','$http', function($scope,$http) {

    $http({
		  method: 'GET',
		  url: 'api/v1/Listagem.php'
		}).then(function successCallback(response) {
			response.data = jwt_decode(response.data);
		    $scope.itens = response.data;

		  }, function errorCallback(response) {
		    
	});

	$scope.salva_voto1 = function() {
	  var titulo = document.getElementById("titulo_escolhido").value;
      $http({
		  method: 'POST',
		  url: 'api/v1/SalvaVotos.php',
		  data: {'voto': 'sim', 'titulo': titulo}
		}).then(function successCallback(response) {
		    window.location.href = "http://localhost:81/appListenx/";
		  }, function errorCallback(response) {
		    
	  });
    };

    $scope.salva_voto2 = function() {
	  var titulo = document.getElementById("titulo_escolhido").value;
      $http({
		  method: 'POST',
		  url: 'api/v1/SalvaVotos.php',
		  data: {'voto': 'nao', 'titulo': titulo}
		}).then(function successCallback(response) {
		    window.location.href = "http://localhost:81/appListenx/";
		  }, function errorCallback(response) {
		    
	  });
    };
 
}]);

function jwt_decode(token){
	var base64Url = token.split('.')[1];
	var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
	var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
	    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
	}).join(''));

	return JSON.parse(jsonPayload);
}