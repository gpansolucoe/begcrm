<?php

    include_once '../endpoints/midia.php';
    session_start();
    
    $midia = new Midia();

    $idStatus = $_POST["idStatus"];
    $idMidia = $_POST["idMidia"];

    $retorno = $midia->atualizarStatus($idStatus, $idMidia);

    if($retorno != false){
        header("Location:../coordenador/midias.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/midias.php?falha=true&tipo=update");
    }

?>