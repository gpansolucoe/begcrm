<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gpan Sistemas - Percas</title>
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
                        <h1>Validar Atendimentos</h1>

                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">validar atendimentos</li>
                            </ol>
                        </nav>

                    </div>

                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
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
        <div class="modal fade" id="modalPerca" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="../utils/aprovarAtendimento.php">
                        <div class="modal-body">
                            <p>Maravilha, esta é a ultima etapa do atendimento! Antes de liber o acesso ao cliente, valide todas as informações obrigatorias e em seguinda
                                clique em aprovar atendimento.</p>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="hidden" id="idAtendimento" name="idAtendimento" class="idAtendimento" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Aprovar Atendimento</button>
                        </div>
                    </form>
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


        $.ajax({
            url: '../utils/listarClientesPendentes.php',
            type: 'POST',
            data: {
                fluxoAtendimento: "PERCA"
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
                validarMensagens();
            }
        });

        function exibirMotivo(textoMotivo) {
            $("#motivoPercaTexto").text(textoMotivo);
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
                '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-clock"></i> ' + formatarData(item.dt_inclusao) + '</p>' +
                '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-calendar"></i> ' + formatarData(item.dt_agendamento) + '</p>' +
                '<div class="w-15 w-sm-100">' +
                '<span class="badge badge-pill badge-primary">' + item.fluxo_atendimento.nome + '</span>' +
                '</div>' +
                '</div>' +
                '<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">' +
                '<div class="btn-group">';
            linha = linha + '<a class="dropdown-item" href="#" onclick="setIdAtendimento(' + item.id_atendimento + ');" data-toggle="modal" data-target="#modalPerca"><i class="iconsminds-inbox"></i> Aprovar Atendimento</a>';
            linha = linha + '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            return linha;


        }

        function validarMensagens() {

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
                                message: 'Erro ao aprovar o  <strong>Atendimento!</strong>'
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
                                message: 'Atendimento aprovado com <strong>Sucesso!</strong>'
                            }, {
                                // settings
                                type: 'success'
                            });
                        }
                        break;
                }
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

        function setCancelarAtendimento(idAtendimento) {
            $(".idAtendimento").val(idAtendimento);
            $(".fluxoAtendimento").val("CANCELADO")
        }

        function setIdAtendimento(idAtendimento) {
            $(".idAtendimento").val(idAtendimento);
        }
    </script>
</body>

</html>