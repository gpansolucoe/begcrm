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
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="mb-4">Relatório Quantidade Lead Entrada</h5>
                            <div class="row" style="margin-top: 95px;">
                                <div class="col-sm-10">
                                    <label>Data</label>
                                    <div class="input-daterange input-group mb-4 w-40 pt-40" id="datepicker">
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
                            <div class="row relatorio-automatico">

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
                                                <th>Midia</th>
                                                <th>Quantidade</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Midia</th>
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


        var rootStyle = getComputedStyle(document.body);

        var primaryColor = rootStyle.getPropertyValue("--primary-color").trim();
        var separatorColor = rootStyle.getPropertyValue("--separator-color").trim();
        var foregroundColor = rootStyle.getPropertyValue("--foreground-color").trim();


        var themeColor1 = rootStyle.getPropertyValue("--theme-color-1").trim();
        var themeColor2 = rootStyle.getPropertyValue("--theme-color-2").trim();
        var themeColor3 = rootStyle.getPropertyValue("--theme-color-3").trim();
        var themeColor4 = rootStyle.getPropertyValue("--theme-color-4").trim();
        var themeColor5 = rootStyle.getPropertyValue("--theme-color-5").trim();
        var themeColor6 = rootStyle.getPropertyValue("--theme-color-6").trim();
        var themeColor1_10 = rootStyle
            .getPropertyValue("--theme-color-1-10")
            .trim();
        var themeColor2_10 = rootStyle
            .getPropertyValue("--theme-color-2-10")
            .trim();
        var themeColor3_10 = rootStyle
            .getPropertyValue("--theme-color-3-10")
            .trim();
        var themeColor4_10 = rootStyle
            .getPropertyValue("--theme-color-4-10")
            .trim();

        var themeColor5_10 = rootStyle
            .getPropertyValue("--theme-color-5-10")
            .trim();
        var themeColor6_10 = rootStyle
            .getPropertyValue("--theme-color-6-10")
            .trim();

        var primaryColor = rootStyle.getPropertyValue("--primary-color").trim();
        var foregroundColor = rootStyle
            .getPropertyValue("--foreground-color")
            .trim();
        var separatorColor = rootStyle.getPropertyValue("--separator-color").trim();

        var centerTextPlugin = {
            afterDatasetsUpdate: function(chart) {},
            beforeDraw: function(chart) {
                var width = chart.chartArea.right;
                var height = chart.chartArea.bottom;
                var ctx = chart.chart.ctx;
                ctx.restore();

                var activeLabel = chart.data.labels[0];
                var activeValue = chart.data.datasets[0].data[0];
                var dataset = chart.data.datasets[0];
                var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                var total = meta.total;

                var activePercentage = parseFloat(
                    ((activeValue / total) * 100).toFixed(1)
                );
                activePercentage = chart.legend.legendItems[0].hidden ?
                    0 :
                    activePercentage;

                if (chart.pointAvailable) {
                    activeLabel = chart.data.labels[chart.pointIndex];
                    activeValue =
                        chart.data.datasets[chart.pointDataIndex].data[chart.pointIndex];

                    dataset = chart.data.datasets[chart.pointDataIndex];
                    meta = dataset._meta[Object.keys(dataset._meta)[0]];
                    total = meta.total;
                    activePercentage = parseFloat(
                        ((activeValue / total) * 100).toFixed(1)
                    );
                    activePercentage = chart.legend.legendItems[chart.pointIndex].hidden ?
                        0 :
                        activePercentage;
                }

                ctx.font = "36px" + " Nunito, sans-serif";
                ctx.fillStyle = primaryColor;
                ctx.textBaseline = "middle";

                var text = activePercentage + "%",
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;
                ctx.fillText(text, textX, textY);

                ctx.font = "14px" + " Nunito, sans-serif";
                ctx.textBaseline = "middle";

                var text2 = activeLabel,
                    textX = Math.round((width - ctx.measureText(text2).width) / 2),
                    textY = height / 2 - 30;
                ctx.fillText(text2, textX, textY);

                ctx.save();
            },
            beforeEvent: function(chart, event, options) {
                var firstPoint = chart.getElementAtEvent(event)[0];

                if (firstPoint) {
                    chart.pointIndex = firstPoint._index;
                    chart.pointDataIndex = firstPoint._datasetIndex;
                    chart.pointAvailable = true;
                }
            }
        };

        Chart.defaults.global.defaultFontFamily = "'Nunito', sans-serif";

        Chart.defaults.LineWithShadow = Chart.defaults.line;
        Chart.controllers.LineWithShadow = Chart.controllers.line.extend({
            draw: function(ease) {
                Chart.controllers.line.prototype.draw.call(this, ease);
                var ctx = this.chart.ctx;
                ctx.save();
                ctx.shadowColor = "rgba(0,0,0,0.15)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 10;
                ctx.responsive = true;
                ctx.stroke();
                Chart.controllers.line.prototype.draw.apply(this, arguments);
                ctx.restore();
            }
        });

        Chart.defaults.BarWithShadow = Chart.defaults.bar;
        Chart.controllers.BarWithShadow = Chart.controllers.bar.extend({
            draw: function(ease) {
                Chart.controllers.bar.prototype.draw.call(this, ease);
                var ctx = this.chart.ctx;
                ctx.save();
                ctx.shadowColor = "rgba(0,0,0,0.15)";
                ctx.shadowBlur = 12;
                ctx.shadowOffsetX = 5;
                ctx.shadowOffsetY = 10;
                ctx.responsive = true;
                Chart.controllers.bar.prototype.draw.apply(this, arguments);
                ctx.restore();
            }
        });

        Chart.defaults.LineWithLine = Chart.defaults.line;
        Chart.controllers.LineWithLine = Chart.controllers.line.extend({
            draw: function(ease) {
                Chart.controllers.line.prototype.draw.call(this, ease);

                if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
                    var activePoint = this.chart.tooltip._active[0];
                    var ctx = this.chart.ctx;
                    var x = activePoint.tooltipPosition().x;
                    var topY = this.chart.scales["y-axis-0"].top;
                    var bottomY = this.chart.scales["y-axis-0"].bottom;

                    ctx.save();
                    ctx.beginPath();
                    ctx.moveTo(x, topY);
                    ctx.lineTo(x, bottomY);
                    ctx.lineWidth = 1;
                    ctx.strokeStyle = "rgba(0,0,0,0.1)";
                    ctx.stroke();
                    ctx.restore();
                }
            }
        });

        Chart.defaults.DoughnutWithShadow = Chart.defaults.doughnut;
        Chart.controllers.DoughnutWithShadow = Chart.controllers.doughnut.extend({
            draw: function(ease) {
                Chart.controllers.doughnut.prototype.draw.call(this, ease);
                let ctx = this.chart.chart.ctx;
                ctx.save();
                ctx.shadowColor = "rgba(0,0,0,0.15)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 10;
                ctx.responsive = true;
                Chart.controllers.doughnut.prototype.draw.apply(this, arguments);
                ctx.restore();
            }
        });

        Chart.defaults.PieWithShadow = Chart.defaults.pie;
        Chart.controllers.PieWithShadow = Chart.controllers.pie.extend({
            draw: function(ease) {
                Chart.controllers.pie.prototype.draw.call(this, ease);
                let ctx = this.chart.chart.ctx;
                ctx.save();
                ctx.shadowColor = "rgba(0,0,0,0.15)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 10;
                ctx.responsive = true;
                Chart.controllers.pie.prototype.draw.apply(this, arguments);
                ctx.restore();
            }
        });

        Chart.defaults.ScatterWithShadow = Chart.defaults.scatter;
        Chart.controllers.ScatterWithShadow = Chart.controllers.scatter.extend({
            draw: function(ease) {
                Chart.controllers.scatter.prototype.draw.call(this, ease);
                let ctx = this.chart.chart.ctx;
                ctx.save();
                ctx.shadowColor = "rgba(0,0,0,0.2)";
                ctx.shadowBlur = 7;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 7;
                ctx.responsive = true;
                Chart.controllers.scatter.prototype.draw.apply(this, arguments);
                ctx.restore();
            }
        });

        Chart.defaults.RadarWithShadow = Chart.defaults.radar;
        Chart.controllers.RadarWithShadow = Chart.controllers.radar.extend({
            draw: function(ease) {
                Chart.controllers.radar.prototype.draw.call(this, ease);
                let ctx = this.chart.chart.ctx;
                ctx.save();
                ctx.shadowColor = "rgba(0,0,0,0.2)";
                ctx.shadowBlur = 7;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 7;
                ctx.responsive = true;
                Chart.controllers.radar.prototype.draw.apply(this, arguments);
                ctx.restore();
            }
        });

        Chart.defaults.PolarWithShadow = Chart.defaults.polarArea;
        Chart.controllers.PolarWithShadow = Chart.controllers.polarArea.extend({
            draw: function(ease) {
                Chart.controllers.polarArea.prototype.draw.call(this, ease);
                let ctx = this.chart.chart.ctx;
                ctx.save();
                ctx.shadowColor = "rgba(0,0,0,0.2)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetX = 5;
                ctx.shadowOffsetY = 10;
                ctx.responsive = true;
                Chart.controllers.polarArea.prototype.draw.apply(this, arguments);
                ctx.restore();
            }
        });

        var chartTooltip = {
            backgroundColor: foregroundColor,
            titleFontColor: primaryColor,
            borderColor: separatorColor,
            borderWidth: 0.5,
            bodyFontColor: primaryColor,
            bodySpacing: 10,
            xPadding: 15,
            yPadding: 15,
            cornerRadius: 0.15,
            displayColors: false
        };



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
            // if (validarData()) {

            $.ajax({
                url: '../utils/relatorioQuantidadeMidiasEntrada.php',
                type: 'POST',
                data: {
                    dataIni: $('input[name=dataInicio]').val(),
                    dataFim: $('input[name=dataFim]').val(),
                },
                beforeSend: function() {
                    //$("#app-container").addClass("show-spinner");
                },
                cache: false,
                success: function(data) {
                    validNavigation = true;
                    if (data != false) {
                        $(".relatorio-automatico").children().eq(0).remove()
                        popularGrafico(data);
                        $(".data-table-features").dataTable().fnDestroy();
                        $('.data-table-features').DataTable({
                            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
                            dom: 'Bfrtip',
                            buttons: ["copy", "excel", "csv", "pdf", "print"],
                            "data": JSON.parse(data).data,
                            columns: [{
                                    "data": "nome_midia"
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
                    }
                },
                complete: function(data) {
                    $("#app-container").removeClass("show-spinner");
                },
                timeout: 60000
            });

            // }
        }



        function popularGrafico(data) {

            data = JSON.parse(data);
            // var midiasDuplicadas = data.data.map(function(e) {
            //     return e.nome_midia;
            // });
            //
            // var midias = [];
            // $.each(midiasDuplicadas, function(i, el) {
            //     if ($.inArray(el, midias) === -1) midias.push(el);
            // });


            // var numeroRelatorios = midias.length();


            //  $.each(midias, function(i, el) {
            var labels = [];
            var quantidade = [];
            var soma = 0;

            $.each(data.data, function(index, valor) {
                labels.push(valor.nome_midia);
                quantidade.push(valor.quantidade);
                soma = soma + parseInt(valor.quantidade);
            });

            inserirRelatorioHTML("TOTAL: " + soma, 1);


            if (document.getElementById(1)) {
                var productChart = document
                    .getElementById(1)
                    .getContext("2d");
                var myChart = new Chart(productChart, {
                    type: "BarWithShadow",
                    options: {
                        scaleShowValues: true,
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: true,
                                    lineWidth: 1,
                                    color: "rgba(0,0,0,0.1)",
                                    drawBorder: false
                                },
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 2000,
                                    min: 0,
                                    max: Math.max.apply(null, quantidade),
                                    padding: 1
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    autoSkip: false
                                }
                            }]
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 10,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: labels,
                        datasets: [{
                            label: ["Valor"],
                            borderColor: themeColor1,
                            backgroundColor: themeColor1_10,
                            data: quantidade,
                            borderWidth: 2
                        }]
                    },
                });
            }

            //   });



        }

        Array.prototype.max = function() {
            return Math.max.apply(null, this);
        };

        Array.prototype.min = function() {
            return Math.min.apply(null, this);
        };


        function inserirRelatorioHTML(nomeRelatorio, index) {
            $(".relatorio-automatico").append("<div class=\"col-lg-12 mb-5\">" +
                "<h6 class=\"mb-4 text-center\">" + nomeRelatorio + "</h6>" +
                "<div class=\"chart-container chart\">" +
                "<canvas id=\"" + index + "\"></canvas>" +
                "</div>" +
                "</div>");
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