<?php

include_once '../helpers/httpProvider.php';

	class Servico{

		function incluirServico($idStatus, $idEmpresa, $nomeServico){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => $idEmpresa,
							"nome_servico" => $nomeServico];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "servico", $_SESSION["token"]);
		}

		function atualizarServico($idServico, $idStatus, $idEmpresa, $nomeServico){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => $idEmpresa,
							"nome_servico" => $nomeServico];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "servico/".$idServico, $_SESSION["token"]);
		}

		function atualizarStatus($idStatus, $idServico){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => "",
							"nome_servico" => ""];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "servico/".$idServico."/status", $_SESSION["token"]);
		}

		function consultarServicoPorId($idServico){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "servico/".$idServico, $_SESSION["token"]);
		}	

		function listarServicosPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "servico/empresa/".$idEmpresa, $_SESSION["token"]);
		}

		function listarServicosAtivosPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "servico/empresa/".$idEmpresa."/status/1", $_SESSION["token"]);
		}
	}

?>