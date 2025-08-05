<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Gpan Sistemas - Editar Atendimento</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php
   include_once('../imports/css-head.php');
   ?>
</head>

<body id="app-container" class="menu-sub-hidden show-spinner">
   <?php
   include_once('../imports/navbar.php');
   include_once('../imports/sidebar.php');
   ?>
   <main>
      <div class="container-fluid">
         <div class="row  ">
            <div class="col-12">
               <h1>Cadastro</h1>
               <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                  <ol class="breadcrumb pt-0">
                     <li class="breadcrumb-item">
                        <a href="Dashboard.Home.php">Home</a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Criar novo cadastro</li>
                  </ol>
               </nav>
               <div class="separator mb-5"></div>
            </div>
            <div class="col-lg-12 col-12 mb-4">
               <div class="card mb-4">
                  <div class="card-body">
                     <h5 class="underline mb-3">Informações Pessoais</h5>
                     <form method="post" action="../utils/incluirAtendimento.php">
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="inputNome">Nome Completo</label>
                              <input type="text" class="form-control" id="inputNome" name="inputNome" value="" placeholder="Nome" required>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputEmail">Email</label>
                              <input type="email" class="form-control" id="inputEmail" name="inputEmail" onblur="validacaoEmail(this)" value="" placeholder="Email">
                              <span id='msgemail'></span>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputTelefone">Telefone</label>
                              <input type="tel" class="form-control" id="inputTelefone" name="inputTelefone" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="(__)____-____" required>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputCelular">Celular</label>
                              <input type="tel" class="form-control" id="inputCelular" name="inputCelular" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="(__)___-____">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputNascimento">Data Nasc.</label>
                              <input type="text" class="form-control" id="inputNascimento" name="inputNascimento" value="" maxlength="10" onkeyup="mascara( this, mdata );" placeholder="Data de Nasc.">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <label for="inputRg">RG</label>
                              <input type="text" class="form-control" id="inputRg" name="inputRg" value="" placeholder="RG">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputCpf">CPF</label>
                              <input type="text" class="form-control" id="inputCpf" name="inputCpf" value="" placeholder="CPF" onblur="validarCPF(this,cpfCnpj)" maxlength="14" onkeypress="mascara(this,cpfCnpj)">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputCpf">CNPJ</label>
                              <input type="text" class="form-control" id="inputCnpj" name="inputCnpj" value="" placeholder="CPNJ" onblur="mascara(this,cpfCnpj)" maxlength="18" onkeypress="mascara(this,cpfCnpj)">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputEstadoCivil">Estado Civil</label>
                              <input type="text" class="form-control" id="inputEstadoCivil" name="inputEstadoCivil" value="" placeholder="Estado Civil">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputProfissao">Profissão</label>
                              <input type="text" class="form-control" id="inputProfissao" name="inputProfissao" value="" placeholder="Profissão">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-1">
                              <label for="inputCep">CEP</label>
                              <input type="text" class="form-control" id="inputCep" name="inputCep" maxlength="9" onkeyup="mascara( this, Cep );" value="" placeholder="_____-___">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputEndereco">Endereço</label>
                              <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" value="" placeholder="Endereço">
                           </div>
                           <div class="form-group col-md-1">
                              <label for="inputEnderecoNumero">Número</label>
                              <input type="text" class="form-control" id="inputEnderecoNumero" name="inputEnderecoNumero" value="" placeholder="Número">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="inputEnderecoComplemento">Complemento</label>
                              <input type="text" class="form-control" id="inputEnderecoComplemento" name="inputEnderecoComplemento" value="" placeholder="Complemento">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="inputEnderecoBairro">Bairro</label>
                              <input type="text" class="form-control" id="inputEnderecoBairro" name="inputEnderecoBairro" value="" placeholder="Bairro">
                           </div>
                           <div class="form-group col-md-3">
                              <label for="inputEnderecoCidade">Cidade</label>
                              <input type="text" class="form-control" id="inputEnderecoCidade" name="inputEnderecoCidade" value="" placeholder="Cidade">
                           </div>
                           <div class="form-group col-md-3">
                              <label for="inputEnderecoEstado">Estado</label>
                              <input type="text" class="form-control" id="inputEnderecoEstado" name="inputEnderecoEstado" value="" placeholder="Estado">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputEnderecoUf">UF</label>
                              <input type="text" class="form-control" id="inputEnderecoUf" name="inputEnderecoUf" value="" placeholder="UF">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="inputEndereco">Endereço Comercial</label>
                              <input type="text" class="form-control" id="inputEnderecoComercial" name="inputEnderecoComercial" value="" placeholder="Endereço Comercial">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputTelefoneComercial">Telefone Comercial</label>
                              <input type="tel" class="form-control" id="inputTelefoneComercial" name="inputTelefoneComercial" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="(__)___-____">
                           </div>
                        </div>

                        <h5 class="underline mt-3 mb-3">Informações de Serviço</h5>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <label for="inputServico">Serviço</label>
                              <select id="inputServico" name="inputServico" class="form-control">
                                 <option value="" selected="">Selecione...</option>
                              </select>
                           </div>
                           <div id="divMidia" class="form-group col-md-2">
                              <label for="inputMidia">Mídia</label>
                              <select id="inputMidia" name="inputMidia" class="form-control">
                                 <option value="" selected="">Selecione...</option>
                              </select>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputFormaPagamento">Forma de Pagamento</label>
                              <select id="inputFormaPagamento" name="inputFormaPagamento" class="form-control">
                                 <option value="" selected="">Selecione...</option>
                              </select>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputFluxoAtendimento">Status Atendimento</label>
                              <select id="inputFluxoAtendimento" name="inputFluxoAtendimento" class="form-control" required>
                                 <option value="" selected="">Selecione...</option>
                              </select>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputQuantidadeServico">Quantidade do Serviço</label>
                              <input type="text" class="form-control" id="inputQuantidadeServico" name="inputQuantidadeServico" onkeypress="allowNumbersOnly(event)" value="" placeholder="Quantidade">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputDataAgendamento">Data Agendamento</label>
                              <input type="text" id="inputDataAgendamento" name="inputDataAgendamento" class="form-control datepicker" required>
                           </div>


                        </div>
                        <div class="form-row divAmerican">
                           <div class="form-group col-md-2 divAmerican">
                              <label for="inputNumeroParcelas">Número de Parcelas</label>
                              <input type="text" class="form-control" id="inputNumeroParcelas" name="inputNumeroParcelas" onkeypress="allowNumbersOnly(event)" value="" placeholder="Número Parcelas">
                           </div>
                           <div class="form-group col-md-2 divAmerican">
                              <label for="inputValorParcelas">Valor da Parcelas</label>
                              <input type="text" class="form-control" id="inputValorParcelas" name="inputValorParcelas" onkeyup="moeda(this);" value="" placeholder="Valor Parcelas">
                           </div>
                           <div class="form-group col-md-2 divAmerican">
                              <label for="inputInstituicao">Instituição</label>
                              <input type="text" class="form-control" id="inputInstituicao" name="inputInstituicao" value="" placeholder="Instituição">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <label for="inputInstituicao">Valor da Proposta</label>
                              <input type="text" class="form-control" id="inputValordePagamento" name="inputValordePagamento" onkeyup="moeda(this);" value="" placeholder="Valor de Pagamento">
                           </div>
                        </div>
                        <div style="display:none" class="form-row divLicence">
                           <div class="form-group col-md-2">
                              <label for="inputValorEntrada">Valor de entrada</label>
                              <input type="text" class="form-control" id="inputValorEntrada" name="inputValorEntrada" onkeyup="moeda(this);" value="" placeholder="Valor de Entrada">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputNumeroParcelasServico">Número de parcelas do Serviço</label>
                              <input type="text" class="form-control" id="inputNumeroParcelasServico" name="inputNumeroParcelasServico" onkeypress="allowNumbersOnly(event)" value="" placeholder="Número de parcelas do Serviço">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputNumeroCnh">Número CNH</label>
                              <input type="text" class="form-control" id="inputNumeroCnh" name="inputNumeroCnh" value="" placeholder="Número CNH">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputValidadeCnh">Validade CNH</label>
                              <input type="text" class="form-control" id="inputValidadeCnh" name="inputValidadeCnh" value="" maxlength="10" onkeyup="mascara( this, mdata );" placeholder="Validade CNH">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputCategoriaCnh">Categoria CNH</label>
                              <input type="text" class="form-control" id="inputCategoriaCnh" name="inputCategoriaCnh" value="" placeholder="Categoria CNH">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputCategoriaCnh">Cidade e Estado CNH</label>
                              <input type="text" class="form-control" id="inputCidadeEstadoCnh" name="inputCidadeEstadoCnh" value="" placeholder="Cidade/UF CNH">
                           </div>
                        </div>
                        <div class="form-row divAmerican">
                           <div class="form-group col-md-2">
                              <label for="inputMarcaVeiculo">Marca do Veiculo</label>
                              <input type="text" class="form-control" id="inputMarcaVeiculo" name="inputMarcaVeiculo" value="" placeholder="Marca do veículo">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputModeloVeiculo">Modelo do Veículo</label>
                              <input type="text" class="form-control" id="inputModeloVeiculo" name="inputModeloVeiculo" value="" placeholder="Modelo Veículo">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputAnoVeiculo">Ano Veículo</label>
                              <input type="text" class="form-control" id="inputAnoVeiculo" name="inputAnoVeiculo" value="" placeholder="Ano Veículo">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputAnoModeloVeiculo">Ano Modelo Veículo</label>
                              <input type="text" class="form-control" id="inputAnoModeloVeiculo" name="inputAnoModeloVeiculo" value="" placeholder="Ano do Modelo do veículo">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputPlacaVeiculo">Placa Veículo</label>
                              <input type="text" class="form-control" style="text-transform:uppercase" id="inputPlacaVeiculo" name="inputPlacaVeiculo" value="" placeholder="Placa Veículo">
                           </div>

                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="observacao">Observação</label>
                              <textarea class="form-control" id="observacao" name="observacao" rows="5" maxlength="500"></textarea>
                           </div>
                        </div>
                        <button id="submit" type="submit" class="btn btn-primary d-block mt-3 mb-3">Salvar</button>
                        <div class="resultado-consulta" style="height: 200px; overflow-x: hidden;">

                        </div>
                        <input type="hidden" id="inputConsultor" name="inputConsultor" value="">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php
   include_once('../imports/scripts-footer.php');
   ?>
