<?php

include_once '../helpers/httpProvider.php';

class ComprovantePagamento
{

    function listarComprovantes($idPagamento){
        $httpProvider = new HttpProvider();
        return $httpProvider->requestHttpWithToken("GET", null, "comprovante-pagamento/pagamento/".$idPagamento, $_SESSION["token"]);
    }
    
}
