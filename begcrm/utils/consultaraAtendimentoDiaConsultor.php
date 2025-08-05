<?php

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    
    include_once '../endpoints/atendimento.php';
    session_start();

    $dataInicio = date("d-m-Y")." 00:00";
    $dataFim = date("d-m-Y")." 00:00";
    $idConsultor = $_POST["idConsultor"];
    
    $atendimento = new Atendimento();

    echo $atendimento->listarAtendimentosConsultorEntreOsDias($idConsultor, $dataInicio, $dataFim);

?>