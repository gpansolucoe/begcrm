<?php

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    
    include_once '../endpoints/atendimento.php';
    include_once '../endpoints/cliente.php';
    session_start();
    
    $atendimento = new Atendimento();
    $cliente = new Cliente();

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $consultor = $_POST["consultor"];
    $midia = $_POST["midia"];
    $statusAtendimento = $_POST["statusAtendimento"];
    $observacao = $_POST["observacao"];
    $idCliente = $_POST["idCliente"];
    $idUsuario = $_SESSION["id_usuario"];
    $idEmpresa = $_SESSION["id_empresa"];
    $dataAgendamento = date("d-m-Y")." 00:00";

    if($idCliente != ""){
        $retorno = $atendimento->incluirAtendimentoBasico($nome, $email, $telefone, $celular, $consultor, $midia, $statusAtendimento, $observacao, $dataAgendamento, $idEmpresa, $idUsuario);
    }else{
        $retorno = $cliente->incluirClienteBasico($nome, $email, $telefone, $celular, $consultor, $midia, $statusAtendimento, $observacao, $dataAgendamento, $idEmpresa, $idUsuario);
    }
    

    if($retorno != false){
        header("Location:../operacao/novo-atendimento.php?falha=false&tipo=create");
    }else{
        header("Location:../operacao/novo-atendimento.php?falha=true&tipo=create");
    }

?>