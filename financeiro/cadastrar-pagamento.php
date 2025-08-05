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
                            <h5 class="underline mb-3">Cadastrar Pagamento</h5>
                            <form method="post" action="../utils/incluirPagamento.php">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputNome">Cliente</label>
                                        <input type="text" class="form-control" id="inputNome" name="inputNome" value="" placeholder="NOME" readonly>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="inputValorEntrada">Nº Interno</label>
                                        <input type="text" class="form-control" id="inputNumeroInterno" name="inputNumeroInterno" value="" placeholder="Nº Interno">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputNascimento">Data Pagamento</label>
                                        <input type="text" class="form-control" id="inputDataPagamento" name="inputDataPagamento" value="" maxlength="10" onkeyup="mascara( this, mdata );" placeholder="Data de Pagamento">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputNascimento">Data Pasta</label>
                                        <input type="text" class="form-control" id="inputDataPasta" name="inputDataPasta" value="" maxlength="10" onkeyup="mascara( this, mdata );" placeholder="Data da Pasta">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputValorReal">Valor Contrato</label>
                                        <input type="text" class="form-control" id="inputValorReal" name="inputValorReal" value="" placeholder="VALOR CONTRATO" readonly>
                                        <span id='msgemail'></span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputValorEntrada">Valor Entrada</label>
                                        <input type="tel" class="form-control" id="inputValorEntrada" name="inputValorEntrada" onkeyup="moeda(this);" value="" placeholder="VALOR ENTRADA" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputFormaPagamento">Forma de Pagamento</label>
                                        <select id="inputFormaPagamento" name="inputFormaPagamento" class="form-control">
                                            <option value="" selected="">Selecione...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="inputMotoboy">N.Parcelas</label>
                                        <select id="inputMotoboy" name="inputMotoboy" onchange="changeParcelas()" class="form-control">
                                            <option value="" selected="">Selecione...</option>
                                            <option value="1">1x</option>
                                            <option value="2">2x</option>
                                            <option value="3">3x</option>
                                            <option value="4">4x</option>
                                            <option value="5">5x</option>
                                            <option value="6">6x</option>
                                            <option value="7">7x</option>
                                            <option value="8">8x</option>
                                            <option value="9">9x</option>
                                            <option value="10">10x</option>
                                            <option value="11">11x</option>
                                            <option value="12">12x</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="inputCpf">Desconto Cartão</label>
                                        <input type="text" class="form-control" id="inputCartao" name="inputCartao" value="" placeholder="DESCONTO CARTÃO">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="inputCpf">Custo</label>
                                        <input type="text" class="form-control" id="inputCusto" name="inputCusto" value="" placeholder="CUSTO">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="inputCpf">Liquido</label>
                                        <input type="text" class="form-control" id="inputLiquido" name="inputLiquido" value="" placeholder="LIQUIDO">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAtendente">Consultor</label>
                                        <input type="tel" class="form-control" id="inputAtendente" name="inputAtendente" value="" placeholder="CONSULTOR" readonly>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputCep">Autenticacao</label>
                                        <input type="text" class="form-control" id="inputAutenticacao" name="inputAutenticacao" value="" placeholder="AUTENTICACAO">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputCep">Referência</label>
                                        <input type="text" class="form-control" id="inputReferencia" name="inputReferencia" value="" placeholder="REFERÊNCIA">
                                    </div>

                                </div>
                                <div class="form-row" style="display:none">
                                    <div class="form-group col-md-1">
                                        <label for="inputDinheiro">Termi/trans/cta</label>
                                        <input type="text" class="form-control" id="inputDinheiro" name="inputDinheiro" value="" placeholder="Termi/trans/cta">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputMidia">Midia</label>
                                        <input type="text" class="form-control" id="inputMidia" name="inputMidia" value="" placeholder="MÍDIA" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputServico">Serviço</label>
                                        <input type="text" class="form-control" id="inputServico" name="inputServico" value="" placeholder="SERVIÇO" readonly>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputEstado">CPF</label>
                                        <input type="text" class="form-control" id="inputCpf" name="inputCpf" value="" placeholder="CPF" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputCep">Valor que o cliente disponibilizou</label>
                                        <input type="text" class="form-control" id="inputLiberarPasta" onkeyup="moeda(this);"name="inputLiberarPasta" value="" placeholder="Valor">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="observacao">Observação</label>
                                        <textarea class="form-control" id="observacao" name="observacao" rows="5" maxlength="500"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputFormaPagamento">Comprovante : </label>
                                        <input type="file" id="imgInput" accept="image/jpeg, image/png">
                                        <input type="hidden" id="img" name="img" value="">
                                        <input type="hidden" id="inputNomeArquivo" name="inputNomeArquivo" value="">
                                    </div>
                                </div>
                                <button id="submit" type="submit" class="btn btn-primary d-block mt-3 mb-3">Salvar</button>
                                <div class="resultado-consulta" style="height: 200px; overflow-x: hidden;">

                                </div>
                                <input type="hidden" id="inputConsultor" name="inputConsultor" value="">
                                <input type="hidden" id="inputAtendimento" name="inputAtendimento" value="">
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

    $("#app-container").addClass("show-spinner");
    $.getJSON("../utils/listarFormaPagamentoAtivos.php", function(data) {
        if (data != false) {
            var jsonData = data.data;;
            $.each(jsonData, function(key, value) {
                $("#inputFormaPagamento").append('<option value=' + value.id_forma_pagamento + '>' + value.nome_forma_pagamento + '</option>');
            });
        }
        if (getUrlParameter("atdid")) {
            $("#inputAtendimento").val(getUrlParameter("atdid"));
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

                        $("#inputServico").val(jsonData.servico != "" ? jsonData.servico.nome_servico : "");
                        $("#inputAtendente").val(jsonData.consultor.nome);
                        $("#inputMidia").val(jsonData.midia.nome_midia);
                        $("#inputFormaPagamento").val(jsonData.forma_pagamento != "" ? jsonData.forma_pagamento.id_forma_pagamento : "");
                        $("#inputValorReal").val(jsonData.valor_proposta.toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }));

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
                }
            });
        } else {
            $("#inputConsultor").val(sessionStorage.getItem("id_usuario"));
            var $datepicker = $('#inputDataAgendamento');
            $datepicker.datepicker();
            $datepicker.datepicker('setDate', new Date());
        }
        $("#app-container").removeClass("show-spinner");

    });

    document.getElementById("imgInput").addEventListener("change", readFile);

    function readFile() {

        if (this.files && this.files[0]) {

            var FR = new FileReader();

            FR.addEventListener("load", function(e) {
                document.getElementById("img").value = e.target.result;
                $("#imagemEditar").attr("src", e.target.result);
            });
            document.getElementById("inputNomeArquivo").value = this.files[0].name;
            FR.readAsDataURL(this.files[0]);
        }

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
    function changeParcelas() {
        var valor = parseFloat($("#inputValorReal").val().replace("R$", "").trim());
        switch ($("#inputMotoboy").val()) {
            case "1":
                if ($("#inputFormaPagamento option:selected").text() == "Pague Seguro") {
                    $("#inputCartao").val((valor * (4 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                } else if ($("#inputFormaPagamento option:selected").text() == "Link Cielo") {
                    $("#inputCartao").val((valor * (4 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                }
                break;
            case "2":
                if ($("#inputFormaPagamento option:selected").text() == "Pague Seguro") {
                    $("#inputCartao").val((valor * (6 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                } else if ($("#inputFormaPagamento option:selected").text() == "Link Cielo") {
                    $("#inputCartao").val((valor * (12 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                }
                break;
            case "3":
                if ($("#inputFormaPagamento option:selected").text() == "Pague Seguro") {
                    $("#inputCartao").val((valor * (8 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                } else if ($("#inputFormaPagamento option:selected").text() == "Link Cielo") {
                    $("#inputCartao").val((valor * (16 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                }
                break;
            case "4":
                if ($("#inputFormaPagamento option:selected").text() == "Pague Seguro") {
                    $("#inputCartao").val((valor * (10 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                } else if ($("#inputFormaPagamento option:selected").text() == "Link Cielo") {
                    $("#inputCartao").val((valor * (20 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                }
                break;
            case "5":
                if ($("#inputFormaPagamento option:selected").text() == "Pague Seguro") {
                    $("#inputCartao").val((valor * (12 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                } else if ($("#inputFormaPagamento option:selected").text() == "Link Cielo") {
                    $("#inputCartao").val((valor * (24 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                }
                break;
            case "6":
                if ($("#inputFormaPagamento option:selected").text() == "Pague Seguro") {
                    $("#inputCartao").val(valor * (16 / 100))
                } else if ($("#inputFormaPagamento option:selected").text() == "Link Cielo") {
                    $("#inputCartao").val((valor * (26 / 100)).toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        }))
                }
                break;

        }
   
        
    }
</script>

</html>