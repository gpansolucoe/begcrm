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

$inputValorEntrada = $_POST["inputValorEntrada"];

$imagem = $_POST['img'];
$nomeArquivo = $_POST['inputNomeArquivo'];

$idStatus = $_POST['inputStatus'];;
$idEmpresa = $_SESSION["id_empresa"];
$idUsuario = $_SESSION["id_usuario"];
$idAtendimento = $_POST['inputAtendimento'];
$idPagamento = $_POST['inputPagamento'];
$observacao = $_POST['observacao'];

$confPagamentoCustas = $_POST['inputConfCustas'];

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
    header("Location:../".$parts[sizeof($parts)-2]."/dashboard.php?falha=false&tipo=update");
} else {
    header("Location:../".$parts[sizeof($parts)-2]."/dashboard.php?falha=true&tipo=update");
}

