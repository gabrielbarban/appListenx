<?php

	include("../../model/VotosModel.php");
	include("../../service/RequestService.php");
	$votoModel = new VotosModel();
	$request = new RequestService();

	//salvo o voto
	$request_body = file_get_contents('php://input');
	$data = json_decode($request_body);
	$token = $data->token;
	$data = $request->le_jwt($token);
	$voto = $data->voto;
	$titulo = $data->titulo;
	if($votoModel->salva_voto($voto, $titulo)){
		$response = [
			'mensagem' => 'OK',
			'HttpStatusCode' => '201'
		];
		echo json_encode($request->gera_jwt($response));
	} else{
		$response = [
			'mensagem' => 'NOK',
			'HttpStatusCode' => '401'
		];
		echo json_encode($request->gera_jwt($response));
	}
	
?>s