<?php

	/**
	 * Author: Gabriel Barban Rocha - Abril/2021
	 */
	class VotosModel
	{
		function salva_voto($voto, $titulo){
			$json = file_get_contents("../../bd/playlist.json");
			$data = json_decode($json);

			for($i=0 ; $i<count($data->musicas) ; $i++){
				$dadosMusica = split("-listenx-", $data->musicas[$i]);
				if($dadosMusica[0] == $titulo){
					$dadosMusica[6] = $voto;
					$data->musicas[$i] = implode('-listenx-', $dadosMusica);
				}
			}
			$arquivo_json_alterado = json_encode($data);
			file_put_contents('../../bd/playlist.json', $arquivo_json_alterado);
			return true;
		}
	}

?>