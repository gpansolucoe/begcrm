<?php

    include_once '../endpoints/midia.php';
    session_start();

    $idMidia = $_POST["idMidia"];
    
    $midia = new Midia();

    echo $midia->consultarMidiaPorId($idMidia);

?>