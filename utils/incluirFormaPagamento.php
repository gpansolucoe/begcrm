<?php

    include_once '../endpoints/formaPagamento.php';
    session_start();
    
    $formaPagamento = new FormaPagamento();

    $idStatus = 1;
    $idEmpresa = $_SESSION["id_empresa"];
    $nomeFormaPagamento = $_POST["nome"];

    $retorno = $formaPagamento->incluirFormaPagamento($idStatus, $idEmpresa, $nomeFormaPagamento);

    if($retorno != false){
        header("Location:../coordenador/forma-pagamento.php?falha=false&tipo=create");
    }else{
        header("Location:../coordenador/forma-pagamento.php?falha=true&tipo=create");
    }

?>