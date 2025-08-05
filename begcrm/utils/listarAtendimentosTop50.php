<?php

    include_once '../endpoints/atendimento.php';
    session_start();
    
    $atendimento = new Atendimento();

    echo $atendimento->listarAtendimentosTop50($_SESSION["id_empresa"]);

?>