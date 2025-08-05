<?php

	include_once '../helpers/httpProvider.php';

	class Atendimento{
		
		function consultarAtendimentoPorId($idAtendimento){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/".$idAtendimento, $_SESSION["token"]);
		}

		function validarDuplicidade($idEmpresa, $numero){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/".$idEmpresa."/numero/".$numero, $_SESSION["token"]);
		}

		function incluirMotivo($idAtendimento, $motivo, $fluxoAtendimento, $idEmpresa, $idUsuario){
			$httpProvider = new HttpProvider();

			$requestBody = ["motivo_fluxo_atendimento" => $motivo,
							"nome_fluxo_atendimento" => $fluxoAtendimento];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "atendimento/".$idAtendimento."/empresa/".$idEmpresa."/fluxo-atendimento/motivo/usuario/".$idUsuario, $_SESSION["token"]);
		}

		function incluirAtendimentoBasico($nome, $email, $telefone, $celular, $consultor, $midia, $statusAtendimento, $observacao, $dataAgendamento, $idEmpresa, $idUsuario){
			$httpProvider = new HttpProvider();
			$requestBody = ["id_cliente" => "",
							"id_fluxo_atendimento" => $statusAtendimento,
							"id_servico" => "",
							"id_midia" => $midia,
							"id_empresa" => $idEmpresa,
							"id_usuario_inclusao" => $idUsuario,
							"id_usuario_alteracao" => $idUsuario,
							"id_consultor" => $consultor,
							"id_forma_pagamento" => "",
							"valor_proposta" => "",
							"marca_veiculo" => "",
							"modelo_veiculo" => "",
							"ano_veiculo" => "",
							"ano_modelo_veiculo" => "",
							"placa_veiculo" => "",
							"numero_parcelas_financiamento" => "",
							"valor_parcela_financiamento" => "",
							"instituicao_financeira" => "",
							"quantidade" => "",
							"valor_entrada" => "",
							"numero_parcelas_servico" => "",
							"dt_agendamento" => $dataAgendamento];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/inicial", $_SESSION["token"]);
		}

		function procurarAtendimentoPor($tipo, $valor, $idEmpresa){
			$httpProvider = new HttpProvider();
			switch($tipo){
				case "1":
					return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/". $idEmpresa ."/search/telefone/".$valor, $_SESSION["token"]);
				break;
				case "2":
					return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/". $idEmpresa ."/search/celular/".$valor, $_SESSION["token"]);
				break;
				case "3":
					return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/". $idEmpresa ."/search/cpfCnpj/".$valor, $_SESSION["token"]);
				break;
			}
		}

		

		function aprovarAtendimento($idAtendimento){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("POST", null, "atendimento/".$idAtendimento."/aprovar", $_SESSION["token"]);
		}

		function listarAtendimentosTop50($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/". $idEmpresa ."/top/50/", $_SESSION["token"]);
		}

		function listarClientesPendentes($idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/". $idEmpresa ."/cliente", $_SESSION["token"]);
		}

		function listarAgendaConsultor($idConsultor){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/consultor/". $idConsultor, $_SESSION["token"]);
		}

		function listarAtendimentosConsultor($idConsultor, $idEmpresa){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/all/consultor/". $idConsultor."/empresa/".$idEmpresa, $_SESSION["token"]);
		}

		function listarAtendimentosConsultorEntreOsDias($idConsultor, $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/consultor/". $idConsultor."/inicio/".$dataInicio."/fim/".$dataFim, $_SESSION["token"]);
		}

		function listarAtendimentoConsultorEntreOsDias($idEmpresa, $fluxoAtendimento, $consultor, $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/". $idEmpresa ."/consultor?fluxosAtendimentos=". $fluxoAtendimento ."&consultores=". $consultor ."&dataInicio=". $dataInicio ."&dataFim=".$dataFim , $_SESSION["token"]);
		}

		function listarAtendimentosConsultorMidiaEntreOsDias($idEmpresa, $idConsultor, $idMidia, $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/".$idEmpresa."/consultor/". $idConsultor."/midia/".$idMidia."/inicio/".$dataInicio."/fim/".$dataFim, $_SESSION["token"]);
		}

		function moverFluxoAtendimento($idAtendimento,$fluxoAtendimento, $idEmpresa, $idUsuario){
			$httpProvider = new HttpProvider();

			$requestBody = ["motivo_fluxo_atendimento" => "",
							"nome_fluxo_atendimento" => $fluxoAtendimento];

			return $httpProvider->requestHttpWithToken("PUT", $requestBody, "atendimento/".$idAtendimento."/empresa/".$idEmpresa."/fluxo-atendimento/usuario/".$idUsuario, $_SESSION["token"]);
		}

		function listarAtendimentosConsultorPorFluxoEntreOsDias($idConsultor, $fluxoAtendimento, $idEmpresa,  $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/consultor/". $idConsultor."/fluxo-atendimento/".$fluxoAtendimento."/empresa/".$idEmpresa."/inicio/".$dataInicio."/fim/".$dataFim, $_SESSION["token"]);
		}

		function listarAtendimentosPorFluxoEntreOsDias($idEmpresa,  $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/".$idEmpresa."/inicio/".$dataInicio."/fim/".$dataFim, $_SESSION["token"]);
		}

		function listarAtendimentosPorFluxo($idEmpresa, $fluxoAtendimento){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/".$idEmpresa."/fluxo-atendimento/".$fluxoAtendimento, $_SESSION["token"]);
		}

		function listarAtendimentosEntreOsDias($idEmpresa, $midia, $servico, $formaPagamento, $fluxoAtendimento, $consultor, $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/". $idEmpresa ."?midias=". $midia ."&servicos=". $servico ."&formasPagamento=". $formaPagamento ."&fluxosAtendimento=". $fluxoAtendimento ."&consultores=". $consultor ."&dataInicio=". $dataInicio ."&dataFim=".$dataFim , $_SESSION["token"]);
		}

		function excluirAtendimento($idAtendimento){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("DELETE", null, "atendimento/".$idAtendimento, $_SESSION["token"]);
		}

		function listarAtendimentosComprovanteUsuario($idEmpresa, $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/pagamento/empresa/".$idEmpresa."/inicio/".$dataInicio."/fim/".$dataFim, $_SESSION["token"]);
		}

		function listarAtendimentosFechadoFluxoAtendimentoSemComprovante($nomeFluxo, $idEmpresa, $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();
			return $httpProvider->requestHttpWithToken("GET", null, "atendimento/empresa/".$idEmpresa."/fluxo/".$nomeFluxo."/inicio/".$dataInicio."/fim/".$dataFim, $_SESSION["token"]);
		}

		function relatorioConsultorMidia($idEmpresa, $idMidia, $dataIniciao, $dataFim){
			$httpProvider = new HttpProvider();

			$requestBody = ["id_empresa" => $idEmpresa,
							"data_inicio" => $dataIniciao,
							"data_fim" => $dataFim];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/relatorios/total-vendas-midias-consultor/midia/".$idMidia, $_SESSION["token"]);
		}

		function relatorioVendasConsultor($idEmpresa, $dataInicio, $dataFim){
			$httpProvider = new HttpProvider();

			$requestBody = ["id_empresa" => $idEmpresa,
							"data_inicio" => $dataInicio,
							"data_fim" => $dataFim];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/relatorios/total-vendas-consultor", $_SESSION["token"]);

		}

		function relatorioVendasMidia($idEmpresa, $dataIniciao, $dataFim){
			$httpProvider = new HttpProvider();

			$requestBody = ["id_empresa" => $idEmpresa,
							"data_inicio" => $dataIniciao,
							"data_fim" => $dataFim];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/relatorios/total-vendas-midias", $_SESSION["token"]);
		}

		function relatorioQuantidadeMidiasEntrada($idEmpresa, $dataIniciao, $dataFim){
			$httpProvider = new HttpProvider();

			$requestBody = ["id_empresa" => $idEmpresa,
							"data_inicio" => $dataIniciao,
							"data_fim" => $dataFim];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/relatorios/quantidade-midias-entrada", $_SESSION["token"]);
		}

		function relatorioQuantidadeMidiasPerca($idEmpresa, $dataIniciao, $dataFim){
			$httpProvider = new HttpProvider();

			$requestBody = ["id_empresa" => $idEmpresa,
							"data_inicio" => $dataIniciao,
							"data_fim" => $dataFim];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/relatorios/quantidade-midias-perdidas", $_SESSION["token"]);
		}

		function relatorioQuantidadeMotivosPerca($idEmpresa, $dataIniciao, $dataFim){
			$httpProvider = new HttpProvider();

			$requestBody = ["id_empresa" => $idEmpresa,
							"data_inicio" => $dataIniciao,
							"data_fim" => $dataFim];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/relatorios/quantidade-motivos-perca", $_SESSION["token"]);
		}

		function relatorioVendasServico($idEmpresa, $dataIniciao, $dataFim){
			$httpProvider = new HttpProvider();

			$requestBody = ["id_empresa" => $idEmpresa,
							"data_inicio" => $dataIniciao,
							"data_fim" => $dataFim];

			return $httpProvider->requestHttpWithToken("POST", $requestBody, "atendimento/relatorios/total-vendas-servico", $_SESSION["token"]);
		}
		
	}		
	
?>
