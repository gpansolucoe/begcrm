<?php

    include_once '../endpoints/servico.php';
    session_start();
    
    $servico = new Servico();

    $idStatus = 1;
    $idEmpresa = $_SESSION["id_empresa"];
    $nomeServico = $_POST["nome"];

    $retorno = $servico->incluirServico($idStatus, $idEmpresa, $nomeServico);

    if($retorno != false){
        header("Location:../coordenador/servicos.php?falha=false&tipo=create");
    }else{
        header("Location:../coordenador/servicos.php?falha=true&tipo=create");
    }

?>