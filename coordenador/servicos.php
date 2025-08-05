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
   <main>
      <div class="container-fluid">
         <div class="row  ">
            <div class="col-12">
               <h1>Serviços</h1>
               <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                  <ol class="breadcrumb pt-0">
                     <li class="breadcrumb-item active" aria-current="page">Home</li>
                  </ol>
               </nav>
               <div class="separator mb-5"></div>
            </div>
            <div class="col-xl-8 col-lg-12 mb-4">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12 div-input-insert">
                           <form method="post" action="../utils/incluirServico.php">
                              <div class="input-group list">
                                 <input type="text" class="form-control typeahead" name="nome" id="query" placeholder="Adicionar novo serviço" autocomplete="off">
                                 <div class="input-group-append ">
                                    <button type="submit" class="btn btn-primary default p-1 pl-3 pr-3 pt-2"> + </button>
                                 </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-12 mb-4 form-alteracao" style="display:none;">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-12">
                        <h3>Editar</h3>
                        <form method="post" action="../utils/atualizarServico.php">
                           <div class="input-group list">
                              <input type="text" class="form-control typeahead" name="nomeAlteracao" id="nomeAlteracao" placeholder="Nome do Serviço" autocomplete="off">
                              <input type="hidden" name="idServico" id="idServico" value="">
                              <input type="hidden" name="idStatus" id="idStatus" value="">
                           </div>
                           <button type="submit" class="btn btn-primary default p-1 pl-3 pr-3 pt-2 mt-4">Salvar</button>
                        </form>
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

      if (getUrlParameter('falha') && getUrlParameter('tipo')) {
         switch (getUrlParameter('falha')) {
            case 'true':
               if (getUrlParameter('tipo') == "update") {
                  $.notify({
                     // options
                     message: 'Erro ao atualizar o <strong>Serviço!</strong>'
                  }, {
                     // settings
                     type: 'danger'
                  });
               } else if (getUrlParameter('tipo') == "create") {
                  $.notify({
                     // options
                     message: 'Erro ao cadastar o <strong>Serviço!</strong>'
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
                     message: 'Serviço atualizado com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'success'
                  });
               } else if (getUrlParameter('tipo') == "create") {
                  $.notify({
                     // options
                     message: 'Serviço atualizado com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'success'
                  });
               }
               break;
         }
      }
      $("#app-container").addClass("show-spinner");
      $.getJSON("../utils/listarServicos.php", function(data) {
         if (data != false) {
            var jsonData = data.data;;
            $.each(jsonData, function(key, value) {
               var linha = criarLinhaLista(value);
               $(".div-input-insert").after(linha);
            });
         }
         $("#app-container").removeClass("show-spinner");
      });

      function criarLinhaLista(item) {
         var linha = '<div class="col-12 list">' +
            '<div class="card d-flex flex-row mb-3 mt-3 active">' +
            '<div class="pl-2 d-flex flex-grow-1 min-width-zero">' +
            '<div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">' +
            '<a href="#" onclick="editar(' + item.id_servico + ');" class="w-40 w-sm-100">' +
            '<p class="list-item-heading mb-1 truncate">' + item.nome_servico + '</p>' +
            '</a>';
         if (item.status.id_status == 1) {
            linha = linha + '<div class="w-4 w-sm-100">' +
               '<span class="badge badge-pill badge-primary">' + item.status.nome_status + '</span>' +
               '</div>' +
               '<p class="mb-1 pl-1 align-self-center pr-1">' +
               '<a class="align-self-right pr-2" style="font-size: 18px;" title="Editar" href="#" onclick="editar(' + item.id_servico + ');">' +
               '<i class="simple-icon-note"></i>' +
               '</a>' +
               '<a class="align-self-right pr-2" style="font-size: 18px;" href="#" title="Desativar" onclick="mudarStatus(' + item.id_servico + ',2);">' +
               '<i class="simple-icon-control-pause"></i>' +
               '</a>' +
               '</p>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
         } else {
            linha = linha + '<div class="w-4 w-sm-100">' +
               '<span class="badge badge-pill badge-secondary">' + item.status.nome_status + '</span>' +
               '</div>' +
               '<p class="mb-1 pl-1 align-self-center pr-1">' +
               '<a class="align-self-right pr-2" style="font-size: 18px;" title="Editar" href="#" onclick="editar(' + item.id_servico + ');">' +
               '<i class="simple-icon-note"></i>' +
               '</a>' +
               '<a class="align-self-right pr-2" style="font-size: 18px;" href="#" title="Ativar" onclick="mudarStatus(' + item.id_servico + ',1);">' +
               '<i class="simple-icon-control-play"></i>' +
               '</a>' +
               '</p>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
         }

         return linha;
      }

      function editar(idServico) {
         $.ajax({
            url: '../utils/consultarServicoPorId.php',
            type: 'POST',
            data: {
               idServico: idServico
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data).data;
                  $("#nomeAlteracao").val(jsonData.nome_servico);
                  $("#idServico").val(jsonData.id_servico);
                  $("#idStatus").val(jsonData.status.id_status);
                  $(".form-alteracao").show();
               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
      }

      function mudarStatus(IdServico, idStatus) {
         $.ajax({
            url: '../utils/alterarStatusServico.php',
            type: 'POST',
            data: {
               idStatus: idStatus,
               IdServico: IdServico
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(msg) {
               location.reload();
            }
         });
      }
   </script>
</body>

</html>