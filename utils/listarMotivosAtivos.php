<?php

    include_once '../endpoints/motivo.php';
    session_start();
    
    $motivo = new Motivo();

    echo $motivo->listarMotivosAtivosPorEmpresa($_SESSION["id_empresa"]);

?>