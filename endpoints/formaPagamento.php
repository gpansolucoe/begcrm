<?php

include_once '../helpers/httpProvider.php';

	class FormaPagamento{

		function incluirFormaPagamento($idStatus, $idEmpresa, $nome){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => $idEmpresa,
							"nome_forma_pagamento" => $nome];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "forma-pagamento", $_SESSION["token"]);
		}

		function atualizarFormaPagamento($idFormaPagamento, $idStatus, $idEmpresa, $nomeFormaPagamento){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => $idEmpresa,
							"nome_forma_pagamento" => $nomeFormaPagamento];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "forma-pagamento/".$idFormaPagamento, $_SESSION["token"]);
		}

		function atualizarStatus($idStatus, $idFormaPagamento){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_status" => $idStatus,
							"id_empresa" => "",
							"nome_forma_pagamento" => ""];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "forma-pagamento/".$idFormaPagamento."/status", $_SESSION["token"]);
		}

		function consultarFormaPagamentoPorId($idFormaPagamento){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "forma-pagamento/".$idFormaPagamento, $_SESSION["token"]);
		}

		function listarFormasPagamentoPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "forma-pagamento/empresa/".$idEmpresa, $_SESSION["token"]);
		}

		function listarFormasPagamentoAtivosPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "forma-pagamento/empresa/".$idEmpresa."/status/1", $_SESSION["token"]);
		}
		
	}

?>