<?php

    include_once '../endpoints/servico.php';
    session_start();
    
    $servico = new Servico();

    echo $servico->listarServicosAtivosPorEmpresa($_SESSION["id_empresa"]);

?>