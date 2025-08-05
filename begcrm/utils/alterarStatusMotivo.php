<?php

    include_once '../endpoints/motivo.php';
    session_start();
    
    $motivo = new Motivo();

    $idStatus = $_POST["idStatus"];
    $idMotivo = $_POST["idMotivo"];

    $retorno = $motivo->atualizarStatus($idStatus, $idMotivo);

    if($retorno != false){
        header("Location:../coordenador/midias.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/midias.php?falha=true&tipo=update");
    }

?>