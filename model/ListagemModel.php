<?php

	/**
	 * Author: Gabriel Barban Rocha - Abril/2021
	 */
	class ListagemModel
	{
		function pega_musicas(){
			$json = file_get_contents("../../bd/playlist.json");
			$data = json_decode($json);
			return $data;
		}
	}

?>