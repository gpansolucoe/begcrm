<?php

include_once '../helpers/httpProvider.php';

	class Observacao{
		function listarObservacaoPorIdAtendimento($idAtendimento){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "observacao/atendimento/".$idAtendimento, $_SESSION["token"]);
		}	
	}

?>