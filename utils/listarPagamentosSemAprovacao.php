<?php

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    
    include_once '../endpoints/pagamento.php';
    session_start();

    $dataInicio = str_replace("/","-",$_POST["dataIni"]) . " 00:00";
    $dataFim = str_replace("/","-",$_POST["dataFim"])." 23:59";
    $idEmpresa = $_SESSION["id_empresa"];
    
    $pagamento = new Pagamento();

    echo $pagamento->listarPagamentosSemAprovacao($idEmpresa, $dataInicio, $dataFim);

?>