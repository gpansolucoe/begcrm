<?php

include_once '../endpoints/pagamento.php';
session_start();

$pagamento = new Pagamento();

$inputNumeroInterno = $_POST["inputNumeroInterno"];
$inputDataPagamento = $_POST["inputDataPagamento"];
$inputDataPasta = $_POST["inputDataPasta"];
$inputCartao = $_POST["inputCartao"];
$inputCusto = $_POST["inputCusto"];
$inputLiquido = $_POST["inputLiquido"];
$inputFormaPagamento = $_POST["inputFormaPagamento"];
$inputAutenticacao = $_POST["inputAutenticacao"];
$inputReferencia = $_POST["inputReferencia"];
$inputLiberarPasta = $_POST["inputLiberarPasta"];
$inputDinheiro = $_POST["inputDinheiro"];
$inputMotoboy = $_POST["inputMotoboy"];

isset($_POST['checkEspecie']) ? $checkEspecie = "1" : $checkEspecie = "0";
isset($_POST['checkCredito']) ? $checkCredito = "1" : $checkCredito = "0";
isset($_POST['checkDebito']) ? $checkDebito = "1" : $checkDebito = "0";
isset($_POST['checkBoleto']) ? $checkBoleto = "1" : $checkBoleto = "0";
isset($_POST['checkTransferencia']) ? $checkTransferencia = "1" : $checkTransferencia = "0";
isset($_POST['checkDeposito']) ? $checkDeposito = "1" : $checkDeposito = "0";
isset($_POST['checkPix']) ? $checkPix = "1" : $checkPix = "0";

$inputValorEntrada = $_POST["inputValorEntrada"];

$imagem = $_POST['img'];
$nomeArquivo = $_POST['inputNomeArquivo'];

$idStatus = $_POST['inputStatus'];
$idEmpresa = $_SESSION["id_empresa"];
$idUsuario = $_SESSION["id_usuario"];
$idAtendimento = $_POST['inputAtendimento'];
$idPagamento = $_POST['inputPagamento'];
$confPagamentoCustas = $_POST['inputConfCustas'];

$observacao = $_POST['observacao'];

$retorno = $pagamento->atualizarPagamento(
    $idPagamento,
    $idAtendimento,
    $inputValorEntrada,
    $inputFormaPagamento,
    $idStatus,
    $inputDinheiro,
    $inputCartao,
    $inputMotoboy,
    $inputAutenticacao,
    $inputEstado,
    $imagem,
    $nomeArquivo,
    $idUsuario,
    $inputNumeroInterno,
    $inputDataPagamento,
    $inputDataPasta,
    $inputCusto,
    $inputLiquido,
    $inputReferencia,
    $inputLiberarPasta,
    $confPagamentoCustas,
    $observacao,
    $checkEspecie,
    $checkCredito,
    $checkDebito,
    $checkBoleto,
    $checkTransferencia,
    $checkDeposito,
    $checkPix

);

$urlCallBack = explode('?', $_SERVER['HTTP_REFERER'], 1);

$parts = explode('/', $urlCallBack[0]);


if ($retorno != false) {
    header("Location:../" . $parts[sizeof($parts) - 2] . "/dashboard.php?falha=false&tipo=update");
} else {
    header("Location:../" . $parts[sizeof($parts) - 2] . "/dashboard.php?falha=true&tipo=update");
}
