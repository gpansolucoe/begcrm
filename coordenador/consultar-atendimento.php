<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gpan Sistemas - Dashboard</title>
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
                        <h1>Consultar Atendimento</h1>

                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Consultar Atendimento</li>
                            </ol>
                        </nav>

                    </div>

                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputBusca" value="" aria-label="Text input with dropdown button" placeholder="Insira um Telefone, Celular, CPF ou CNPJ">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pesquisar por</button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1261px, 42px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="#" onclick="procurar(1);">Telefone/Celular</a>
                                <a class="dropdown-item" href="#" onclick="procurar(3);">CPF / CPNJ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 list resultado-consulta" style="height: 400px;overflow: auto">


                    <!--<nav class="mt-4 mb-3">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item ">
                                <a class="page-link first" href="#">
                                    <i class="simple-icon-control-start"></i>
                                </a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link prev" href="#">
                                    <i class="simple-icon-arrow-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link next" href="#" aria-label="Next">
                                    <i class="simple-icon-arrow-right"></i>
                                </a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link last" href="#">
                                    <i class="simple-icon-control-end"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>-->

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

        if (getUrlParameter("search") && getUrlParameter("tipo")) {
            $.ajax({
                url: '../utils/consultarAtendimentoPor.php',
                type: 'POST',
                data: {
                    tipo: getUrlParameter("tipo"),
                    valor: getUrlParameter("search")
                },
                beforeSend: function() {
                    $("#app-container").addClass("show-spinner");
                },
                success: function(data) {
                    if (data != false) {
                        var jsonData = JSON.parse(data).data;
                        $.each(jsonData, function(key, value) {
                            var linha = criarLinhaLista(value);
                            $(".resultado-consulta").append(linha);
                        });
                    }
                },
                complete: function(data) {
                    $("#app-container").removeClass("show-spinner");
                }
            });
        } else {
            $("#app-container").addClass("show-spinner");
            $.getJSON("../utils/listarAtendimentosTop50.php", function(data) {
                if (data != false) {
                    var jsonData = data.data;

                    $.each(jsonData, function(key, value) {
                        var linha = criarLinhaLista(value);
                        $(".resultado-consulta").append(linha);
                    });
                }
                $("#app-container").removeClass("show-spinner");
            });
        }

        function procurar(tipo) {
            var valorBusca = "";
            switch (tipo) {
                case 1:
                    if ($("#inputBusca").val().length == 11) {
                        valorBusca = $("#inputBusca").val().replace(/(\d{2})(\d{5})(\d{3})/, '($1) $2-$3');
                    } else if ($("#inputBusca").val().length == 10) {
                        valorBusca = $("#inputBusca").val().replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
                    } else {
                        valorBusca = $("#inputBusca").val();
                    }
                    break;
                case 2:
                    if ($("#inputBusca").val().length == 11) {
                        valorBusca = $("#inputBusca").val().replace(/(\d{2})(\d{5})(\d{3})/, '($1) $2-$3');
                    } else if ($("#inputBusca").val().length == 10) {
                        valorBusca = $("#inputBusca").val().replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
                    } else {
                        valorBusca = $("#inputBusca").val();
                    }
                    break;
                case 3:
                    const CPF_LENGTH = 11;
                    const cnpjCpf = $("#inputBusca").val().replace(/\D/g, '');

                    if (cnpjCpf.length === CPF_LENGTH) {
                        valorBusca = cnpjCpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, "\$1.\$2.\$3-\$4");
                    } else {
                        valorBusca = cnpjCpf.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g, "\$1.\$2.\$3/\$4-\$5");
                    }

                    break;
            }
            window.location = "?search=" + valorBusca + "&tipo=" + tipo;
        }

        function criarLinhaLista(item) {
            var linha = '<div class="card d-flex flex-row mb-3">' +
                '<div class="pl-2 d-flex flex-grow-1 min-width-zero">' +
                '<div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">' +
                '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '" class="w-40 w-sm-100">' +
                '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
                '</a>' +
                '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</p>' +
                '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</p>' +
                '<p class="mb-1 text-muted text-medium w-40 w-sm-100"><i class="simple-icon-people"></i> ' + item.consultor.nome + '</p>' +
                '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="iconsminds-newspaper"></i> ' + item.midia.nome_midia + '</p>' +
                '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-clock"></i> ' + formatarData(item.dt_inclusao) + '</p>' +
                '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-calendar"></i> ' + formatarData(item.dt_agendamento) + '</p>' +
                '<div class="w-15 w-sm-100">' +
                '<span class="badge badge-pill badge-primary">' + item.fluxo_atendimento.nome + '</span>' +
                '</div>' +
                '</div>'

                +
                '<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">' +
                '<div class="btn-group">' +
                '<a  href="#"  class="mb-1 dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="simple-icon-menu"></i></a>' +
                '<div class="dropdown-menu dropdown-menu-right">' +
                '<a class="dropdown-item" href="editar-atendimento.php?atdid=' + item.id_atendimento + '">Editar</a>';
            if (item.fluxo_atendimento.nome != "CANCELADO") {
                linha = linha + '<a class="dropdown-item" href="#" onclick="setCancelarAtendimento(' + item.id_atendimento + ');" data-toggle="modal" data-target="#modalCancelar">Cancelar</a>';
            }
            if (item.fluxo_atendimento.nome != "PERCA" && item.fluxo_atendimento.nome != "CANCELADO") {
                linha = linha + '<a class="dropdown-item" href="#" onclick="setPercaAtendimento(' + item.id_atendimento + ');" data-toggle="modal" data-target="#modalPerca">Perca</a>';
            }
            linha = linha + '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            return linha;


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
    </script>
</body>

</html>