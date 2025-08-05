<?php

    include_once '../endpoints/motivo.php';
    session_start();
    
    $motivo = new Motivo();

    $idEmpresa = $_SESSION["id_empresa"];
    $descricaoMotivo = $_POST["nome"];

    $retorno = $motivo->incluirMotivo($descricaoMotivo,$idEmpresa);

    if($retorno != false){
        header("Location:../coordenador/motivos.php?falha=false&tipo=create");
    }else{
        header("Location:../coordenador/motivos.php?falha=true&tipo=create");
    }

?>