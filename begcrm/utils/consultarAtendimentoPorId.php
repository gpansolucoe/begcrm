<?php

    include_once '../endpoints/atendimento.php';
    session_start();

    $idAtendimento = $_POST["idAtendimento"];
    
    $atendimento = new Atendimento();

    echo $atendimento->consultarAtendimentoPorId($idAtendimento);

?>