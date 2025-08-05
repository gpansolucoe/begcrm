<?php

    include_once '../endpoints/servico.php';
    session_start();
    
    $servico = new Servico();

    $idServico = $_POST["idServico"];
    $idStatus = $_POST["idStatus"];
    $nomeServico = $_POST["nomeAlteracao"];
    $idEmpresa = $_SESSION["id_empresa"];

    $retorno = $servico->atualizarServico($idServico, $idStatus, $idEmpresa, $nomeServico);

    if($retorno != false){
        header("Location:../coordenador/servicos.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/servicos.php?falha=true&tipo=update");
    }

?>