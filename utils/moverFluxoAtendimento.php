<?php

    include_once '../endpoints/atendimento.php';
    session_start();
    
    $atendimento = new Atendimento();

    $idAtendimento = $_POST["idAtendimento"];
    $fluxoAtendimento = $_POST["fluxoAtendimento"];

    $idEmpresa = $_SESSION["id_empresa"];
    $idUsuario = $_SESSION["id_usuario"];

    echo $atendimento->moverFluxoAtendimento($idAtendimento, $fluxoAtendimento, $idEmpresa, $idUsuario);

?>