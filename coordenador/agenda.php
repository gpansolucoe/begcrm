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
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <h1>Agenda</h1>
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Agenda</li>
                            </ol>
                        </nav>

                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="agenda fc fc-bootstrap4 fc-ltr">
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

        if (getUrlParameter("idConsultor")) {
            $.ajax({
                url: '../utils/consultarAgendaConsultor.php',
                type: 'POST',
                data: {
                    idConsultor: getUrlParameter("idConsultor")
                },
                beforeSend: function() {
                    $("#app-container").addClass("show-spinner");
                },
                success: function(data) {
                    if (data != false) {
                        var jsonData = JSON.parse(data).data;
                        var events = [];
                        $.each(jsonData, function(key, value) {

                            events.push({
                                title: value.nome,
                                start: formatarData(value.dt_agendamento),
                                url: 'editar-atendimento.php?atdid=' + value.id_atendimento
                            });

                        });

                        if ($().fullCalendar) {
                            var testEvent = new Date(new Date().setHours(new Date().getHours()));
                            var day = testEvent.getDate();
                            var month = testEvent.getMonth() + 1;


                            $(".agenda").fullCalendar({
                                themeSystem: "bootstrap4",
                                locale: 'pt-br',
                                height: "auto",
                                buttonText: {
                                    today: "Hoje",
                                    month: "Mês",
                                    week: "Semana",
                                    day: "Dia",
                                    list: "Lista"
                                },
                                bootstrapFontAwesome: {
                                    prev: " simple-icon-arrow-left",
                                    next: " simple-icon-arrow-right",
                                    prevYear: "simple-icon-control-start",
                                    nextYear: "simple-icon-control-end"
                                },
                                events: events,
                            });
                        }

                    }
                },
                complete: function(data) {
                    $("#app-container").removeClass("show-spinner");
                }
            });
        }

        function formatarData(data) {
            const date = new Date(data);

            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();

            const formatted = `${year}-${month}-${day}`;

            return formatted;
        }
    </script>
</body>

</html>