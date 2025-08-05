<?php

    include_once '../endpoints/observacao.php';
    session_start();
    
    $observacao = new Observacao();

    $idAtendimento = $_POST["idAtendimento"];

    echo $observacao->listarObservacaoPorIdAtendimento($idAtendimento);

?>