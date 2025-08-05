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
                        <h1>Listar Atendimentos</h1>

                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="#">Atendimentos</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Listar Atendimentos</li>
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
                                    <label>Filtro de Status</label>
                                    <select class="form-control select2-multiple select2-hidden-accessible" multiple="" id="selectFluxoAtendimento" name="fluxoAtendimento[]" tabindex="-1" aria-hidden="true">
                                        <optgroup id="inputFluxoAtendimento" label="STATUS">
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
                                        <input type="text" class="input-sm form-control" id="dataFim" name="dataFim" placeholder="Fim" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#" onclick="gerarRelatorio();" class="btn btn-primary" id="successButton">
                                        <span class="label">Consultar</span>
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

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="data-table-features" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Telefone</th>
                                                <th>Celular</th>
                                                <th>Serviço</th>
                                                <th>Status</th>
                                                <th>Valor Proposta</th>
                                                <th>Consultor</th>
                                                <th>Data Inclusão</th>
                                                <th>Data Agendamento</th>
                                                <th>Ferramentas</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Telefone</th>
                                                <th>Celular</th>
                                                <th>Serviço</th>
                                                <th>Status</th>
                                                <th>Valor Proposta</th>
                                                <th>Consultor</th>
                                                <th>Data Inclusão</th>
                                                <th>Data Agendamento</th>
                                                <th>Ferramentas</th>
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
        $.getJSON("../utils/listarFluxosAtendimento.php", function(data) {
            if (data != false) {
                var jsonData = data.data;
                $.each(jsonData, function(key, value) {
                    $("#inputFluxoAtendimento").append('<option value=' + value.id_fluxo_atendimento + '>' + value.nome + '</option>');
                });
            }
            $("#app-container").removeClass("show-spinner");
        });


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


        function gerarRelatorio() {
            if(validarData()){
                $.ajax({
                url: '../utils/listarAtendimentoConsultorEntreOsDias.php',
                type: 'POST',
                data: {
                    fluxoAtendimento: $("#selectFluxoAtendimento").val(),
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
                        "data": JSON.parse(data).data,
                        columns: [{
                                "data": "cliente.nome_cliente",
                                "render": function(data, type, row) {
                                    return '<a href="editar-atendimento.php?atdid=' + row.id_atendimento + '">' + data + '</a>'
                                }
                            },
                            {
                                "data": "cliente.telefone"
                            },
                            {
                                "data": "cliente.celular"
                            },
                            {
                                "data": "servico.nome_servico",
                                "render": function(data, type, row) {
                                    return data != null ? data : "";
                                }
                            },
                            {
                                "data": "fluxo_atendimento.nome",
                                "render": function(data, type, row) {
                                    return data != null ? data : "";
                                }
                            },
                            {
                                "data": "valor_proposta",
                                "render": function(data, type, row) {
                                    if (data != 0 && data != null) {
                                        return data; //.toLocaleString('pt-br', {
                                        //style: 'currency',
                                        //currency: 'BRL'
                                        //});
                                    } else {
                                        return "0" //.toLocaleString('pt-br', {
                                        //style: 'currency',
                                        //currency: 'BRL'
                                        // });
                                    }
                                }
                            },
                            {
                                "data": "consultor.nome"
                            },
                            {
                                "data": "dt_inclusao",
                                "render": function(data, type, row) {
                                    return formatarData(data) + " " + formatarHora(data);
                                }
                            },
                            {
                                "data": "dt_agendamento",
                                "render": function(data, type, row) {
                                    return formatarData(data) + " " + formatarHora(data);
                                }
                            },
                            {
                                "data": "id_atendimento",
                                "render": function(data, type, row) {
                                    return '<a href="editar-atendimento.php?atdid=' + data + '">Editar</a>'
                                }
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