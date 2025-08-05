<?php

include_once '../helpers/httpProvider.php';

	class Midia{

		function consultarMidiaPorId($idMidia){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "midia/".$idMidia, $_SESSION["token"]);
		}

		function incluirMidia($idStatus, $idEmpresa, $nomeMidia){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => $idEmpresa,
							"nome_midia" => $nomeMidia];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "midia", $_SESSION["token"]);
		}

		function atualizarMidia($idMidia, $idStatus, $idEmpresa, $nomeMidia){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => $idEmpresa,
							"nome_midia" => $nomeMidia];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "midia/".$idMidia, $_SESSION["token"]);
		}

		function atualizarStatus($idStatus, $idMidia){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => "",
							"nome_midia" => ""];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "midia/".$idMidia."/status", $_SESSION["token"]);
		}

		function listarMidiasPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "midia/empresa/".$idEmpresa, $_SESSION["token"]);
		}

		function listarMidiasAtivasPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "midia/empresa/".$idEmpresa."/status/1", $_SESSION["token"]);
		}

	}
?>
