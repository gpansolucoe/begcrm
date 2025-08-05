<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

include_once '../endpoints/atendimento.php';
session_start();

$atendimento = new Atendimento();

$dataInicio = $today = date('d-m-Y'). " 00:00";
$dataFim = $today = date('d-m-Y'). " 23:59";
$idEmpresa = $_SESSION["id_empresa"];

echo $atendimento->listarAtendimentosFechadoFluxoAtendimentoSemComprovante(2, $idEmpresa, $dataInicio, $dataFim);
