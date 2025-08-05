<?php

    include_once '../endpoints/servico.php';
    session_start();

    $idServico = $_POST["idServico"];
    
    $servico = new Servico();

    echo $servico->consultarServicoPorId($idServico);

?>