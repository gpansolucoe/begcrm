<?php

    include_once '../endpoints/motivo.php';
    session_start();
    
    $motivo = new Motivo();

    $descricao = $_POST["motivo"];
    $idMotivo = $_POST["idMotivo"];
    $idEmpresa = $_SESSION["id_empresa"];

    $retorno = $motivo->atualizarMotivo($idMotivo, $idEmpresa, $descricao);

    if($retorno != false){
        header("Location:../coordenador/motivos.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/motivos.php?falha=true&tipo=update");
    }

?>