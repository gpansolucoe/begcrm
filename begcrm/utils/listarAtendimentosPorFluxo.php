<?php

    include_once '../endpoints/atendimento.php';
    session_start();

    $fluxoAtendimento = $_POST["fluxoAtendimento"];
    $idEmpresa = $_SESSION["id_empresa"];
    
    $atendimento = new Atendimento();

    echo $atendimento->listarAtendimentosPorFluxo($idEmpresa, $fluxoAtendimento);

?>