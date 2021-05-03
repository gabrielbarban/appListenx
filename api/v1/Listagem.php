<?php
	include("../../model/ListagemModel.php");
	include("../../service/RequestService.php");
	$listagem = new ListagemModel();
	$request = new RequestService();
	$data = $listagem->pega_musicas();
	$retorno = array();

	$i=0;
	foreach ($data->musicas as $d){
		$dadosMusica = split("-listenx-", $d);
		$dados["titulo"] = $dadosMusica[0];
		$dados["artista"] = $dadosMusica[1];
		$dados["energia"] = $dadosMusica[2];
		$dados["idioma"] = $dadosMusica[3];
		$dados["voz"] = $dadosMusica[4];
		$dados["link"] = $dadosMusica[5];

		if($dadosMusica[6] == "sim"){
			$dados["voto1"] = "assets/img/likeON.png";
			$dados["voto2"] = "assets/img/deslikeOFF.png";
		} else if($dadosMusica[6] == "nao"){
			$dados["voto1"] = "assets/img/likeOFF.png";
			$dados["voto2"] = "assets/img/deslikeON.png";
		}

		$retorno[$i] = $dados;
		$i++;
	}
	$data_request = $request->gera_jwt($retorno);
	echo json_encode($data_request);
?>