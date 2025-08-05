<?php

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    
    include_once '../endpoints/atendimento.php';
    session_start();

    $fluxoAtendimento = implode(",", $_POST["fluxoAtendimento"]);
    $dataInicio = $_POST["dataIni"]. " 00:00";
    $dataFim = $_POST["dataFim"]." 23:59";
    $idEmpresa = $_SESSION["id_empresa"];

    $consultor =  $_SESSION["id_usuario"];
    
    $atendimento = new Atendimento();

    echo $atendimento->listarAtendimentoConsultorEntreOsDias($idEmpresa, $fluxoAtendimento, $consultor, $dataInicio, $dataFim);

?>