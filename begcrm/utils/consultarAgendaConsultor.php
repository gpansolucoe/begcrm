<?php

    include_once '../endpoints/atendimento.php';
    session_start();

    if(isset($_POST["idConsultor"])){
        $idConsultor = $_POST["idConsultor"];
    }else{
        $idConsultor = $_SESSION["id_usuario"];
    }
    
    $atendimento = new Atendimento();

    echo $atendimento->listarAgendaConsultor($idConsultor);

?>