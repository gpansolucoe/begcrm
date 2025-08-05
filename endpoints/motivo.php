<?php

include_once '../helpers/httpProvider.php';

	class Motivo{

        function consultarMotivoPorId($idMotivo){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "motivo/".$idMotivo, $_SESSION["token"]);
		}

        function listarMotivoPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "motivo/empresa/".$idEmpresa, $_SESSION["token"]);
		}

		function listarMotivosAtivosPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "motivo/empresa/".$idEmpresa."/status/1", $_SESSION["token"]);
		}

		function atualizarStatus($idStatus, $idMotivo){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => "",
							"descricao" => ""];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "motivo/".$idMotivo."/status", $_SESSION["token"]);
		}
        
        function incluirMotivo($motivo, $idEmpresa){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_empresa" => $idEmpresa,
							"id_status" => 1,
                            "descricao" => $motivo];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "motivo", $_SESSION["token"]);
		}

		function atualizarMotivo($idMotivo,$idEmpresa, $descricao){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_empresa" => $idEmpresa,
							"descricao" => $descricao];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "motivo/".$idMotivo, $_SESSION["token"]);
		}
    }

?>