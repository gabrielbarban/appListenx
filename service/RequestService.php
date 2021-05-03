<?php

	/**
	 * Author: Gabriel Barban Rocha - Abril/2021
	 */
	class RequestService
	{
		function gera_jwt($payload)
		{
			$header = [
			   'alg' => 'HS256',
			   'typ' => 'JWT'
			];
			$header = json_encode($header);
			$header = base64_encode($header);

			$payload = json_encode($payload);
			$payload = base64_encode($payload);

			$signature = hash_hmac('sha256',"$header.$payload",'minha-senha',true);
			$signature = base64_encode($signature);

			return "$header.$payload.$signature";
		}

		function le_jwt($token)
		{
			require_once 'JWT.php';
			$secret = 'minha-senha';
			$decodedJWT = JWT::decode($token, $secret);
			return $decodedJWT;
		}
	}

?>