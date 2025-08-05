<?php

    include_once '../endpoints/servico.php';
    session_start();
    
    $servico = new Servico();

    $idStatus = $_POST["idStatus"];
    $IdServico = $_POST["IdServico"];

    $retorno = $servico->atualizarStatus($idStatus, $IdServico);

    if($retorno != false){
        header("Location:../coordenador/servicos.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/servicos.php?falha=true&tipo=update");
    }

?>