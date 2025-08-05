<?php

    include_once '../endpoints/atendimento.php';
    session_start();
    
    $atendimento = new Atendimento();

    $idAtendimento = $_POST["idAtendimento"];
    $motivo = $_POST["motivo"];
    $fluxoAtendimento = $_POST["fluxoAtendimento"];
    $idEmpresa = $_SESSION["id_empresa"];
    $idUsuario = $_SESSION["id_usuario"];

    $retorno = $atendimento->incluirMotivo($idAtendimento, $motivo, $fluxoAtendimento, $idEmpresa, $idUsuario);

    $urlCallBack = explode('?', $_SERVER['HTTP_REFERER'], 2);

    if($retorno != false){
        header("Location:".$urlCallBack[0]."?falha=false&tipo=cancel");
    }else{
        header("Location:".$urlCallBack[0]."?falha=true&tipo=cancel");
    }

?>