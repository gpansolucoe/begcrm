<?php

    include_once '../endpoints/usuario.php';
    session_start();
    
    $usuario = new Usuario();

    $idPerfil = 4;

    echo $usuario->listarUsuariosAtivosPorEmpresaPerfil($_SESSION["id_empresa"], $idPerfil);

?>