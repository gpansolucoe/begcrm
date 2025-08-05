<?php

    include_once '../endpoints/formaPagamento.php';
    session_start();
    
    $formaPagamento = new FormaPagamento();

    $idStatus = $_POST["idStatus"];
    $idFormaPagamento = $_POST["idFormaPagamento"];

    $retorno = $formaPagamento->atualizarStatus($idStatus, $idFormaPagamento);

    if($retorno != false){
        header("Location:../coordenador/forma-pagamento.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/forma-pagamento.php?falha=true&tipo=update");
    }

?>