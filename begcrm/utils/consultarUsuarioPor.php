<?php

    include_once '../endpoints/usuario.php';
    session_start();

    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];
    
    $usuario = new Usuario();

    echo $usuario->procurarUsuarioPor($tipo, $valor, $_SESSION["id_empresa"]);

?>