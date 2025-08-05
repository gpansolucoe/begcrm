<?php

    include_once '../endpoints/atendimento.php';
    include_once '../helpers/emailCadastro.php';
    session_start();
    
    $atendimento = new Atendimento();
    $emailCadastro = new EmailCadastro();

    $idAtendimento = $_POST["idAtendimento"];

    $retorno = $atendimento->aprovarAtendimento($idAtendimento);

    $urlCallBack = explode('?', $_SERVER['HTTP_REFERER'], 1);

     $parts = explode('/', $urlCallBack[0]);

    if($retorno != false){
        $retornoAtendimento = json_decode($atendimento->consultarAtendimentoPorId($idAtendimento),true);
        $emailCadastro->enviarEmail($retornoAtendimento["data"]["cliente"]["nome_cliente"], $retornoAtendimento["data"]["cliente"]["email"]);
    }else{
        header("Location: ../".$parts[sizeof($parts)-2]."/validar-atendimento.php?falha=true&tipo=create");
    }

?>