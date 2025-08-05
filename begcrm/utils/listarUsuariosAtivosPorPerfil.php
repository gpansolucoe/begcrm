<?php

    include_once '../endpoints/usuario.php';
    session_start();
    
    $usuario = new Usuario();

    $idPerfil = $_POST["idPerfil"];

    echo $usuario->listarUsuariosAtivosPorEmpresaPerfil($_SESSION["id_empresa"], $idPerfil);

?>