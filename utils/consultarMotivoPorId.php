<?php

    include_once '../endpoints/motivo.php';
    session_start();

    $idMotivo = $_POST["idMotivo"];
    
    $motivo = new Motivo();

    echo $motivo->consultarMotivoPorId($idMotivo);

?>