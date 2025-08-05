<?php

include_once '../helpers/httpProvider.php';

class Pagamento
{

    function incluirPagamento(
        $idAtendimento,
        $valorEntrada,
        $formaPagamento,
        $status,
        $dinheiro,
        $cartao,
        $motoboy,
        $autenticacao,
        $estado,
        $imagem,
        $nomeArquivo,
        $idUsuario,
        $numeroInterno,
        $dataPagamento,
        $dataPasta,
        $custo,
        $liquido,
        $referencia,
        $liberarPasta,
        $observacao,
        $checkEspecie,
        $checkCredito,
        $checkDebito,
        $checkBoleto,
        $checkTransferencia,
        $checkDeposito,
        $checkPix
    ) {


        $httpProvider = new HttpProvider();
        $requestBody = [
            "id_pagamento" => "",
            "atendimento" => $idAtendimento,
            "valor_entrada" => $valorEntrada,
            "forma_pagamento" => $formaPagamento,
            "status_pagamento" => $status,
            "dinheiro" => $dinheiro,
            "cartao" => $cartao,
            "motoboy" => $motoboy,
            "autenticacao" => $autenticacao,
            "estado" => "",
            "imagem" => $imagem,
            "nome_arquivo" => $nomeArquivo,
            "usuario_inclusao" => $idUsuario,
            "numero_interno" => $numeroInterno,
            "data_pagamento" => $dataPagamento,
            "data_pasta" => $dataPasta,
            "custo" => $custo,
            "liquido" => $liquido,
            "referencia" => $referencia,
            "liberar_pasta" => $liberarPasta,
            "confirmacao_pagamento_custas" => "",
            "observacao" => $observacao,
            "check_especie" => $checkEspecie,
            "check_credito" => $checkCredito,
            "check_debito" => $checkDebito,
            "check_boleto" => $checkBoleto,
            "check_transferencia" => $checkTransferencia,
            "check_deposito" => $checkDeposito,
            "check_pix" => $checkPix

        ];

        return $httpProvider->requestHttpWithToken("POST", $requestBody, "pagamento", $_SESSION["token"]);
    }

    function atualizarPagamento(
        $idPagamento,
        $idAtendimento,
        $valorEntrada,
        $formaPagamento,
        $status,
        $dinheiro,
        $cartao,
        $motoboy,
        $autenticacao,
        $estado,
        $imagem,
        $nomeArquivo,
        $idUsuario,
        $numeroInterno,
        $dataPagamento,
        $dataPasta,
        $custo,
        $liquido,
        $referencia,
        $liberarPasta,
        $confPagamentoCustas,
        $observacao,
        $checkEspecie,
        $checkCredito,
        $checkDebito,
        $checkBoleto,
        $checkTransferencia,
        $checkDeposito,
        $checkPix
    ) {
        $httpProvider = new HttpProvider();
        $requestBody = [
            "id_pagamento" => $idPagamento,
            "atendimento" => $idAtendimento,
            "valor_entrada" => $valorEntrada,
            "forma_pagamento" => $formaPagamento,
            "status_pagamento" => $status,
            "dinheiro" => $dinheiro,
            "cartao" => $cartao,
            "motoboy" => $motoboy,
            "autenticacao" => $autenticacao,
            "estado" => "",
            "imagem" => $imagem,
            "nome_arquivo" => $nomeArquivo,
            "usuario_inclusao" => $idUsuario,
            "numero_interno" => $numeroInterno,
            "data_pagamento" => $dataPagamento,
            "data_pasta" => $dataPasta,
            "custo" => $custo,
            "liquido" => $liquido,
            "referencia" => $referencia,
            "liberar_pasta" => $liberarPasta,
            "confirmacao_pagamento_custas" => $confPagamentoCustas,
            "observacao" => $observacao,
            "check_especie" => $checkEspecie,
            "check_credito" => $checkCredito,
            "check_debito" => $checkDebito,
            "check_boleto" => $checkBoleto,
            "check_transferencia" => $checkTransferencia,
            "check_deposito" => $checkDeposito,
            "check_pix" => $checkPix

        ];

        return $httpProvider->requestHttpWithToken("PUT", $requestBody, "pagamento/" . $idPagamento, $_SESSION["token"]);
    }

    function listarPagamentosSemAprovacao($idEmpresa, $dataInicio, $dataFim)
    {
        $httpProvider = new HttpProvider();
        return $httpProvider->requestHttpWithToken("GET", null, "pagamento/aprovacao/pendente/empresa/" . $idEmpresa . "/inicio/" . $dataInicio . "/fim/" . $dataFim, $_SESSION["token"]);
    }

    function listarPagamentosPendenteRevisao($idEmpresa, $dataInicio, $dataFim)
    {
        $httpProvider = new HttpProvider();
        return $httpProvider->requestHttpWithToken("GET", null, "pagamento/aprovacao/revisao/empresa/" . $idEmpresa . "/inicio/" . $dataInicio . "/fim/" . $dataFim, $_SESSION["token"]);
    }

    function listarTodosPagamentosSemAprovacao($idEmpresa)
    {
        $httpProvider = new HttpProvider();
        return $httpProvider->requestHttpWithToken("GET", null, "pagamento/aprovacao/pendente/empresa/" . $idEmpresa, $_SESSION["token"]);
    }

    function listarTodosPagamentosAprovados($idEmpresa, $dataInicio, $dataFim)
    {
        $httpProvider = new HttpProvider();
        return $httpProvider->requestHttpWithToken("GET", null, "pagamento/aprovacao/aprovado/empresa/" . $idEmpresa . "/inicio/" . $dataInicio . "/fim/" . $dataFim, $_SESSION["token"]);
    }

    function listarRelatorioPagamentosAprovados($idEmpresa, $dataInicio, $dataFim)
    {
        $httpProvider = new HttpProvider();
        return $httpProvider->requestHttpWithToken("GET", null, "pagamento/relatorio/aprovado/empresa/" . $idEmpresa . "/inicio/" . $dataInicio . "/fim/" . $dataFim, $_SESSION["token"]);
    }

    function consultarPagamentoPorAtendimento($idPagamento)
    {
        $httpProvider = new HttpProvider();
        return $httpProvider->requestHttpWithToken("GET", null, "pagamento/" . $idPagamento, $_SESSION["token"]);
    }
}
