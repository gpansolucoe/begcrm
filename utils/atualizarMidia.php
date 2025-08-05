<?php

    include_once '../endpoints/midia.php';
    session_start();
    
    $midia = new Midia();

    $idMidia = $_POST["idMidia"];
    $idStatus = $_POST["idStatus"];
    $nomeMidia = $_POST["nomeAlteracao"];
    $idEmpresa = $_SESSION["id_empresa"];

    $retorno = $midia->atualizarMidia($idMidia, $idStatus, $idEmpresa, $nomeMidia);

    if($retorno != false){
        header("Location:../coordenador/midias.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/midias.php?falha=true&tipo=update");
    }

?>