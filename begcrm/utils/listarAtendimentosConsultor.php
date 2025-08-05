<?php

include_once '../endpoints/atendimento.php';
session_start();

$config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/imports/app.ini');

$origem = $_POST["origem"];

switch ($origem) {
    case "email":
        $idConsultor = $config["usuario_email"];
        break;
    case "neurologic":
        $idConsultor = $config["usuario_neurologic"];
        break;
    case "facebook":
        $idConsultor = $config["usuario_facebook"];
        break;
    case "google":
        $idConsultor = $config["usuario_google"];
        break;
}

$atendimento = new Atendimento();
$idEmpresa = $_SESSION["id_empresa"];

echo $atendimento->listarAtendimentosConsultor($idConsultor, $idEmpresa);
