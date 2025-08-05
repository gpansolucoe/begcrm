<?php
session_start();

if (isset($_POST['imagem_assinatura'])) {
	$_SESSION['imagem_assinatura'] = $_POST['imagem_assinatura'];
	}
	
if(isset($_POST['cpf_cliente'])){
	$_SESSION['cpf_cliente'] = $_POST['cpf_cliente'];
}
?>