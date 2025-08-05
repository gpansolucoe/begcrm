<?php set_time_limit(0); ?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <title>Gpan Sistemas - Telefones</title>
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
    <main class="default-transition" style="opacity: 1;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <h1>Telefones</h1>

                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="relatorio-telefone.php">Telefones</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Gerar Telefones</li>
                            </ol>
                        </nav>

                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Filtro de Mídia</label>
                                    <select class="form-control select2-multiple select2-hidden-accessible" multiple="" id="selectMidia" name="midia[]" tabindex="-1" aria-hidden="true">
                                        <optgroup id="inputMidia" label="MIDIA">
                                            <option value="0">Todos</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Filtro de Serviços</label>
                                    <select class="form-control select2-multiple select2-hidden-accessible" multiple="" id="selectServico" name="servico[]" tabindex="-1" aria-hidden="true">
                                        <optgroup id="inputServico" label="SERVIÇO">
                                            <option value="0">Todos</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Filtro de Forma de Pagamento</label>
                                    <select class="form-control select2-multiple select2-hidden-accessible" multiple="" id="selectFormaPagamento" name="formaPagamento[]" tabindex="-1" aria-hidden="true">
                                        <optgroup id="inputFormaPagamento" label="FORMA DE PAGAMENTO">
                                            <option value="0">Todos</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-4">
                                    <label>Filtro de Status</label>
                                    <select class="form-control select2-multiple select2-hidden-accessible" multiple="" id="selectFluxoAtendimento" name="fluxoAtendimento[]" tabindex="-1" aria-hidden="true">
                                        <optgroup id="inputFluxoAtendimento" label="STATUS">
                                            <option value="0">Todos</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Filtro de Consultor</label>
                                    <select class="form-control select2-multiple select2-hidden-accessible" multiple="" id="selectConsultor" name="consultor[]" tabindex="-1" aria-hidden="true">
                                        <optgroup id="inputConsultor" label="CONSULTOR">
                                            <option value="0">Todos</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-10">
                                    <label>Data</label>
                                    <div class="input-daterange input-group mb-4 w-40" id="datepicker">
                                        <input type="text" class="input-sm form-control" id="dataInicio"  name="dataInicio" placeholder="Inicio">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="input-sm form-control"  id="dataFim" name="dataFim" placeholder="Fim">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#" onclick="gerarRelatorio();" class="btn btn-primary btn-multiple-state" id="successButton">
                                        <div class="spinner d-inline-block">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                        </div>
                                        <span class="icon success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Relatório Gerado" aria-describedby="tooltip100028">
                                            <i class="simple-icon-check"></i>
                                        </span>
                                        <span class="icon fail" data-toggle="tooltip" data-placement="top" title="" data-original-title="Oops, ocorreu um erro...">
                                            <i class="simple-icon-exclamation"></i>
                                        </span>
                                        <span class="label">Gerar Relatório</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="linha-relatorio" style="display:none;">
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                            <div class="row">
                                <div class="col-sm-12 p-4">
                                    <button onclick="copyToClipboard('output')" class="btn btn-primary btn-multiple-state my-4 d-none">Copie os telefones</button>
                                     <div id="total"></div>
				     <div id="output"></div>
                                    <button onclick="copyToClipboard('output')" class="btn btn-primary btn-multiple-state my-4 d-none">Copie os telefones</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include_once('../imports/scripts-footer.php');
    ?>
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
                    var jsonData = data.data;;
                    $.each(jsonData, function(key, value) {
                        $("#inputConsultor").append('<option value=' + value.id_usuario + '>' + value.nome + '</option>');
                    });
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
                                    $("#inputFluxoAtendimento").append('<option value=' + value.id_fluxo_atendimento + '>' + value.nome + '</option>');
                                });
                            }
                        });
                    });
                });
            });
            $("#app-container").removeClass("show-spinner");
        });

        function formatarData(data) {
            const date = new Date(data);

            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();

            const formatted = `${day}/${month}/${year}`;

            return formatted;
        }

        function setCancelarAtendimento(idAtendimento) {
            $(".idAtendimento").val(idAtendimento);
            $(".fluxoAtendimento").val("CANCELADO")
        }

        function setPercaAtendimento(idAtendimento) {
            $(".idAtendimento").val(idAtendimento);
            $(".fluxoAtendimento").val("PERCA");
        }

        function validarData(){
            var data1Split = $("#dataInicio").val().split("/");
            var data2Split = $("#dataInicio").val().split("/");
            var date1  = toDate($("#dataInicio").val());
            var date2 = toDate($("#dataFim").val());

            if(calcula(date1,date2) > 31 || date2 == "Invalid Date" || date1 == "Invalid Date"){
                $("#dataFim").datepicker('setDate', null);
                alert("Permitido apenas consultas de no máximo 31 dias");
                return false;
            }else{
                return true;
            }
        }

        function toDate(dateStr) {
            var parts = dateStr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        }

        function calcula(data1, data2){
            data1 = new Date(data1);
            data2 = new Date(data2);
        return (data2 - data1)/(1000*3600*24);
        }

        function gerarRelatorio() {

            if(validarData()){
                $.ajax({
                url: '../utils/listarAtendimentoEntreOsDias.php',
                type: 'POST',
                data: {
                    midia: $("#selectMidia").val(),
                    servico: $("#selectServico").val(),
                    formaPagamento: $("#selectFormaPagamento").val(),
                    fluxoAtendimento: $("#selectFluxoAtendimento").val(),
                    consultor: $("#selectConsultor").val(),
                    dataIni: $('input[name=dataInicio]').val(),
                    dataFim: $('input[name=dataFim]').val(),

                },
                beforeSend: function() {
                    $("#app-container").addClass("show-spinner");
                },
                cache: false,
                success: function(data) {
                    validNavigation = true;

                // Filtra os telefones do json que vem completo
                var json = JSON.parse(data);

                let output = "";
		let total = "";
                for (var key in json.data) {
		    total = key;
                    //output += json.data[key].telefone.slice(0, 4) + '9' + json.data[key].telefone.slice(4) + ", ";
		    output += "55" + json.data[key].telefone.slice(0, 4) + '9' + json.data[key].telefone.slice(4) + ",<br>";
                }
                //output = output.replaceAll(" ", "").slice(0, -1);
		output = output.replaceAll(/[()-\s+]+/g, "").slice(0, -1);

                // Mostra os resultados
		$('#total').html( "<p>Foram encontrados <b>" + (total > 0 ? total : 0)  + "</b> telefones</p>" );
                $('#output').html(output);
                $("#linha-relatorio").show();

                },
                complete: function(data) {
                    $("#app-container").removeClass("show-spinner");
                },
                timeout: 30000
            });
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
            const date = new Date(data);
            const time = date.toLocaleTimeString(navigator.language, {
                hour: '2-digit',
                minute: '2-digit',
                seconds: '2-digit'
            });

            return time;
        }
        function copyToClipboard(elementId) {

          // Create a "hidden" input
          var aux = document.createElement("input");

          // Assign it the value of the specified element
          aux.setAttribute("value", document.getElementById(elementId).innerHTML);

          // Append it to the body
          document.body.appendChild(aux);

          // Highlight its content
          aux.select();

          // Copy the highlighted text
          document.execCommand("copy");

          // Remove it from the body
          document.body.removeChild(aux);

        }
    </script>
</body>
</html>
