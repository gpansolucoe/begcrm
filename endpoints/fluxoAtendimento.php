<?php

include_once '../helpers/httpProvider.php';

	class FluxoAtendimento{

		function listarFluxosAtendimentoPorEmpresa($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "fluxo-atendimento/empresa/".$idEmpresa, $_SESSION["token"]);
		}
		
	}

?>