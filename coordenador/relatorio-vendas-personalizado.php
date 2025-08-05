<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gpan Sistemas - Relatórios</title>
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
                        <h1>Gerar Relatório</h1>

                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="#">Relatórios</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Gerar relatório</li>
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
                                        <input type="text" class="input-sm form-control" id="dataInicio" name="dataInicio" placeholder="Inicio">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="input-sm form-control" id="dataFim" name="dataFim" placeholder="Fim">
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
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <button type="button" onclick="$('.buttons-excel').click()" class="btn btn-success btn-labeled">EXCEL <span class="btn-label btn-label-right"><i class="iconsminds-download-1"></i></span></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="data-table-features" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Serviço</th>
                                                <th>Midia</th>
                                                <th>Valor Total</th>
                                                <th>Quantidade</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Serviço</th>
                                                <th>Midia</th>
                                                <th>Valor Total</th>
                                                <th>Quantidade</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="tableConsulta">

                                        </tbody>
                                    </table>
                                </div>
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

        function validarData() {
            var data1Split = $("#dataInicio").val().split("/");
            var data2Split = $("#dataInicio").val().split("/");
            var date1 = toDate($("#dataInicio").val());
            var date2 = toDate($("#dataFim").val());

            if (calcula(date1, date2) > 31 || date2 == "Invalid Date" || date1 == "Invalid Date") {
                $("#dataFim").datepicker('setDate', null);
                alert("Permitido apenas consultas de no máximo 31 dias");
                return false;
            } else {
                return true;
            }
        }

        function toDate(dateStr) {
            var parts = dateStr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        }

        function calcula(data1, data2) {
            data1 = new Date(data1);
            data2 = new Date(data2);
            return (data2 - data1) / (1000 * 3600 * 24);
        }

        function gerarRelatorio() {
            if (validarData()) {
                $.ajax({
                    url: '../utils/relatorioVendasConsultor.php',
                    type: 'POST',
                    data: {
                        midia: $("#selectMidia").val(),
                        servico: $("#selectServico").val(),
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
                        $(".data-table-features").dataTable().fnDestroy();
                        $('.data-table-features').DataTable({
                            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
                            dom: 'Bfrtip',
                            buttons: ["copy", "excel", "csv", "pdf", "print"],
                            "data": JSON.parse(data).data,
                            columns: [{
                                    "data": "nome_consultor"
                                },
                                {
                                    "data": "nome_servico"
                                },
                                {
                                    "data": "nome_midia"
                                },
                                {
                                    "data": "valor_total"
                                },
                                {
                                    "data": "quantidade"
                                }
                            ],
                            drawCallback: function() {
                                $($(".dataTables_wrapper .pagination li:first-of-type"))
                                    .find("a")
                                    .addClass("prev");
                                $($(".dataTables_wrapper .pagination li:last-of-type"))
                                    .find("a")
                                    .addClass("next");

                                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
                            },
                            language: {
                                paginate: {
                                    previous: "<i class='simple-icon-arrow-left'></i>",
                                    next: "<i class='simple-icon-arrow-right'></i>"
                                },
                                search: "_INPUT_",
                                searchPlaceholder: "Procurar...",
                                lengthMenu: "Itens por pagina _MENU_"
                            },
                        });

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
    </script>
</body>

</html>