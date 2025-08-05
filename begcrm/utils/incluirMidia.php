<?php

    include_once '../endpoints/midia.php';
    session_start();
    
    $midia = new Midia();

    $idStatus = 1;
    $idEmpresa = $_SESSION["id_empresa"];
    $nomeMidia = $_POST["nome"];

    $retorno = $midia->incluirMidia($idStatus, $idEmpresa, $nomeMidia);

    if($retorno != false){
        header("Location:../coordenador/midias.php?falha=false&tipo=create");
    }else{
        header("Location:../coordenador/midias.php?falha=true&tipo=create");
    }

?>