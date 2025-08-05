   <?php
   set_time_limit(0);
   error_reporting(0);
   ?>
   <!DOCTYPE html>
   <html lang="pt-br">

   <head>
      <meta charset="UTF-8">
      <title>Impressão B&G</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://crm.begsolucoes.com.br/css/vendor/bootstrap.min.css">
      <style>
         body {
            margin: 0;
            font-size: .9em;
            font-weight: bolder;
            .form-control {
               font-size: 1em;
            }
            .form-group {
                margin-bottom: .6rem;
            }
            textarea {
              resize: none;
            }
            .selectValue {
               cursor: hand;
               cursor: pointer;
               font-weight: bolder;
            }
            label {
               /*display: none;*/
               margin-bottom: 0rem;
               font-weight: bolder;
            }
            .center {
              text-align: center;
            }
            .border-bottom {
               border-bottom: 1px solid #000 !important;
            }
            .border {
               border: 1px solid #000 !important;
            }
            .table td {
               padding: .50rem;
            }
            .table-bordered, .table td {
               border: 2px solid #000;
            }
            /*
            .img {
               height: 100px;
               width: 167px;
            }
            */
            overflow-x: hidden;
         }
         h5 {
            font-size: 1.2em;
            font-weight: bolder;
         }
         @page {
            margin: 0;
            border-style:none;
            size: A4;
         }
         @media print {
            body {
               margin: 0;
               background-color: #FFFFFF;
               color: #000000;
            }
            .form-control {
               border: none;
               color: #000000;
               overflow:visible;
            }
            .btn {
               display: none !important;
            }
            :not(:focus)::-webkit-input-placeholder {
                /* WebKit browsers */
                color: transparent;
            }
            :not(:focus):-moz-placeholder {
                /* Mozilla Firefox 4 to 18 */
                color: transparent;
            }
            :not(:focus)::-moz-placeholder {
                /* Mozilla Firefox 19+ */
                color: transparent;
            }
            :not(:focus):-ms-input-placeholder {
                /* Internet Explorer 10+ */
                color: transparent;
            }

         }
      </style>
   </head>

   <body>
      <div class="container-fluid pl-4 pr-4">
         <div class="row">
            <div class="col-12">
               <?php
                  if ($_GET['oba']) {
                     $logo = "<img class=\"img-fluid mx-auto d-block m-2 img\" height=\"40\" width=\"285\" src=\"https://crm.obomacordo.com/img/cropped-logo-obomacordo-site-1.png\">";
                  } else {
                     $logo = "<img class=\"img mx-auto d-block m-2\" height=\"100\" width=\"167\" src=\"https://crm.regularizecnh.com.br/img/logo-beg.png\">";
                  }
                  echo $logo;
               ?>
               
            </div>
         </div>
         <table class="table table-hover table-bordered">
           <tbody>
            <tr>
               <td colspan="3" class="p-0">
                  <table class="table border-0 m-0">
                     <tr>
                        <td style="width:70%" class="border-0">
                           <label for="inputMidia">Mídia</label>
                           <select id="inputMidia" name="inputMidia" class="form-control" readon>
                              <option selected="">Selecione...</option>
                           </select>
                        </td>
                        <td style="width:30%" class="border-0">
                           <label for="inputNome">DATA</label>
                           <input type="text" class="form-control" id="inputData" name="inputData" maxlength="10" onkeyup="mascara( this, mdata );" placeholder="__/__/__">
                        </td>
                     </tr>
                  </table>
               </td>
             </tr>
             <tr>
               <td colspan="3">
                  <label for="inputNome">Nome Completo</label>
                  <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome Completo">
               </td>
             </tr>
             <tr>
               <td colspan="3" class="p-0">
                  <table class="table border-0 m-0">
                     <tr>
                        <td style="width:15%" class="border-0">
                           <label for="inputCep">CEP</label>
                           <input type="text" class="form-control" id="inputCep" name="inputCep" maxlength="9" onkeyup="mascara( this, Cep );" placeholder="_____-___">
                        </td>
                        <td style="width:45%" class="border-0">
                           <label for="inputEndereco">Endereço</label>
                           <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="Endereço">
                        </td>
                        <td style="width:10%" class="border-0">
                           <label for="inputEnderecoNumero">Número</label>
                           <input type="text" class="form-control" id="inputEnderecoNumero" name="inputEnderecoNumero" placeholder="Número">
                        </td>
                        <td style="width:30%" class="border-0">
                           <label for="inputEnderecoComplemento">Complemento</label>
                           <input type="text" class="form-control" id="inputEnderecoComplemento" name="inputEnderecoComplemento" placeholder="Complemento">
                        </td>
                     </tr>
                  </table>
               </td>
             </tr>
             <tr>
               <td  colspan="3" class="p-0">
                  <table class="table border-0 m-0">
                     <tr>
                        <td style="width:20%" class="border-0">
                           <label for="inputEnderecoBairro">Bairro</label>
                           <input type="text" class="form-control" id="inputEnderecoBairro" name="inputEnderecoBairro" placeholder="Bairro">
                        </td>
                        <td style="width:20%" class="border-0">
                           <label for="inputEnderecoCidade">Cidade</label>
                           <input type="text" class="form-control" id="inputEnderecoCidade" name="inputEnderecoCidade" placeholder="Cidade">
                        </td>
                        <td style="width:10%" class="border-0">
                           <label for="inputEnderecoEstado">Estado</label>
                           <input type="text" class="form-control" id="inputEnderecoEstado" name="inputEnderecoEstado" placeholder="Estado">
                        </td>
                        <td style="width:10%" class="border-0">
                           <label for="inputEnderecoUf">UF</label>
                           <input type="text" class="form-control" id="inputEnderecoUf" name="inputEnderecoUf" placeholder="UF">
                        </td>
                     </tr>
                  </table>
               </td>
             </tr>
             <tr>
               <td>
                  <label for="inputCpf" class="labelCpf">CPF</label>
                  <input type="text" class="form-control" id="inputCpf" name="inputCpf" placeholder="CPF/CNPJ">
               </td>
               <td>
                  <label for="inputRg">RG</label>
                  <input type="text" class="form-control" id="inputRg" name="inputRg" placeholder="RG">
               </td>
               <td>
                  <label for="inputEstadoCivil">Estado Civil</label>
                  <input type="text" class="form-control" id="inputEstadoCivil" name="inputEstadoCivil" placeholder="Estado Civil">
               </td>
             </tr>
             <tr>
               <td>
                  <label for="inputNascimento">Data Nasc.</label>
                  <input type="text" class="form-control" id="inputNascimento" name="inputNascimento" maxlength="10" onkeyup="mascara( this, mdata );" placeholder="__/__/__">
               </td>
               <td>
                  <label for="inputTelefone">Telefone Residencial</label>
                  <input type="tel" class="form-control" id="inputTelefone" name="inputTelefone" maxlength="15" onkeyup="mascara( this, mtel );" placeholder="(__)____-____">
               </td>
               <td>
                  <label for="inputCelular">Telefone Celular</label>
                  <input type="tel" class="form-control" id="inputCelular" name="inputCelular" maxlength="15" onkeyup="mascara( this, mtel );" placeholder="(__)___-____">
               </td>
             </tr>
             <tr>
               <td colspan="2">
                  <label for="inputProfissao">Profissão</label>
                  <input type="text" class="form-control" id="inputProfissao" name="inputProfissao" placeholder="Profissão">
               </td>
               <td>
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
               </td>
             </tr>
             <tr>
               <td>
                  <label for="inputEmail">Ponto de referência</label>
                  <input type="text" class="form-control" id="inputReferencia" name="inputReferencia" placeholder="Ponto de referência">
               </td>
               <td>
                  <label for="inputEndereco">Endereço Comercial</label>
                  <input type="text" class="form-control" id="inputEnderecoComercial" name="inputEnderecoComercial" placeholder="Endereço Comercial">
               </td>
               <td>
                  <label for="inputTelefoneComercial">Telefone Comercial</label>
                  <input type="tel" class="form-control" id="inputTelefoneComercial" name="inputTelefoneComercial" maxlength="15" onkeyup="mascara( this, mtel );" placeholder="(__)___-____">
               </td>
             </tr>             <tr>
               <td colspan="3">
                  <h5 class="underline bg-secondary rounded p-2 mb-0 center">Serviços</h5>
               </td>
             </tr>
             <tr>
               <td colspan="3" class="p-0">
                  <table class="table border-0 m-0">
                     <tr>
                        <td style="width:50%" class="border-0">
                           <label for="inputServico">Serviço</label>
                           <select id="inputServico" name="inputServico" class="form-control" readon>
                              <option selected="">Selecione...</option>
                           </select>
                        </td>
                        <td style="width:25%" class="border-0">
                           <label for="inputInstituicao">Banco</label>
                           <input type="text" class="form-control" id="inputInstituicao" name="inputInstituicao" placeholder="Banco">
                        </td>
                        <td style="width:50%" class="border-0">
                           <label for="inputTipo">Tipo</label>
                           <select id="inputTipo" name="inputTipo" class="form-control" readon>
                              <option selected>Selecione...</option>
                              <option value="Financiamento">Financiamento</option>
                              <option value="Empréstimo">Empréstimo</option>
                           </select>
                        </td>
                     </tr>
                  </table>
               </td>
             </tr>
             <tr>
               <td colspan="3"><h5 class="bg-secondary rounded p-2 mb-0 center">Dados do Veículo</h5></td>
             </tr>
             <tr>
               <td colspan="3" class="p-0">
                  <table class="table border-0 m-0">
                     <tr>
                        <td style="width:25%" class="border-0">
                           <label for="inputMarcaVeiculo">Marca</label>
                           <input type="text" class="form-control" id="inputMarcaVeiculo" name="inputMarcaVeiculo" placeholder="Marca">
                        </td>
                        <td style="width:35%" class="border-0">
                           <label for="inputModeloVeiculo">Modelo</label>
                           <input type="text" class="form-control" id="inputModeloVeiculo" name="inputModeloVeiculo" placeholder="Modelo">
                        </td>
                        <td style="width:15%" class="border-0">
                           <label for="inputPlacaVeiculo">Placa</label>
                           <input type="text" class="form-control" id="inputPlacaVeiculo" name="inputPlacaVeiculo" placeholder="Placa">
                        </td>
                        <td style="width:15%" class="border-0">
                           <label for="inputAnoVeiculo">Ano</label>
                           <input type="text" class="form-control" id="inputAnoVeiculo" name="inputAnoVeiculo" placeholder="Ano">
                        </td>
                     </tr>
                     <tr>
                        <td style="width:25%" class="border-0">
                           <label for="inputNumeroParcelasServico">Nº Parcelas</label>
                           <input type="number" class="form-control" id="inputNumeroParcelasServico" name="inputNumeroParcelasServico" placeholder="Nº Parcelas">
                        </td>
                        <td style="width:25%" class="border-0">
                           <label for="inputParcelaValorServico">Valor da Parcela</label>
                           <input type="text" class="form-control" id="inputParcelaValorServico" name="inputParcelaValorServico" onkeypress="mascara( this, moeda );" placeholder="Valor da Parcela">
                        </td>
                        <td style="width:25%" class="border-0">
                           <label for="inputParcelaAtrasoServico">Nº Parcelas em Atraso</label>
                           <input type="number" class="form-control" id="inputParcelaAtrasoServico" name="inputParcelaAtrasoServico" placeholder="Nº Parcelas em Atraso">
                        </td>
                     </tr>
                  </table>
               </td>
             </tr>
             <tr>
               <td colspan="3"><h5 class="underline bg-secondary rounded p-2 mb-0 center">Formas de Pagamento</h5></td>
             </tr>
             <tr>
               <td colspan="3" class="p-0">
                  <table class="table border-0 m-0">
                     <tr>
                        <td style="width:50%" class="border-0">
                           <label for="inputValor">Valor</label>
                           <input type="text" class="form-control" id="inputValor" name="inputValor" onkeypress="mascara( this, moeda );" placeholder="R$">
                        </td>
                        <td style="width:50%" class="border-0">
                           <label for="inputFormaPagamento">Forma de Pagamento</label>
                           <select id="inputFormaPagamento" name="inputFormaPagamento" class="form-control" readon>
                              <option selected="">Selecione...</option>
                           </select>
                        </td>
                     </tr>
                  </table>
               </td>
             </tr>
             <tr>
               <td colspan="3"><h5 class="underline bg-secondary rounded p-2 mb-0 center">Observação</h5></td>
             </tr>
             <tr>
               <td colspan="3">
                  <label for="inputObservacao">Observação</label>
                  <textarea class="form-control" id="inputObservacao" name="inputObservacao" rows="3" placeholder="Observação"></textarea>
               </td>
             </tr>
             <!--         
             <tr>
               <td colspan="3" class="p-0">
                  <div class="container-fluid" id="observacao"></div>
               </td>
             </tr> -->
             <tr>
               <td colspan="3" class="p-0">
                  <table class="table border-0 m-0">
                     <tr>
                        <td style="width:80%" class="border-0">
                           <label for="inputConsultor">CONSULTOR</label>
                           <input type="text" class="form-control" id="inputConsultor" name="inputConsultor" placeholder="Consultor">
                        </td>
                        <td style="width:20%" class="border-0">
                           <label for="inputTelConsultor">TELEFONE CONSULTOR</label>
                           <input type="text" class="form-control" id="inputTelConsultor" name="inputTelConsultor" maxlength="15" onkeyup="mascara( this, mtel );" placeholder="(__)___-____">
                        </td>
                     </tr>
                  </table>
               </td>
             </tr>
           </tbody>
         </table>
      </div>

      <button onclick="printPage()" class="btn btn-primary d-block mt-2 mb-2" style="margin: 0 auto;">Imprimir </button>

      <script src="https://crm.begsolucoes.com.br/js/vendor/jquery-3.3.1.min.js"></script>
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

      function printPage() {
        window.print();
      }

      if (sessionStorage.getItem("id_empresa") == 2) {
         $(".divLicence").show();
         $(".divAmerican").attr("style", "display:none;");
      }

      $.getJSON("../utils/listarServicosAtivos.php", function(data) {
         if (data != false) {
            var jsonData = data.data;
            $.each(jsonData, function(key, value) {
               $("#inputServico").append('<option value=' + value.id_servico + '>' + value.nome_servico + '</option>');
            });
         }
         $.getJSON("../utils/listarConsultoresAtivos.php", function(data) {
            if (data != false) {
               var jsonData = data.data;
               $.each(jsonData, function(key, value) {
                  $("#inputConsultor").append('<option value=' + value.id_usuario + '>' + value.nome + '</option>');
               });
            }
            $.getJSON("../utils/listarMidiasAtivas.php", function(data) {
               if (data != false) {
                  var jsonData = data.data;
                  $.each(jsonData, function(key, value) {
                     $("#inputMidia").append('<option value=' + value.id_midia + '>' + value.nome_midia + '</option>');
                  });
               }
               $.getJSON("../utils/listarFormaPagamentoAtivos.php", function(data) {
                  if (data != false) {
                     var jsonData = data.data;
                     $.each(jsonData, function(key, value) {
                        $("#inputFormaPagamento").append('<option value=' + value.id_forma_pagamento + '>' + value.nome_forma_pagamento + '</option>');
                     });
                  }
                  $.getJSON("../utils/listarFluxosAtendimento.php", function(data) {
                     if (data != false) {
                        var jsonData = data.data;
                        $.each(jsonData, function(key, value) {
                           if (value.nome != "PERCA" && value.nome != "CANCELADO") {
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
                                    console.log(data);
                                    var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;

                                    $("#inputNome").val(jsonData.cliente.nome_cliente);
                                    if (jsonData.cliente.nome_cliente != "") {
                                       $("#inputNome").attr("readonly", "true");
                                    }

                                    $("#inputEmail").val(jsonData.cliente.email);
                                    if (jsonData.cliente.email != "") {
                                       $("#inputEmail").attr("readonly", "true");
                                    }

                                    $("#inputData").val(formatarData(jsonData.dt_alteracao));
                                    if (jsonData.dt_alteracao != "") {
                                       $("#inputData").attr("readonly", "true");
                                    }

                                    // if (sessionStorage.getItem("id_empresa") != 1) {
                                    //    //$("#inputCelular").attr("readonly", "true");
                                    // }

                                    $("#inputTelefone").val(jsonData.cliente.telefone);
                                    if (jsonData.cliente.telefone != "") {
                                       $("#inputTelefone").attr("readonly", "true");
                                    }

                                    $("#inputCelular").val(jsonData.cliente.celular);
                                    if (jsonData.cliente.celular != "") {
                                       $("#inputCelular").attr("readonly","true");
                                    }

                                    // $("#inputCelular").val(jsonData.cliente.celular);
                                    // if(sessionStorage.getItem("id_empresa") != 1){
                                    //    $("#inputCelular").attr("readonly","true");
                                    // }

                                    $("#inputNascimento").val(jsonData.cliente.data_nasc);
                                    if (jsonData.cliente.data_nasc != "") {
                                       $("#inputNascimento").attr("readonly", "true");
                                    }

                                    $("#inputRg").val(jsonData.cliente.rg);
                                    if (jsonData.cliente.rg != "") {
                                       $("#inputRg").attr("readonly", "true");
                                    }

                                    if (jsonData.cliente.cpf.length > 14) {
                                       $(".labelCpf").html("CNPJ");
                                       $("#inputCpf").val(jsonData.cliente.cpf);
                                    } else {
                                       $("#inputCpf").val(jsonData.cliente.cpf);
                                    }
                                    if (jsonData.cliente.cpf != "") {
                                       $("#inputCpf").attr("readonly", "true");
                                    }

                                    $("#inputEstadoCivil").val(jsonData.cliente.estado_civil);
                                    if (jsonData.cliente.estado_civil != "") {
                                       $("#inputEstadoCivil").attr("readonly", "true");
                                    }

                                    $("#inputProfissao").val(jsonData.cliente.profissao);
                                    if (jsonData.cliente.profissao != "") {
                                       $("#inputProfissao").attr("readonly", "true");
                                    }

                                    $("#inputCep").val(jsonData.cliente.cep);
                                    if (jsonData.cliente.cep != "") {
                                       $("#inputCep").attr("readonly", "true");
                                    }

                                    $("#inputEndereco").val(jsonData.cliente.endereco);
                                    if (jsonData.cliente.endereco != "") {
                                       $("#inputEndereco").attr("readonly", "true");
                                    }

                                    $("#inputEnderecoNumero").val(jsonData.cliente.numero);
                                    if (jsonData.cliente.numero != "") {
                                       $("#inputEnderecoNumero").attr("readonly", "true");
                                    }

                                    $("#inputEnderecoComplemento").val(jsonData.cliente.complemento);
                                    if (jsonData.cliente.complemento != "") {
                                       $("#inputEnderecoComplemento").attr("readonly", "true");
                                    }

                                    $("#inputEnderecoBairro").val(jsonData.cliente.bairro);
                                    if (jsonData.cliente.bairro != "") {
                                       $("#inputEnderecoBairro").attr("readonly", "true");
                                    }

                                    $("#inputEnderecoCidade").val(jsonData.cliente.cidade);
                                    if (jsonData.cliente.cidade != "") {
                                       $("#inputEnderecoCidade").attr("readonly", "true");
                                    }

                                    $("#inputEnderecoEstado").val(jsonData.cliente.estado);
                                    if (jsonData.cliente.estado != "") {
                                       $("#inputEnderecoEstado").attr("readonly", "true");
                                    }

                                    $("#inputEnderecoUf").val(jsonData.cliente.uf);
                                    if (jsonData.cliente.uf != "") {
                                       $("#inputEnderecoUf").attr("readonly", "true");
                                    }

                                    $("#inputEnderecoComercial").val(jsonData.cliente.endereco_comercial);
                                    if (jsonData.cliente.endereco_comercial != "") {
                                       $("#inputEnderecoComercial").attr("readonly", "true");
                                    }

                                    $("#inputTelefoneComercial").val(jsonData.cliente.telefone_comercial);
                                    if (jsonData.cliente.telefone_comercial != "") {
                                       $("#inputTelefoneComercial").attr("readonly", "true");
                                    }

                                    $("#inputServico").val(jsonData.servico != "" ? jsonData.servico.id_servico : "");
                                    if (jsonData.servico != "" || jsonData.servico != "") {
                                       $('#inputServico').prop('disabled', 'disabled');
                                    }

                                    $("#inputConsultor").val(jsonData.consultor.nome);
                                    if (jsonData.cliente.nome != "") {
                                       $("#inputConsultor").attr("readonly", "true");
                                    }

                                    $("#inputMidia").val(jsonData.midia.id_midia);
                                    if (jsonData.midia.id_midia != "") {
                                       $('#inputMidia').prop('disabled', 'disabled');
                                    }

                                    if (jsonData.fluxo_atendimento.nome != "CANCELADO" && jsonData.fluxo_atendimento.nome != "PERCA" && jsonData.fluxo_atendimento.nome != "PGTO. CONFIRMADO" && jsonData.fluxo_atendimento.nome != "PGTO. ESTORNADO") {
                                       $("#inputFluxoAtendimento").val(jsonData.fluxo_atendimento.id_fluxo_atendimento);
                                    } else {
                                       $("#inputFluxoAtendimento").val("");
                                    }
                                    
                                    /*
                                    $('#inputDataAgendamento').datepicker({
                                       format: 'dd/mm/yyyy',
                                       language: 'pt-BR'
                                    });

                                    var $datepicker = $('#inputDataAgendamento');
                                    $datepicker.datepicker();
                                    $datepicker.datepicker('setDate', new Date(jsonData.dt_agendamento));
                                    */

                                    $("#inputQuantidadeServico").val(jsonData.quantidade);
                                    if (jsonData.quantidade != "") {
                                       $("#inputQuantidadeServico").attr("readonly", "true");
                                    }

                                    $("#inputMarcaVeiculo").val(jsonData.marca_veiculo);
                                    if (jsonData.marca_veiculo != "") {
                                       $("#inputMarcaVeiculo").attr("readonly", "true");
                                    }

                                    $("#inputModeloVeiculo").val(jsonData.modelo_veiculo);
                                    if (jsonData.modelo_veiculo != "") {
                                       $("#inputModeloVeiculo").attr("readonly", "true");
                                    }

                                    $("#inputAnoVeiculo").val(jsonData.ano_veiculo);
                                    if (jsonData.ano_veiculo != "") {
                                       $("#inputAnoVeiculo").attr("readonly", "true");
                                    }

                                    $("#inputAnoModeloVeiculo").val(jsonData.ano_modelo_veiculo);
                                    if (jsonData.ano_modelo_veiculo != "") {
                                       $("#inputAnoModeloVeiculo").attr("readonly", "true");
                                    }

                                    $("#inputPlacaVeiculo").val(jsonData.placa_veiculo);
                                    if (jsonData.placa_veiculo != "") {
                                       $("#inputPlacaVeiculo").attr("readonly", "true");
                                    }

                                    $("#inputNumeroParcelas").val(jsonData.numero_parcelas_financiamento);
                                    if (jsonData.numero_parcelas_financiamento != "") {
                                       $("#inputNumeroParcelas").attr("readonly", "true");
                                    }

                                    $("#inputInstituicao").val(jsonData.instituicao_financeira);
                                    if (jsonData.instituicao_financeira != "") {
                                       $("#inputInstituicao").attr("readonly", "true");
                                    }

                                    $("#inputNumeroParcelasServico").val(jsonData.numero_parcelas_servico);
                                    // if (jsonData.numero_parcelas_servico != "" || jsonData.numero_parcelas_servico == "0") {
                                    //    $("#inputNumeroParcelasServico").attr("readonly", "true");
                                    // }

                                    $("#inputParcelaValorServico").val(jsonData.valor_parcela_financiamento);
                                    // if (jsonData.valor_parcela_financiamento != "" || jsonData.valor_parcela_financiamento == "0") {
                                    //    $("#inputParcelaValorServico").attr("readonly", "true");
                                    // }
                                    
                                    $("#inputParcelaAtrasoServico").val(jsonData.numero_parcelas_servico);
                                    // if (jsonData.numero_parcelas_servico != "" || jsonData.numero_parcelas_servico == "0") {
                                    //    $("#inputParcelaAtrasoServico").attr("readonly", "true");
                                    // }

                                    $("#inputValor").val(jsonData.valor_proposta);
                                    if (jsonData.valor_proposta != "" || jsonData.valor_proposta == "0") {
                                       $("#inputValor").attr("readonly", "true");
                                    }

                                    $("#inputFormaPagamento").val(jsonData.forma_pagamento != "" ? jsonData.forma_pagamento.id_forma_pagamento : "");
                                    if (jsonData.forma_pagamento != "") {
                                       $('#inputFormaPagamento').prop('disabled', 'disabled');
                                    }

                                    /*
                                    $("#inputValorEntrada").val(jsonData.valor_entrada);
                                    $("#inputNumeroCnh").val(jsonData.cliente.cnh);
                                    $("#inputValidadeCnh").val(jsonData.cliente.validade_cnh);
                                    $("#inputCategoriaCnh").val(jsonData.cliente.categoria_cnh);
                                    $("#inputCidadeEstadoCnh").val(jsonData.cliente.cidade_estado_cnh);
                                    */

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
                                       $("#observacao").append(linha);
                                    });
                                 }
                              }
                           });
                        } else {
                           $("#inputConsultor").val(sessionStorage.getItem("id_usuario"));
                        }
                     }
                  });
               });
            });
         });
      });

      $("#inputTelefone").focusout(function() {
         if (this.value != "" && !$(this).is('[readonly]')) {
            $.ajax({
               url: '../utils/consultarDuplicidade.php',
               type: 'POST',
               data: {
                  numero: this.value,
               },
               success: function(data) {
                  if (data != "false" && data != "") {
                     var jsonData = JSON.parse(data).data;
                     $("#inputTelefone").val("");
                     alert("Telefone " + jsonData.cliente.telefone + " já cadastrado!\nAtendimento com  o consultor " + jsonData.consultor.nome + " e status " + jsonData.fluxo_atendimento.nome);
                  }
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
               success: function(data) {
                  if (data != "false" && data != "") {
                     var jsonData = JSON.parse(data).data;
                     $("#inputCelular").val("");
                     alert("Celular " + jsonData.cliente.celular + " já cadastrado!\nAtendimento com o consultor " + jsonData.consultor.nome + " e status " + jsonData.fluxo_atendimento.nome);
                  }
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
            //ConsultarCEP(cep);
         }

      });

      $("#inputFluxoAtendimento").change(function() {
         if ($("#inputFluxoAtendimento option:selected").text() == "FECHADO" || $("#inputFluxoAtendimento option:selected").text() == "FECHADO COM BOLETO") {
            if ($("#inputCpf").length < 14 && $("#inputCnpj").length < 17) {
               $("#inputCpf").prop('required', true);
            }
            $("#inputValordePagamento").prop('required', true);
            $("#inputServico").prop('required', true);
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

      function hour(v) {
         v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
         v = v.replace(/(\d{2})(\d)/, "$1:$2");
         v = v.replace(/(\d{2})(\d)/, "$1:$2");
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

      function moeda(v) {
         // v = v.replace(/\D/g, "") //permite digitar apenas números
         // let num = parseInt(v);
         // let text = num.toLocaleString("en-US", {style:"currency", currency:"USD"});
         // return text;
         return v;
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
         var linha = 
            '<div class="row">' +
            '<div class="container-fluid pt-1">' +
            '<span class="h6">' + item.usuario.nome + '</span>' +
            '<span class="text-extra-small text-muted pr-1">  ' + formatarData(item.dt_inclusao) + '</span>' +
            '<span class="text-extra-small text-muted pr-1">  ' + formatarHora(item.dt_inclusao) + '</span>' +
            '<p class=font-weight-normal><em>' + item.observacao + '</p></em>' +
            '</div>' +
            '</div>';

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
