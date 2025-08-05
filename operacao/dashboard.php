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
                                 EMAIL - <span id="quantidadeEmail"></span>
                              </button>

                              <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                                 <div class="resultado-consulta-email">
                                 </div>
                              </div>
                           </div>

                           <div class="">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 NEUROLOGIC - <span id="quantidadeNeurologic"></span>
                              </button>
                              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                 <div class="resultado-consulta-neurologic">
                                 </div>
                              </div>
                           </div>
                           <div class="">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 FACEBOOK - <span id="quantidadeFacebook"></span>
                              </button>
                              <div id="collapseThree" class="collapse" data-parent="#accordion">
                                 <div class="resultado-consulta-facebook">
                                 </div>
                              </div>
                           </div>
                           <div class="">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 GOOGLE MOB - <span id="quantidadeGoogle"></span>
                              </button>
                              <div id="collapseFour" class="collapse" data-parent="#accordion">
                                 <div class="resultado-consulta-google">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-12 col-xl-4">
               <div class="row box-editar" style="display: none;">
                  <div class="col-md-12 mb-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Aprovar Lead</h5>
                           <div class="dashboard-quick-post">
                              <form method="post" action="../utils/atualizarAtendimentoBasico.php">
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="nome">Nome</label>
                                       <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="email">Email</label>
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="telefone">Telefone</label>
                                       <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="Telefone" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="celular">Celular</label>
                                       <input type="text" class="form-control" id="celular" name="celular" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="Celular">
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="vendedor">Consultor</label>
                                       <select class="form-control" id="consultor" name="consultor" required>
                                          <option value="">Selecione...</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="midia">Mídia</label>
                                       <select class="form-control" id="midia" name="midia" required>
                                          <option value="">Selecione...</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12" style="display:none;">
                                       <label for="vendedor">Status</label>
                                       <select class="form-control" id="statusAtendimento" name="statusAtendimento">
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="observacao">Observação</label>
                                       <textarea class="form-control" id="observacao" name="observacao" maxlength="500" rows="5"></textarea>
                                    </div>
                                 </div>
                                 <input type="hidden" class="form-control" id="idCliente" name="idCliente" placeholder="Email">
                                 <button type="submit" id="submit" class="btn btn-primary d-block mt-3">Aprovar</button>
                              </form>
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

      $("#app-container").addClass("show-spinner");
      $.getJSON("../utils/listarMidiasAtivas.php", function(data) {
         if (data != false) {
            var jsonData = data.data;;
            $.each(jsonData, function(key, value) {
               $("#midia").append('<option value=' + value.id_midia + '>' + value.nome_midia + '</option>');
            });
         }
         $.getJSON("../utils/listarConsultoresAtivos.php", function(data) {
            if (data != false) {
               var jsonData = data.data;
               $.each(jsonData, function(key, value) {
                  $("#consultor").append('<option value=' + value.id_usuario + '>' + value.nome + '</option>');
               });
            }
            $.getJSON("../utils/listarFluxosAtendimento.php", function(data) {
               if (data != false) {
                  var jsonData = data.data;
                  $.each(jsonData, function(key, value) {
                     if (value.nome == "HOT LEAD") {
                        $("#statusAtendimento").append('<option value=' + value.id_fluxo_atendimento + '>' + value.nome + '</option>');
                     }
                  });
               }
            });

         });
         $("#app-container").removeClass("show-spinner");
      });




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

      consultarLeads();

      function consultarLeads() {
         $(".resultado-consulta-email").children().remove();
         $(".resultado-consulta-neurologic").children().remove();
         $(".resultado-consulta-facebook").children().remove();
         $(".resultado-consulta-google").children().remove();
         $.ajax({
            url: '../utils/listarAtendimentosConsultor.php',
            type: 'POST',
            data: {
               origem: "email",
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != false) {
                  var contador = 0;
                  var jsonData = JSON.parse(data).data;
                  $.each(jsonData, function(key, value) {
                     if (value.nome_fluxo_atendimento == "HOT LEAD") {
                        contador = contador + 1;
                        var linha = criarLinhaLista(value);
                        $(".resultado-consulta-email").append(linha);
                     }

                  });
                  $("#quantidadeEmail").text(contador);
               }
               $.ajax({
                  url: '../utils/listarAtendimentosConsultor.php',
                  type: 'POST',
                  data: {
                     origem: "neurologic",
                  },
                  success: function(data) {
                     if (data != false) {
                        var contador = 0;
                        var jsonData = JSON.parse(data).data;
                        $.each(jsonData, function(key, value) {
                           if (value.nome_fluxo_atendimento == "HOT LEAD") {
                              contador = contador + 1;
                              var linha = criarLinhaLista(value);
                              $(".resultado-consulta-neurologic").append(linha);
                           }

                        });
                        $("#quantidadeNeurologic").text(contador);
                     }
                     $.ajax({
                        url: '../utils/listarAtendimentosConsultor.php',
                        type: 'POST',
                        data: {
                           origem: "facebook",
                        },
                        success: function(data) {
                           if (data != false) {
                              var contador = 0;
                              var jsonData = JSON.parse(data).data;
                              $.each(jsonData, function(key, value) {
                                 if (value.nome_fluxo_atendimento == "HOT LEAD") {
                                    contador = contador + 1;
                                    var linha = criarLinhaLista(value);
                                    $(".resultado-consulta-facebook").append(linha);
                                 }

                              });
                              $("#quantidadeFacebook").text(contador);
                           }
                           $.ajax({
                              url: '../utils/listarAtendimentosConsultor.php',
                              type: 'POST',
                              data: {
                                 origem: "google",
                              },
                              success: function(data) {
                                 if (data != false) {
                                    var contador = 0;
                                    var jsonData = JSON.parse(data).data;
                                    $.each(jsonData, function(key, value) {
                                       if (value.nome_fluxo_atendimento == "HOT LEAD") {
                                          contador = contador + 1;
                                          var linha = criarLinhaLista(value);
                                          $(".resultado-consulta-google").append(linha);
                                       }

                                    });
                                    $("#quantidadeGoogle").text(contador);
                                 }
                              }
                           });
                        }
                     });
                  }
               });
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });


      }

      function criarLinhaLista(item) {
         var linha = '<div class="col-12 list">' +
            '<div class="card d-flex flex-row mb-3 mt-3 active">' +
            '<div class="pl-2 d-flex flex-grow-1 min-width-zero">' +
            '<div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">' +
            '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '" class="w-40 w-sm-100">' +
            '<p class="list-item-heading mb-1 truncate"> ' + item.nome_cliente + '</p>' +
            '</a>' +
            '<p class="mb-1 text-muted text-small w-20 w-sm-100"><i class="simple-icon-phone"></i> ' + item.telefone + '</p>' +
            '<p class="mb-1 text-muted text-small w-20 w-sm-100"><i class="simple-icon-screen-smartphone"></i> ' + item.celular + '</p>' +
            '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-clock"></i> ' + formatarData(item.dt_inclusao) + '</p>' +
            '<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">' +
            '<div class="btn-group">';
         if (item.nome_fluxo_atendimento != "CANCELADO") {
            linha = linha + '<a class="dropdown-item" href="#" onclick="setCancelarAtendimento(' + item.id_atendimento + ');" data-toggle="modal" data-target="#exampleModal">Cancelar</a>';
         }
         linha = linha + '<a class="dropdown-item" href="#" onclick="editarAtendimento(' + item.id_atendimento + ');">Aprovar</a>';
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
                     message: 'Erro ao cadastar o <strong>Atendimento!</strong>'
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
                     message: 'Atendimento cadastrado com <strong>Sucesso!</strong>'
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