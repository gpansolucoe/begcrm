<?php

    include_once '../endpoints/formaPagamento.php';
    session_start();
    
    $formaPagamento = new FormaPagamento();

    echo $formaPagamento->listarFormasPagamentoAtivosPorEmpresa($_SESSION["id_empresa"]);

?>