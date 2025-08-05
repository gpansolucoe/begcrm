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


    $urlCallBack = explode('?', $_SERVER['HTTP_REFERER'], 1);

    $parts = explode('/', $urlCallBack[0]);

    if($retorno != false){
        header("Location:../".$parts[sizeof($parts)-2]."/dashboard.php?falha=false&tipo=perfil");
    }else{
        header("Location:../".$parts[sizeof($parts)-2]."/dashboard.php?falha=true&tipo=perfil");
    }

?>