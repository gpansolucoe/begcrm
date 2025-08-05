<?php

    include_once '../endpoints/atendimento.php';
    session_start();

    $idAtendimento = $_POST["idAtendimento"];
    
    $atendimento = new Atendimento();

    $retorno =  $atendimento->excluirAtendimento($idAtendimento);

    $urlCallBack = explode('?', $_SERVER['HTTP_REFERER'], 2);

    if($retorno != false){
        header("Location:".$urlCallBack[0]."?falha=false&tipo=delete");
    }else{
        header("Location:".$urlCallBack[0]."?falha=true&tipo=delete");
    }

?>