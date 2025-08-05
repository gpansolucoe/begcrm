<?php

    include_once '../endpoints/servico.php';
    session_start();
    
    $servico = new Servico();

    echo $servico->listarServicosPorEmpresa($_SESSION["id_empresa"]);

?>