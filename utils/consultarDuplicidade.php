<?php

    include_once '../endpoints/atendimento.php';
    session_start();

    $numero = $_POST["numero"];
    
    $atendimento = new Atendimento();
    $idEmpresa = $_SESSION["id_empresa"];

    $retorno =  $atendimento->validarDuplicidade($idEmpresa, $numero);

    echo $retorno;

?>