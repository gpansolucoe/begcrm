<?php

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    
    include_once '../endpoints/atendimento.php';
    session_start();

    $midia = implode(",", $_POST["midia"]);
    $servico = implode(",", $_POST["servico"]);
    $formaPagamento = implode(",", $_POST["formaPagamento"]);
    $fluxoAtendimento = implode(",", $_POST["fluxoAtendimento"]);
    $consultor = implode(",", $_POST["consultor"]);
    $dataInicio = $_POST["dataIni"]. " 00:00";
    $dataFim = $_POST["dataFim"]." 23:59";
    $idEmpresa = $_SESSION["id_empresa"];
    
    $atendimento = new Atendimento();

    echo $atendimento->listarAtendimentosEntreOsDias($idEmpresa, $midia, $servico, $formaPagamento, $fluxoAtendimento, $consultor, $dataInicio, $dataFim);

?>