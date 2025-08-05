<?php

include_once '../helpers/httpProvider.php';

	class Perfil{
		function listarPerfis(){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "perfil", $_SESSION["token"]);
		}	
	}

?>