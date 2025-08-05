<?php

    include_once '../endpoints/fluxoAtendimento.php';
    session_start();
    
    $fluxoAtendimento = new FluxoAtendimento();

    echo $fluxoAtendimento->listarFluxosAtendimentoPorEmpresa($_SESSION["id_empresa"]);

?>