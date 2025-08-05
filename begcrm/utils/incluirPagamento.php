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

$checkEspecie = isset($_POST['checkEspecie']) ? "1" :  "0";
$checkCredito = isset($_POST['checkCredito']) ? "1" :  "0";
$checkDebito = isset($_POST['checkDebito']) ? "1" :  "0";
$checkBoleto = isset($_POST['checkBoleto']) ? "1" :  "0";
$checkTransferencia = isset($_POST['checkTransferencia']) ? "1" :  "0";
$checkDeposito = isset($_POST['checkDeposito']) ? "1" :  "0";
$checkPix = isset($_POST['checkPix']) ? "1" :  "0";


$inputValorEntrada = $_POST["inputValorEntrada"];

$imagem = $_POST['img'];
$nomeArquivo = $_POST['inputNomeArquivo'];

$idStatus = 1;
$idEmpresa = $_SESSION["id_empresa"];
$idUsuario = $_SESSION["id_usuario"];
$idAtendimento = $_POST['inputAtendimento'];

$observacao = $_POST['observacao'];

$retorno = $pagamento->incluirPagamento(
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
    header("Location:../" . $parts[sizeof($parts) - 2] . "/dashboard.php?falha=false&tipo=create");
} else {
    header("Location:../" . $parts[sizeof($parts) - 2] . "/dashboard.php?falha=true&tipo=create");
}
