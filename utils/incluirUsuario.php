<?php

    include_once '../endpoints/usuario.php';
    session_start();
    
    $usuario = new Usuario();

    $idStatus = 1;
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $perfil = $_POST["perfil"];
    $senha = $_POST["senha"];
    $idEmpresa = $_SESSION["id_empresa"];

    $retorno = $usuario->incluirUsuario($nome, $email, $telefone, $perfil, $senha, $idEmpresa, $idStatus);

    if($retorno != false){
        header("Location:../coordenador/usuarios.php?falha=false&tipo=create");
    }else{
        header("Location:../coordenador/usuarios.php?falha=true&tipo=create");
    }

?>