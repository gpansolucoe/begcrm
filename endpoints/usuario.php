<?php

include_once '../helpers/httpProvider.php';

	class Usuario{

		function consultarUsuarioPorId($idUsuario){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "usuario/".$idUsuario, $_SESSION["token"]);
		}

		function incluirUsuario($nome, $email, $telefone, $perfil, $senha, $idEmpresa, $idStatus){
			$httpProvider = new HttpProvider();
			$requestBody = ["nome" => $nome,
							"email" => $email,
							"telefone" => $telefone,
							"senha" => $senha,
							"id_perfil" => $perfil,
							"id_empresa" => $idEmpresa,
							"id_status" => $idStatus];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "usuario", $_SESSION["token"]);
		}

		function atualizarUsuario($nome, $email, $telefone, $perfil, $senha, $idEmpresa, $idStatus, $idUsuario){
			$httpProvider = new HttpProvider();
			$requestBody = ["nome" => $nome,
							"email" => $email,
							"telefone" => $telefone,
							"senha" => $senha,
							"id_perfil" => $perfil,
							"id_empresa" => $idEmpresa,
							"id_status" => $idStatus];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "usuario/".$idUsuario, $_SESSION["token"]);
		}

		function listarUsuariosPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "usuario/empresa/".$idEmpresa, $_SESSION["token"]);
		}

		function listarUsuariosPorEmpresaPerfil($idEmpresa, $idPerfil){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "usuario/empresa/".$idEmpresa."/perfil/".$idPerfil, $_SESSION["token"]);
		}

		function listarUsuariosAtivosPorEmpresaPerfil($idEmpresa, $idPerfil){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "usuario/empresa/".$idEmpresa."/perfil/".$idPerfil."/status/1", $_SESSION["token"]);
		}

		

		function procurarUsuarioPor($tipo, $valor, $idEmpresa){
			$httpProvider = new HttpProvider();
			switch($tipo){
				case "1":
					return $httpProvider->requestHttpWithToken("GET", null, "usuario/empresa/". $idEmpresa ."/search/nome/".$valor, $_SESSION["token"]);
				break;
				case "2":
					return $httpProvider->requestHttpWithToken("GET", null, "usuario/empresa/". $idEmpresa ."/search/email/".$valor, $_SESSION["token"]);
				break;
			}
		}
		
	}

?>