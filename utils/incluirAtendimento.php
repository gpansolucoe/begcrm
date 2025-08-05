<?php

    include_once '../endpoints/cliente.php';
    session_start();
    
    $cliente = new Cliente();

    $inputNome = $_POST["inputNome"];
    $inputEmail = $_POST["inputEmail"];
    $inputTelefone = $_POST["inputTelefone"];
    $inputCelular = $_POST["inputCelular"];
    $inputNascimento = $_POST["inputNascimento"];
    $inputRg = $_POST["inputRg"];
    $inputCpf = strlen($_POST["inputCpf"]) > 0 ? $_POST["inputCpf"] : $_POST["inputCnpj"];  
    $inputEstadoCivil = $_POST["inputEstadoCivil"];
    $inputProfissao = $_POST["inputProfissao"];
    $inputCep = $_POST["inputCep"];
    $inputEndereco = $_POST["inputEndereco"];
    $inputEnderecoNumero = $_POST["inputEnderecoNumero"];
    $inputEnderecoComplemento = $_POST["inputEnderecoComplemento"];
    $inputEnderecoBairro = $_POST["inputEnderecoBairro"];
    $inputEnderecoCidade = $_POST["inputEnderecoCidade"];
    $inputEnderecoEstado = $_POST["inputEnderecoEstado"];
    $inputEnderecoUf = $_POST["inputEnderecoUf"];
    $inputEnderecoComercial = $_POST["inputEnderecoComercial"];
    $inputTelefoneComercial = $_POST["inputTelefoneComercial"];
    $inputNumeroCnh = $_POST["inputNumeroCnh"];
    $inputValidadeCnh = $_POST["inputValidadeCnh"];
    $inputCategoriaCnh = $_POST["inputCategoriaCnh"];
    $inputCidadeEstadoCnh = $_POST["inputCidadeEstadoCnh"];
    $inputServico = $_POST["inputServico"];
    $inputConsultor = $_POST["inputConsultor"];
    $inputMidia = $_POST["inputMidia"];
    $inputFormaPagamento = $_POST["inputFormaPagamento"];
    $inputFluxoAtendimento = $_POST["inputFluxoAtendimento"];
    $inputQuantidadeServico = $_POST["inputQuantidadeServico"];
    $inputNumeroParcelas = $_POST["inputNumeroParcelas"];
    $inputValorParcelas = $_POST["inputValorParcelas"];
    $inputInstituicao = $_POST["inputInstituicao"];
    $inputValordePagamento = $_POST["inputValordePagamento"];
    $inputValorEntrada = $_POST["inputValorEntrada"];
    $inputNumeroParcelasServico = $_POST["inputNumeroParcelasServico"];
    $inputMarcaVeiculo = $_POST["inputMarcaVeiculo"];
    $inputModeloVeiculo = $_POST["inputModeloVeiculo"];
    $inputAnoVeiculo = $_POST["inputAnoVeiculo"];
    $inputAnoModeloVeiculo = $_POST["inputAnoModeloVeiculo"];
    $inputPlacaVeiculo = $_POST["inputPlacaVeiculo"];
    $observacao = $_POST["observacao"];
    $inputDataAgendamento = $_POST["inputDataAgendamento"];

    $idUsuario = $_SESSION["id_usuario"];
    $idEmpresa = $_SESSION["id_empresa"];
    


    $retorno = $cliente->incluirCliente($inputNome, $inputEmail, $inputTelefone, $inputCelular, $inputNascimento,
                                            $inputRg, $inputCpf, $inputEstadoCivil, $inputProfissao, $inputCep, $inputEndereco,
                                            $inputEnderecoNumero, $inputEnderecoComplemento, $inputEnderecoBairro, $inputEnderecoCidade,
                                            $inputEnderecoEstado, $inputEnderecoUf, $inputEnderecoComercial, $inputTelefoneComercial,
                                            $inputNumeroCnh, $inputValidadeCnh, $inputCategoriaCnh, $inputCidadeEstadoCnh, $inputServico,
                                                $inputConsultor, $inputMidia, $inputFormaPagamento, $inputFluxoAtendimento, $inputQuantidadeServico,
                                                $inputNumeroParcelas, $inputValorParcelas, $inputInstituicao, $inputValordePagamento, $inputValorEntrada,
                                                $inputNumeroParcelasServico, $inputMarcaVeiculo, $inputModeloVeiculo, $inputAnoVeiculo, $inputAnoModeloVeiculo,
                                                $inputPlacaVeiculo, $observacao, $inputDataAgendamento, $idUsuario, $idEmpresa);

    $urlCallBack = explode('?', $_SERVER['HTTP_REFERER'], 1);

    $parts = explode('/', $urlCallBack[0]);

    if($retorno != false){
        header("Location:../".$parts[sizeof($parts)-2]."/dashboard.php?falha=false&tipo=create");
    }else{
        header("Location:../".$parts[sizeof($parts)-2]."/dashboard.php?falha=true&tipo=create");
    }
?>