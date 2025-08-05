<?php

    include_once '../endpoints/usuario.php';
    session_start();

    $idUsuario = isset($_POST["idUsuario"]) ? $_POST["idUsuario"] : $_SESSION["id_usuario"];
    
    $usuario = new Usuario();

    echo $usuario->consultarUsuarioPorId($idUsuario);

?>