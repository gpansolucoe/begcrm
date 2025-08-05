<?php

    include_once '../endpoints/perfil.php';
    session_start();
    
    $perfil = new Perfil();

    echo $perfil->listarPerfis();

?>