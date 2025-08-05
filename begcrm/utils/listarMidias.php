<?php

    include_once '../endpoints/midia.php';
    session_start();
    
    $midia = new Midia();

    echo $midia->listarMidiasPorEmpresa($_SESSION["id_empresa"]);

?>