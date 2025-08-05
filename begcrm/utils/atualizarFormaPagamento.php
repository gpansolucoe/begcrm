<?php

    include_once '../endpoints/formaPagamento.php';
    session_start();
    
    $formaPagamento = new FormaPagamento();

    $idFormaPagamento = $_POST["idFormaPagamento"];
    $idStatus = $_POST["idStatus"];
    $nomeFormaPagamento = $_POST["nomeAlteracao"];
    $idEmpresa = $_SESSION["id_empresa"];

    $retorno = $formaPagamento->atualizarFormaPagamento($idFormaPagamento, $idStatus, $idEmpresa, $nomeFormaPagamento);

    if($retorno != false){
        header("Location:../coordenador/forma-pagamento.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/forma-pagamento.php?falha=true&tipo=update");
    }

?>