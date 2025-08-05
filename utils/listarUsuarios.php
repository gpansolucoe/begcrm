<?php

    include_once '../endpoints/usuario.php';
    session_start();
    
    $usuario = new Usuario();

    echo $usuario->listarUsuariosPorEmpresa($_SESSION["id_empresa"]);

?>