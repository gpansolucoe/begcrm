<?php

    include_once '../endpoints/formaPagamento.php';
    session_start();

    $idFormaPagamento = $_POST["idFormaPagamento"];
    
    $formaPagamento = new FormaPagamento();

    echo $formaPagamento->consultarFormaPagamentoPorId($idFormaPagamento);

?>