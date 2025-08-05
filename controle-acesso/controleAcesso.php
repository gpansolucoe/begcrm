<?php

include_once '../endpoints/autenticacao.php';
include_once '../endpoints/usuario.php';
	
	session_start();

	$login = $_POST['email'];
	$senha = $_POST['senha'];
	
	$autenticacao = new Autenticacao();
	$usuario = new Usuario();
	
	$retornoAutenticacao = json_decode($autenticacao->login($login, $senha), true);

	if($retornoAutenticacao != false){
		$_SESSION["token"] = $retornoAutenticacao['token'];
		$_SESSION["id_usuario"] = $retornoAutenticacao['id_usuario'];
		$_SESSION["id_perfil"] = $retornoAutenticacao['id_perfil'];
		$_SESSION["id_empresa"] = $retornoAutenticacao['id_empresa'];

		switch($retornoAutenticacao['id_perfil']){
			case 1:
				$retornoUsuario = json_decode($usuario->consultarUsuarioPorId($retornoAutenticacao['id_usuario']), true);
				$_SESSION["id_usuario"] = $retornoAutenticacao['id_usuario'];
				$_SESSION["nome_usuario"] = ucwords(strtolower($retornoUsuario['data']['nome'])); 				
				header("Location:../master/dashboard.php?usrid=". $retornoAutenticacao['id_usuario']."&emp=".$retornoAutenticacao['id_empresa']."&prf=".$retornoAutenticacao['id_perfil']);
			break;
			case 2:
				$retornoUsuario = json_decode($usuario->consultarUsuarioPorId($retornoAutenticacao['id_usuario']), true);
				$_SESSION["id_usuario"] = $retornoAutenticacao['id_usuario'];
				$_SESSION["nome_usuario"] = ucwords(strtolower($retornoUsuario['data']['nome'])); 				
				header("Location:../coordenador/dashboard.php?usrid=". $retornoAutenticacao['id_usuario']."&emp=".$retornoAutenticacao['id_empresa']);
			break;
			case 3:
				$retornoUsuario = json_decode($usuario->consultarUsuarioPorId($retornoAutenticacao['id_usuario']), true);
				$_SESSION["id_usuario"] = $retornoAutenticacao['id_usuario'];
				$_SESSION["nome_usuario"] = ucwords(strtolower($retornoUsuario['data']['nome'])); 				
				header("Location:../operacao/dashboard.php?usrid=". $retornoAutenticacao['id_usuario']."&emp=".$retornoAutenticacao['id_empresa']);
			break;
			case 4:
				$retornoUsuario = json_decode($usuario->consultarUsuarioPorId($retornoAutenticacao['id_usuario']), true);
				$_SESSION["id_usuario"] = $retornoAutenticacao['id_usuario'];
				$_SESSION["nome_usuario"] = ucwords(strtolower($retornoUsuario['data']['nome'])); 				
				header("Location:../consultor/dashboard.php?usrid=". $retornoAutenticacao['id_usuario']."&emp=".$retornoAutenticacao['id_empresa']);
			break;
			case 7:
				$retornoUsuario = json_decode($usuario->consultarUsuarioPorId($retornoAutenticacao['id_usuario']), true);
				$_SESSION["id_usuario"] = $retornoAutenticacao['id_usuario'];
				$_SESSION["nome_usuario"] = ucwords(strtolower($retornoUsuario['data']['nome'])); 				
				header("Location:../financeiro/dashboard.php?usrid=". $retornoAutenticacao['id_usuario']."&emp=".$retornoAutenticacao['id_empresa']."&prf=".$retornoAutenticacao['id_perfil']);
			break;
			case 8:
				$retornoUsuario = json_decode($usuario->consultarUsuarioPorId($retornoAutenticacao['id_usuario']), true);
				$_SESSION["id_usuario"] = $retornoAutenticacao['id_usuario'];
				$_SESSION["nome_usuario"] = ucwords(strtolower($retornoUsuario['data']['nome'])); 				
				header("Location:../financeiro/dashboard.php?usrid=". $retornoAutenticacao['id_usuario']."&emp=".$retornoAutenticacao['id_empresa']."&prf=".$retornoAutenticacao['id_perfil']);
			break;
			default:
				header("Location:../index.php?falha=true");
			break;
		}	

	}else{
		header("Location:../index.php?falha=true");
	}
	

	
	function orquestradorDeDestino($id_status,$idEmpresa){
		switch($id_status){
			case 1: 
				header("Location:../Dashboard.Home.php?gpanid=". $idEmpresa);
			break;
			case 2: 
				header("Location:../Cadastro.Atualizar.php?gpanid=". $idEmpresa);
			break;
			case 3: 
				header("Location:../Dashboard.Home.php?gpanid=". $idEmpresa);
			break;
			default:
				header("Location:../Dashboard.Home.php?gpanid=". $idEmpresa);
			break;
		}
	}
	
?>