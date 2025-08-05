<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

include_once '../endpoints/comprovantePagamento.php';
session_start();

$comprovante = new ComprovantePagamento();

$idPagamento = $_POST["id_pagamento"];

echo $comprovante->listarComprovantes($idPagamento);
