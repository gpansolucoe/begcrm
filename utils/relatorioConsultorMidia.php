<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

include_once '../endpoints/atendimento.php';
session_start();

$dataInicio = $_POST["dataIni"]. " 00:00";
$dataFim = $_POST["dataFim"]." 23:59";
$idEmpresa = $_SESSION["id_empresa"];
$idMidia = $_POST["idMidia"];

$atendimento = new Atendimento();

echo $atendimento->relatorioConsultorMidia($idEmpresa, $idMidia, $dataInicio, $dataFim);