</body>
<script>
   var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
         sURLVariables = sPageURL.split('&'),
         sParameterName,
         i;

      for (i = 0; i < sURLVariables.length; i++) {
         sParameterName = sURLVariables[i].split('=');

         if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
         }
      }
   };

   if (sessionStorage.getItem("id_empresa") == 2) {
      $(".divLicence").show();
      $(".divAmerican").attr("style", "display:none;");
   }

   $("#app-container").addClass("show-spinner");
   $.getJSON("../utils/listarServicosAtivos.php", function(data) {
      if (data != false) {
         var jsonData = data.data;;
         $.each(jsonData, function(key, value) {
            $("#inputServico").append('<option value=' + value.id_servico + '>' + value.nome_servico + '</option>');
         });
      }
      $.getJSON("../utils/listarConsultoresAtivos.php", function(data) {
         if (data != false) {
            $("#inputConsultor").val(sessionStorage.getItem("id_usuario"));
         }
         $.getJSON("../utils/listarMidiasAtivas.php", function(data) {
            if (data != false) {
               var jsonData = data.data;;
               $.each(jsonData, function(key, value) {
                  $("#inputMidia").append('<option value=' + value.id_midia + '>' + value.nome_midia + '</option>');
               });
            }
            $.getJSON("../utils/listarFormaPagamentoAtivos.php", function(data) {
               if (data != false) {
                  var jsonData = data.data;;
                  $.each(jsonData, function(key, value) {
                     $("#inputFormaPagamento").append('<option value=' + value.id_forma_pagamento + '>' + value.nome_forma_pagamento + '</option>');
                  });
               }
               $.getJSON("../utils/listarFluxosAtendimento.php", function(data) {
                  if (data != false) {
                     var jsonData = data.data;
                     $.each(jsonData, function(key, value) {
                        if (value.nome != "PERCA" && value.nome != "CANCELADO" && value.nome != "PGTO. CONFIRMADO" && value.nome != "PGTO. ESTORNADO") {
                           $("#inputFluxoAtendimento").append('<option value=' + value.id_fluxo_atendimento + '>' + value.nome + '</option>');
                        }
                     });
                     if (getUrlParameter("atdid")) {
                        $.ajax({
                           url: '../utils/consultarAtendimentoPorId.php',
                           type: 'POST',
                           data: {
                              idAtendimento: getUrlParameter("atdid")
                           },
                           success: function(data) {
                              if (data != false) {
                                 var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;

                                 $("#inputNome").val(jsonData.cliente.nome_cliente);
                                 $("#inputEmail").val(jsonData.cliente.email);

                                 if (jsonData.cliente.telefone != "") {
                                    $("#inputTelefone").val(jsonData.cliente.telefone);
                                    $("#inputTelefone").attr("readonly", "true");
                                 }
                                 if (jsonData.cliente.celular != "") {
                                    $("#inputCelular").val(jsonData.cliente.celular);
                                    $("#inputCelular").attr("readonly", "true");
                                 }


                                 $("#inputCelular").val(jsonData.cliente.celular);
                                 $("#inputNascimento").val(jsonData.cliente.data_nasc);

                                 $("#inputRg").val(jsonData.cliente.rg);
                                 $("#inputCpf").val(jsonData.cliente.cpf);
                                 $("#inputEstadoCivil").val(jsonData.cliente.estado_civil);
                                 $("#inputProfissao").val(jsonData.cliente.profissao);

                                 $("#inputCep").val(jsonData.cliente.cep);
                                 $("#inputEndereco").val(jsonData.cliente.endereco);
                                 $("#inputEnderecoNumero").val(jsonData.cliente.numero);
                                 $("#inputEnderecoComplemento").val(jsonData.cliente.complemento);

                                 $("#inputEnderecoBairro").val(jsonData.cliente.bairro);
                                 $("#inputEnderecoCidade").val(jsonData.cliente.cidade);
                                 $("#inputEnderecoEstado").val(jsonData.cliente.estado);
                                 $("#inputEnderecoUf").val(jsonData.cliente.uf);

                                 $("#inputEnderecoComercial").val(jsonData.cliente.endereco_comercial);
                                 $("#inputTelefoneComercial").val(jsonData.cliente.telefone_comercial);

                                 $("#inputServico").val(jsonData.servico != "" ? jsonData.servico.id_servico : "");
                                 $("#inputConsultor").val(jsonData.consultor.id_usuario);
                                 $("#inputMidia").val(jsonData.midia.id_midia);
                                 $("#inputFormaPagamento").val(jsonData.forma_pagamento != "" ? jsonData.forma_pagamento.id_forma_pagamento : "");

                                 if (jsonData.fluxo_atendimento.nome != "CANCELADO") {
                                    $("#inputFluxoAtendimento").val(jsonData.fluxo_atendimento.id_fluxo_atendimento);
                                 } else {
                                    $("#inputFluxoAtendimento").val("");
                                 }

                                 $('#inputDataAgendamento').datepicker({
                                    format: 'dd/mm/yyyy',
                                    language: 'pt-BR'
                                 });

                                 var $datepicker = $('#inputDataAgendamento');
                                 $datepicker.datepicker();
                                 $datepicker.datepicker('setDate', new Date(jsonData.dt_agendamento));


                                 $("#inputValordePagamento").val(jsonData.valor_proposta);
                                 $("#inputQuantidadeServico").val(jsonData.quantidade);
                                 $("#inputMarcaVeiculo").val(jsonData.marca_veiculo);
                                 $("#inputModeloVeiculo").val(jsonData.modelo_veiculo);
                                 $("#inputAnoVeiculo").val(jsonData.ano_veiculo);
                                 $("#inputAnoModeloVeiculo").val(jsonData.ano_modelo_veiculo);
                                 $("#inputPlacaVeiculo").val(jsonData.placa_veiculo);
                                 $("#inputNumeroParcelas").val(jsonData.numero_parcelas_financiamento);
                                 $("#inputValorParcelas").val(jsonData.valor_parcela_financiamento);
                                 $("#inputInstituicao").val(jsonData.instituicao_financeira);

                                 $("#idCliente").val(jsonData.cliente.id_cliente);

                                 $("#idAtendimento").val(jsonData.id_atendimento);

                              }
                           }
                        });

                        $.ajax({
                           url: '../utils/listarObservacao.php',
                           type: 'POST',
                           data: {
                              idAtendimento: getUrlParameter("atdid")
                           },
                           success: function(data) {
                              if (data != false) {
                                 var jsonData = JSON.parse(data).data;
                                 $.each(jsonData, function(key, value) {
                                    var linha = criarLinhaLista(value);
                                    $(".resultado-consulta").append(linha);
                                 });
                              }
                           }
                        });
                     } else {
                        $("#inputConsultor").val(sessionStorage.getItem("id_usuario"));
                        var $datepicker = $('#inputDataAgendamento');
                        $datepicker.datepicker();
                        $datepicker.datepicker('setDate', new Date());
                     }
                  }
               });
            });
         });
      });
      $("#app-container").removeClass("show-spinner");
   });


   $("#inputTelefone").focusout(function() {
      if (this.value != "" && !$(this).is('[readonly]')) {
         $.ajax({
            url: '../utils/consultarDuplicidade.php',
            type: 'POST',
            data: {
               numero: this.value,
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "false" && data != "") {
                  var jsonData = JSON.parse(data).data;
                  $("#inputTelefone").val("");
                  alert("Telefone " + jsonData.cliente.telefone + " já cadastrado!\nAtendimento com  o consultor " + jsonData.consultor.nome + " e status " + jsonData.fluxo_atendimento.nome);
               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
      } else {
         $("#btnSalvar").show();
      }
   });

   $("#inputCelular").focusout(function() {
      if (this.value != "" && !$(this).is('[readonly]')) {
         $.ajax({
            url: '../utils/consultarDuplicidade.php',
            type: 'POST',
            data: {
               numero: this.value,
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "false" && data != "") {
                  var jsonData = JSON.parse(data).data;
                  $("#inputCelular").val("");
                  alert("Celular " + jsonData.cliente.celular + " já cadastrado!\nAtendimento com o consultor " + jsonData.consultor.nome + " e status " + jsonData.fluxo_atendimento.nome);
               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
      } else {
         $("#btnSalvar").show();
      }
   });


   function ConsultarCEP(cep) {

      if (cep.length == 8) {
         //Consulta o webservice viacep.com.br/
         $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
               //Atualiza os campos com os valores da consulta.
               $("#inputEndereco").val(dados.logradouro);
               $("#inputEnderecoBairro").val(dados.bairro);
               $("#inputEnderecoCidade").val(dados.localidade);
               $("#inputEnderecoEstado").val(dados.localidade);
               $("#inputEnderecoUf").val(dados.uf);
            } //end if.
            else {
               //CEP pesquisado não foi encontrado.
               //limpa_formulário_cep();
               alert("CEP não encontrado.");
            }
         });
      }
   }

   $("#inputCep").blur(function() {
      //Nova variável "cep" somente com dígitos.
      var cep = $(this).val().replace(/\D/g, '');

      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if (validacep.test(cep)) {
         ConsultarCEP(cep);
      }

   });

   $("#inputFluxoAtendimento").change(function() {
      if ($("#inputFluxoAtendimento option:selected").text() == "FECHADO" || $("#inputFluxoAtendimento option:selected").text() == "FECHADO COM BOLETO") {
         $("#inputCpf").prop('required', true);
         $("#inputValordePagamento").prop('required', true);
      }
      if ($("#inputFluxoAtendimento option:selected").text() == "PROPOSTA") {
         $("#inputValordePagamento").prop('required', true);
      }
   });


   function validarCPF(cpf, f) {
      var obj = cpf;
      if (cpf.value.length == 14) {
         cpf = cpf.value.replace(/[^\d]+/g, '');
         if (cpf == '') return false;
         // Elimina CPFs invalidos conhecidos	
         if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            alert("CPF INVALIDO");
         // Valida 1o digito	
         add = 0;
         for (i = 0; i < 9; i++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
         rev = 11 - (add % 11);
         if (rev == 10 || rev == 11)
            rev = 0;
         if (rev != parseInt(cpf.charAt(9))) {
            $("#inputCpf").val("");
            alert("CPF INVALIDO");
         }

         // Valida 2o digito	
         add = 0;
         for (i = 0; i < 10; i++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
         rev = 11 - (add % 11);
         if (rev == 10 || rev == 11)
            rev = 0;
         if (rev != parseInt(cpf.charAt(10))) {
            $("#inputCpf").val("");
            alert("CPF INVALIDO");
         }

      }
      mascara(obj, f)
   }


   function mascara(o, f) {
      v_obj = o
      v_fun = f
      setTimeout("execmascara()", 1)
   }

   function execmascara() {
      v_obj.value = v_fun(v_obj.value)
   }

   function mtel(v) {
      v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
      v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
      v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
      return v;
   }

   function Cep(v) {
      v = v.replace(/D/g, "")
      v = v.replace(/^(\d{5})(\d)/, "$1-$2")
      return v
   }

   function mdata(v) {
      v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
      v = v.replace(/(\d{2})(\d)/, "$1/$2");
      v = v.replace(/(\d{2})(\d)/, "$1/$2");

      v = v.replace(/(\d{2})(\d{2})$/, "$1$2");
      return v;
   }

   function cpfCnpj(v) {

      //Remove tudo o que não é dígito
      v = v.replace(/\D/g, "")

      if (v.length <= 13) { //CPF

         //Coloca um ponto entre o terceiro e o quarto dígitos
         v = v.replace(/(\d{3})(\d)/, "$1.$2")

         //Coloca um ponto entre o terceiro e o quarto dígitos
         //de novo (para o segundo bloco de números)
         v = v.replace(/(\d{3})(\d)/, "$1.$2")

         //Coloca um hífen entre o terceiro e o quarto dígitos
         v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")

      } else { //CNPJ

         //Coloca ponto entre o segundo e o terceiro dígitos
         v = v.replace(/^(\d{2})(\d)/, "$1.$2")

         //Coloca ponto entre o quinto e o sexto dígitos
         v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")

         //Coloca uma barra entre o oitavo e o nono dígitos
         v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")

         //Coloca um hífen depois do bloco de quatro dígitos
         v = v.replace(/(\d{4})(\d)/, "$1-$2")

      }

      return v

   }

   function moeda(z) {
      v = z.value;
      v = v.replace(/\D/g, "") //permite digitar apenas números
      v = v.replace(/[0-9]{12}/, "inválido")
      //limita pra máximo 999.999.999,99	
      v = v.replace(/(\d{1})(\d{8})$/, "$1$2")
      //coloca ponto antes dos últimos 8 digitos	
      v = v.replace(/(\d{1})(\d{5})$/, "$1$2")
      //coloca ponto antes dos últimos 5 digitos	
      v = v.replace(/(\d{1})(\d{1,2})$/, "$1.$2")
      //coloca virgula antes dos últimos 2 digitos		
      z.value = v;
   }

   function allowNumbersOnly(e) {
      var code = (e.which) ? e.which : e.keyCode;
      if (code > 31 && (code < 48 || code > 57)) {
         e.preventDefault();
      }
   }

   function formatarData(data) {
      const date = new Date(data);

      const day = date.getDate().toString().padStart(2, '0');
      const month = (date.getMonth() + 1).toString().padStart(2, '0');
      const year = date.getFullYear();

      const formatted = `${day}/${month}/${year}`;

      return formatted;
   }

   function formatarHora(data) {
      const time = new Date(data);

      const hora = time.getHours().toString();
      const minuto = time.getMinutes().toString();
      const segundo = time.getSeconds();

      const formatted = `${hora}:${minuto}:${segundo}`;

      return formatted;
   }


   function criarLinhaLista(item) {
      var linha = '<div class="row"><div class="card d-inline-block mb-3 float-left">' +
         '<div class="position-absolute pt-1 pr-2 r-0">' +
         '<span class="text-extra-small text-muted">' + formatarData(item.dt_inclusao) + '</span>' +
         '<span class="text-extra-small text-muted">  ' + formatarHora(item.dt_inclusao) + '</span>' +
         '</div>' +
         '<div class="card-body">' +
         '<div class="d-flex flex-row pb-2">' +
         '<div class=" d-flex flex-grow-1 min-width-zero">' +
         '<div class="m-0 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">' +
         '<div class="min-width-zero">' +
         '<p class="mb-0 truncate list-item-heading">' + item.usuario.nome + '</p>' +
         '</div>' +
         '</div>' +
         '</div>' +
         '</div>' +
         '<div class="chat-text-left">' +
         '<p class="mb-0 text-semi-muted">' + item.observacao + '</p>' +
         '</div>' +
         '</div>' +
         '</div></div>';

      return linha;
   }

   if (getUrlParameter('falha') && getUrlParameter('tipo')) {
      switch (getUrlParameter('falha')) {
         case 'true':
            if (getUrlParameter('tipo') == "update") {
               $.notify({
                  // options
                  message: 'Erro ao atualizar o <strong>Atendimento!</strong>'
               }, {
                  // settings
                  type: 'danger'
               });
            } else if (getUrlParameter('tipo') == "create") {
               $.notify({
                  // options
                  message: 'Erro ao cadastar o <strong>Atendimento!</strong>'
               }, {
                  // settings
                  type: 'danger'
               });
            }
            break;
         case 'false':
            if (getUrlParameter('tipo') == "update") {
               $.notify({
                  // options
                  message: 'Atendimento atualizado com <strong>Sucesso!</strong>'
               }, {
                  // settings
                  type: 'success'
               });
            } else if (getUrlParameter('tipo') == "create") {
               $.notify({
                  // options
                  message: 'Atendimento cadastrado com <strong>Sucesso!</strong>'
               }, {
                  // settings
                  type: 'success'
               });
            }
            break;
      }
   }
</script>

</html>