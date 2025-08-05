<?php

    include_once '../endpoints/pagamento.php';
    session_start();

    $idPagamento = $_POST["idPagamento"];
    
    $pagamento = new Pagamento();
    
    echo $pagamento->consultarPagamentoPorAtendimento($idPagamento);

?>