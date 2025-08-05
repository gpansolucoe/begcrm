<?php

    include_once '../endpoints/atendimento.php';
    session_start();

    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];
    
    $atendimento = new Atendimento();
    
    echo $atendimento->procurarAtendimentoPor($tipo, $valor, $_SESSION["id_empresa"]);

?>