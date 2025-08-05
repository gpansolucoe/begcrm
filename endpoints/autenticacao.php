<?php

include_once('../helpers/httpProvider.php');

	class Autenticacao{

		function login($email, $senha){
			$httpProvider = new HttpProvider();
			$requestBody = 	[
								'email' => $email,
								'senha' => $senha
							];

			return $httpProvider->requestHttpWithOutToken("POST", $requestBody, "autenticacao/login");
		}

		function atualizarStatus($idStatus, $idUsuario){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_usuario" => $idUsuario,
							"id_status" => $idStatus,
							"id_perfil" => "",
							"id_empresa" => "",
							"id_perfil" => "",
							"email" => "",
							"senha" => ""];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "autenticacao/usuario/".$idUsuario, $_SESSION["token"]);
		}

		
		
	}

?>