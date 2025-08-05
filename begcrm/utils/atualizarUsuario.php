<?php

    include_once '../endpoints/usuario.php';
    session_start();
    
    $usuario = new Usuario();

    $nome = $_POST["nomeEditar"];
    $email = $_POST["emailEditar"];
    $telefone = $_POST["telefoneEditar"];
    $perfil = $_POST["perfilEditar"];
    $senha = $_POST["senhaEditar"];
    $idUsuario = $_POST["idUsuario"];
    $idStatus = $_POST["idStatus"];
    $idEmpresa = $_SESSION["id_empresa"];

    $retorno = $usuario->atualizarUsuario($nome, $email, $telefone, $perfil, $senha, $idEmpresa, $idStatus, $idUsuario);

    if($retorno != false){
        header("Location:../coordenador/usuarios.php?falha=false&tipo=update");
    }else{
        header("Location:../coordenador/usuarios.php?falha=true&tipo=update");
    }

?>