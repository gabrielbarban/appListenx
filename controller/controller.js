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
	  var titulo = decodeURI(document.getElementById("titulo_escolhido").value);
	  var data = {
		"voto": "sim",
		"titulo": titulo
	  };
	  var token = jwt_encode(data);
      $http({
		  method: 'POST',
		  url: 'api/v1/SalvaVotos.php',
		  data: {'token': token}
		}).then(function successCallback(response) {
		    //window.location.href = "http://localhost:81/appListenx/";
		  }, function errorCallback(response) {
		    
	  });
    };

    $scope.salva_voto2 = function() {
	  var titulo = decodeURI(document.getElementById("titulo_escolhido").value);
	  var data = {
		"voto": "nao",
		"titulo": titulo
	  };
	  var token = jwt_encode(data);
      $http({
		  method: 'POST',
		  url: 'api/v1/SalvaVotos.php',
		  data: {'token': token}
		}).then(function successCallback(response) {
		    //window.location.href = "http://localhost:81/appListenx/";
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

function jwt_encode(data){

	//header
	var header = {
	  "alg": "HS256",
	  "typ": "JWT"
	};
	var stringifiedHeader = JSON.stringify(header);
	var encodedHeader = btoa(stringifiedHeader);

	// payload
	var stringifiedData = JSON.stringify(data);
	var encodedData = btoa(stringifiedData);

	// signature
	var hash_signature = CryptoJS.HmacSHA256(encodedHeader + "." + encodedData, "minha-senha");
	var signature = hash_signature.toString(CryptoJS.enc.Base64);

	var token = encodedHeader + "." + encodedData + "." + signature;
	return token;
}