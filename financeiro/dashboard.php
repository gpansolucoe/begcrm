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
               <h1>Dashboard</h1>
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
                     <h5 class="card-title">Leads Novos</h5>
                     <div clas="row">
                        <div id="accordion">

                           <div class="">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                 Pagamentos Confirmados - <span id="quantidadeEmail"></span>
                              </button>

                              <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                                 <div class="resultado-consulta-com-comprovante">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="accordion2" style="display:none;">
                           <div class="">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 Pendente Aprovação - <span id="quantidadeAprovacao"></span>
                              </button>
                              <div id="collapseFour" class="collapse" data-parent="#accordion">
                                 <div class="resultado-consulta-aprovacao">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                  </button>
               </div>
               <form method="post" action="../utils/incluirMotivoAtendimento.php">
                  <div class="modal-body">
                     <p>Você tem certeza que gostaria de <strong>cancelar</strong> esse Atendimento?<br>Antes de conluir o cancelamento o <strong>coordenador</strong> irá precisar aprovar a solicitação.</p>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="motivoCancelamento">Motivo do cancelamento</label>
                           <input type="hidden" id="idAtendimento" name="idAtendimento" value="">
                           <input type="hidden" id="fluxoAtendimento" name="fluxoAtendimento" value="">
                           <textarea class="form-control" id="motivo" name="motivo" rows="5" required></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                     <button type="submit" class="btn btn-primary">Quero Cancelar</button>
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

      // $("#app-container").addClass("show-spinner");
      // $.getJSON("../utils/listarMidiasAtivas.php", function(data) {
      //    if (data != false) {
      //       var jsonData = data.data;;
      //       $.each(jsonData, function(key, value) {
      //          $("#midia").append('<option value=' + value.id_midia + '>' + value.nome_midia + '</option>');
      //       });
      //    }
      //    $.getJSON("../utils/listarConsultoresAtivos.php", function(data) {
      //       if (data != false) {
      //          var jsonData = data.data;
      //          $.each(jsonData, function(key, value) {
      //             $("#consultor").append('<option value=' + value.id_usuario + '>' + value.nome + '</option>');
      //          });
      //       }
      //       $.getJSON("../utils/listarFluxosAtendimento.php", function(data) {
      //          if (data != false) {
      //             var jsonData = data.data;
      //             $.each(jsonData, function(key, value) {
      //                if (value.nome == "HOT LEAD") {
      //                   $("#statusAtendimento").append('<option value=' + value.id_fluxo_atendimento + '>' + value.nome + '</option>');
      //                }
      //             });
      //          }
      //       });
      //
      //    });
      //    $("#app-container").removeClass("show-spinner");
      // });




      $("#telefone").focusout(function() {
         if (this.value != "") {
            $.ajax({
               url: '../utils/consultarDuplicidade.php',
               type: 'POST',
               data: {
                  numero: this.value,
               },
               beforeSend: function() {
                  $("#app-container").addClass("show-spinner");
               },
               success: function(data) {
                  if (data != "false" && data != "") {
                     var jsonData = JSON.parse(data).data;
                     $("#telefone").val("");
                     alert("Telefone " + jsonData.cliente.telefone + " já cadastrado!\nAtendimento com  o consultor " + jsonData.consultor.nome + " e status " + jsonData.fluxo_atendimento.nome);
                  }
               },
               complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
               }
            });
         } else {
            $("#btnSalvar").show();
         }
      });

      $("#celular").focusout(function() {
         if (this.value != "") {
            $.ajax({
               url: '../utils/consultarDuplicidade.php',
               type: 'POST',
               data: {
                  numero: this.value,
               },
               beforeSend: function() {
                  $("#app-container").addClass("show-spinner");
               },
               success: function(data) {
                  if (data != "false" && data != "") {
                     var jsonData = JSON.parse(data).data;
                     $("#celular").val("");
                     alert("Celular " + jsonData.cliente.celular + " já cadastrado!\nAtendimento com o consultor " + jsonData.consultor.nome + " e status " + jsonData.fluxo_atendimento.nome);
                  }
               },
               complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
               }
            });
         } else {
            $("#btnSalvar").show();
         }
      });


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

      if (getUrlParameter('usrid')) {
         sessionStorage.setItem('id_usuario', getUrlParameter('usrid'));
      }
      if (getUrlParameter('emp')) {
         sessionStorage.setItem('id_empresa', getUrlParameter('emp'));
      }

      if (getUrlParameter('prf')) {
         sessionStorage.setItem('id_perfil', getUrlParameter('prf'));
      }
      if (sessionStorage.getItem('id_perfil') != 8) {
         $("#accordion").show();
         $("#accordion2").hide();
      }else{
         $("#accordion2").show();
         $("#accordion").hide();
      }
      consultarLeads();

      function consultarLeads() {
         $(".resultado-consulta-com-comprovante").children().remove();
         $(".resultado-consulta-fechados").children().remove();
         $(".resultado-consulta-fechados-boleto").children().remove();
         $(".resultado-consulta-aprovacao").children().remove();
         if (sessionStorage.getItem('id_perfil') != 8) {
            $.ajax({
               url: '../utils/listarPagamentoComprovanteUsuario.php',
               type: 'POST',
               beforeSend: function() {
                  $("#app-container").addClass("show-spinner");
               },
               success: function(data) {
                  if (data != false) {
                     var contador = 0;
                     var jsonData = JSON.parse(data).data;
                     $.each(jsonData, function(key, value) {
                        contador = contador + 1;
                        var linha = criarLinhaLista(value);
                        $(".resultado-consulta-com-comprovante").append(linha);
                     });
                     $("#quantidadeEmail").text(contador);
                  }
                  $.ajax({
                     url: '../utils/listarAtendimentoFechadoSemComprovante.php',
                     type: 'POST',
                     success: function(data) {
                        if (data != false) {
                           var contador = 0;
                           var jsonData = JSON.parse(data).data;
                           $.each(jsonData, function(key, value) {
                              contador = contador + 1;
                              var linha = criarLinhaLista(value);
                              $(".resultado-consulta-fechados").append(linha);
                           });
                           $("#quantidadeNeurologic").text(contador);
                        }
                        $.ajax({
                           url: '../utils/listarAtendimentoFechadoComBoletoSemComprovante.php',
                           type: 'POST',
                           success: function(data) {
                              if (data != false) {
                                 var contador = 0;
                                 var jsonData = JSON.parse(data).data;
                                 $.each(jsonData, function(key, value) {
                                    contador = contador + 1;
                                    var linha = criarLinhaLista(value);

                                    $(".resultado-consulta-fechados-boleto").append(linha);
                                 });
                                 $("#quantidadeFacebook").text(contador);
                              }
                           }
                        });
                     }
                  });
               },
               complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
               }
            });
         } else {
            $.ajax({
               url: '../utils/listarPagamosSemAprovacaoEmpresa.php',
               type: 'POST',
               success: function(data) {
                  if (data != false) {
                     var contador = 0;
                     var jsonData = JSON.parse(data).data;
                     $.each(jsonData, function(key, value) {
                        contador = contador + 1;
                        var linha = criarLinhaListaInicial(value);

                        $(".resultado-consulta-aprovacao").append(linha);
                     });
                     $("#quantidadeAprovacao").text(contador);
                  }
               }
            });
         }

      }

      function criarLinhaLista(item) {
         var linha = '<div class="col-12 list">' +
            '<div class="card d-flex flex-row mb-3 mt-3 active">' +
            '<div class="pl-2 d-flex flex-grow-1 min-width-zero">' +
            '<div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">' +
            '<a href="editar-pagamento.php?atdid=' + item.id_atendimento + '&pgtid='+ item.id_pagamento + '" class="w-40 w-sm-100">' +
            '<p class="list-item-heading mb-1 truncate"> ' + item.nome + '</p>' +
            '</a>' +
            '<p class="mb-1 text-muted text-small w-20 w-sm-100"><i class="simple-icon-phone"></i> ' + item.telefone + '</p>' +
            '<p class="mb-1 text-muted text-small w-20 w-sm-100"><i class="simple-icon-screen-smartphone"></i> ' + item.celular + '</p>' +
            '<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">' +
            '<div class="btn-group">';
         if (sessionStorage.getItem('id_perfil') != 8) {
            linha = linha + '<a class="dropdown-item" href=editar-pagamento.php?atdid=' + item.id_atendimento + '&pgtid='+ item.id_pagamento + '>Validar Pagamento</a>';
         } else {
            linha = linha + '<a class="dropdown-item" href="cadastrar-pagamento.php?atdid=' + item.id_atendimento + '" >Aprovar</a>';
         }
         linha = linha + '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

         return linha;
      }

      function criarLinhaListaInicial(item) {
         var linha = '<div class="col-12 list">' +
            '<div class="card d-flex flex-row mb-3 mt-3 active">' +
            '<div class="pl-2 d-flex flex-grow-1 min-width-zero">' +
            '<div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">' +
            '<a href="aprovar-pagamento.php?atdid=' + item.atendimento.id_atendimento + '&pgtid='+ item.id_pagamento + '" class="w-40 w-sm-100">' +
            '<p class="list-item-heading mb-1 truncate"> ' + item.atendimento.cliente.nome_cliente + '</p>' +
            '</a>' +
            '<p class="mb-1 text-muted text-small w-20 w-sm-100"><i class="simple-icon-phone"></i> ' + item.atendimento.cliente.telefone + '</p>' +
            '<p class="mb-1 text-muted text-small w-20 w-sm-100"><i class="simple-icon-screen-smartphone"></i> ' + item.atendimento.cliente.celular + '</p>' +
            '<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">' +
            '<div class="btn-group">';
         linha = linha + '<a class="dropdown-item" href="aprovar-pagamento.php?atdid=' + item.atendimento.id_atendimento + '&pgtid='+ item.id_pagamento + '" >Aprovar</a>';
         linha = linha + '</div>' +
            '</div>' +
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
         $("#idAtendimento").val(idAtendimento);
         $("#fluxoAtendimento").val("CANCELADO")
      }

      function editarAtendimento(idAtendimento) {
         $.ajax({
            url: '../utils/consultarAtendimentoPorId.php',
            type: 'POST',
            data: {
               idAtendimento: idAtendimento,
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "false" && data != "") {
                  var jsonData = JSON.parse(data).data;
                  $("#nome").val(jsonData.cliente.nome_cliente);
                  $("#email").val(jsonData.cliente.email);
                  $("#telefone").val(jsonData.cliente.telefone);
                  $("#celular").val(jsonData.cliente.celular);
                  $.ajax({
                     url: '../utils/listarObservacao.php',
                     type: 'POST',
                     data: {
                        idAtendimento: idAtendimento,
                     },
                     beforeSend: function() {
                        $("#app-container").addClass("show-spinner");
                     },
                     success: function(data) {
                        if (data != "false" && data != "") {
                           var jsonData = JSON.parse(data).data;
                           if (jsonData.length > 0) {
                              $("#observacao").val(jsonData[0].observacao.replaceAll("<p>", ""));
                           }
                           $(".box-editar").show();
                        }
                     },
                     complete: function(data) {
                        $("#app-container").removeClass("show-spinner");
                     }
                  });
                  $(".box-editar").show();
               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
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
                     message: 'Erro ao cadastar o <strong>Pagamento!</strong>'
                  }, {
                     // settings
                     type: 'danger'
                  });
               } else if (getUrlParameter('tipo') == "cancel") {
                  $.notify({
                     // options
                     message: 'Erro ao solicitar o cancelamento do <strong>Atendimento</strong>'
                  }, {
                     // settings
                     type: 'danger'
                  });
               } else if (getUrlParameter('tipo') == "perfil") {
                  $.notify({
                     // options
                     message: 'Erro ao atualizar seu <strong>Perfil</strong>'
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
                     message: 'Pagamento cadastrado com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'success'
                  });
               } else if (getUrlParameter('tipo') == "cancel") {
                  $.notify({
                     // options
                     message: 'Solicitação de cancelamento enviada com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'danger'
                  });
               } else if (getUrlParameter('tipo') == "perfil") {
                  $.notify({
                     // options
                     message: 'Perfil atualizado com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'danger'
                  });
               }
               break;
         }
      }

      //setInterval(() => consultarLeads(), 30000);
   </script>
</body>

</html>