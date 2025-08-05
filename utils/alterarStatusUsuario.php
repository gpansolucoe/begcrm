<?php

    include_once '../endpoints/autenticacao.php';
    session_start();
    
    $autenticacao = new Autenticacao();

    $idStatus = $_POST["idStatus"];
    $idUsuario = $_POST["idUsuario"];

    $retorno = $autenticacao->atualizarStatus($idStatus, $idUsuario);

    if($retorno != false){
        header("Location:../coordenador/usuarios.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/usuarios.php?falha=true&tipo=update");
    }

?>