<?php

    include_once '../endpoints/motivo.php';
    session_start();
    
    $motivo = new Motivo();

    echo $motivo->listarMotivoPorEmpresa($_SESSION["id_empresa"]);

?>