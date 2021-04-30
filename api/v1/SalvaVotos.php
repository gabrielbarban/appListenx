<?php

	include("../../model/VotosModel.php");
	$votoModel = new VotosModel();

	//salvo o voto
	$request_body = file_get_contents('php://input');
	$data = json_decode($request_body);
	$voto = $data->voto;
	$titulo = $data->titulo;
	$votoModel->salva_voto($voto, $titulo);
	
?>s