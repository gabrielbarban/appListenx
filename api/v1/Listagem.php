<?php
	include("../../model/ListagemModel.php");
	$listagem = new ListagemModel();
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
		$dados["voto"] = $dadosMusica[6];
		$retorno[$i] = $dados;
		$i++;
	}
	echo json_encode($retorno);
?>