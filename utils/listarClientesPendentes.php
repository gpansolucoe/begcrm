<?php

include_once '../endpoints/atendimento.php';
session_start();

$atendimento = new Atendimento();

echo $atendimento->listarClientesPendentes($_SESSION["id_empresa"]);

?>