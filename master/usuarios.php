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
               <h1>Usuários</h1>
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
                     <h5 class="card-title">Consultar Usuário</h5>
                     <div clas="row">
                        <div class="input-group">
                           <input type="text" class="form-control" aria-label="Text input with dropdown button" id="inputBusca" placeholder="Insira um Nome ou Email">
                           <div class="input-group-append">
                              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pesquisar por</button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1261px, 42px, 0px); top: 0px; left: 0px; will-change: transform;">
                                 <a class="dropdown-item" href="#" onclick="procurar(1);">Nome</a>
                                 <a class="dropdown-item" href="#" onclick="procurar(2);">Email</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row div-input-insert">

                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-12 col-xl-4 form-cadastro">
               <div class="row">
                  <div class="col-md-12 mb-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Novo Usuário</h5>
                           <div class="dashboard-quick-post">
                              <form method="post" action="../utils/incluirUsuario.php">
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="nome">Nome</label>
                                       <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="email">Email</label>
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="telefone">Telefone</label>
                                       <input type="tel" class="form-control" id="telefone" name="telefone" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="(__)____-____" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="vendedor">Perfil</label>
                                       <select class="form-control select-perfil" id="perfil" name="perfil" required>
                                          <option value="">Selecione...</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <div class="col-6">
                                       <label class="field__label" for="email">Senha</label>
                                       <input type="password" class="form-control" id="senha" name="senha" alt="Sua senha" value="" onchange='check_pass();' required>
                                    </div>
                                    <div class="col-6">
                                       <label class="field__label" for="inputPassword4">Confirmar Senha</label>
                                       <input type="password" class="form-control" id="inputPasswordConfirmacao" placeholder="Confirmar Senha" onchange='check_pass();'>
                                       <span id='message'></span>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary d-block mt-3 btn-salvar">Criar</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-12 col-xl-4 form-alteracao" style="display:none;">
               <div class="row">
                  <div class="col-md-12 mb-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="card-title">Editar Usuário</h5>
                           <div class="dashboard-quick-post">
                              <form method="post" action="../utils/atualizarUsuario.php">
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="nome">Nome</label>
                                       <input type="text" class="form-control" id="nomeEditar" name="nomeEditar" placeholder="Nome" required>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="email">Email</label>
                                       <input type="email" class="form-control" id="emailEditar" name="emailEditar" placeholder="Email" required>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="telefone">Telefone</label>
                                       <input type="tel" class="form-control" id="telefoneEditar" name="telefoneEditar" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="(__)____-____" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="vendedor">Perfil</label>
                                       <select class="form-control select-perfil" id="perfilEditar" name="perfilEditar" name="perfil" required>
                                          <option value="">Selecione...</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <div class="col-6">
                                       <label class="field__label" for="senha">Senha</label>
                                       <input type="password" class="form-control" id="senhaEditar" name="senhaEditar" alt="Sua senha" value="" onchange='check_passEditar();'>
                                    </div>
                                    <div class="col-6">
                                       <label class="field__label" for="inputPassword4">Confirmar Senha</label>
                                       <input type="password" class="form-control" id="inputPasswordConfirmacaoEditar" placeholder="Confirmar Senha" onchange='check_passEditar();'>
                                       <span id='message'></span>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary d-block mt-3 btn-salvar">Salvar</button>
                                 <input type="hidden" id="idUsuario" name="idUsuario" value="">
                                 <input type="hidden" id="idStatus" name="idStatus" value="">
                              </form>
                           </div>
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
      $.getJSON("../utils/listarPerfis.php", function(data) {
         if (data != false) {
            var jsonData = data.data;;
            $.each(jsonData, function(key, value) {
               $(".select-perfil").append('<option value=' + value.id_perfil + '>' + value.nome_perfil + '</option>');
            });
         }
         $("#app-container").removeClass("show-spinner");
      });

      function check_pass() {
         if (document.getElementById('senha').value == document.getElementById('inputPasswordConfirmacao').value) {
            $(".btn-salvar").prop('disabled', false);
         } else {
            $(".btn-salvar").prop('disabled', true);
         }
      }

      function check_passEditar() {
         if (document.getElementById('senhaEditar').value == document.getElementById('inputPasswordConfirmacaoEditar').value) {
            $(".btn-salvar").prop('disabled', false);
         } else {
            $(".btn-salvar").prop('disabled', true);
         }
      }

      $('#senha, #inputPasswordConfirmacao').on('keyup', function() {
         if ($('#senha').val() == $('#inputPasswordConfirmacao').val()) {
            $('#message').html('').css('color', 'green');
         } else
            $('#message').html('Senhas são diferentes').css('color', 'red');
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



      function criarLinhaLista(item) {
         var linha = '<div class="col-12 list">' +
            '<div class="card d-flex flex-row mb-3 mt-3 active">' +
            '<div class="pl-2 d-flex flex-grow-1 min-width-zero">' +
            '<div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">' +
            '<a href="#" onclick="editar(' + item.id_usuario + ');" class="w-40 w-sm-100">' +
            '<p class="list-item-heading mb-1 truncate">' + item.nome + '</p>' +
            '<p class="mb-1 text-muted text-small w-14 w-sm-100">' + item.email + '</p>' +
            '</a>' +
            '<p class="mb-1 text-muted text-small w-40 w-sm-100">' + item.perfil.nome_perfil + '</p>';
         if (item.status.id_status == 1) {
            linha = linha + '<div class="w-4 w-sm-100">' +
               '<span class="badge badge-pill badge-primary">' + item.status.nome_status + '</span>' +
               '</div>' +
               '<p class="mb-1 pl-1 align-self-center pr-1">';
            if (item.perfil.id_perfil == 4) {
               linha = linha + '<a class="align-self-right pr-2" style="font-size: 18px;" title="Agenda do Consultor" href="agenda.php?idConsultor=' + item.id_usuario + '">' +
                  '<i class="simple-icon-calendar"></i>' +
                  '</a>';
            }
            linha = linha + '<a class="align-self-right pr-2" style="font-size: 18px;" title="Editar" href="#" onclick="editar(' + item.id_usuario + ');">' +
               '<i class="simple-icon-note"></i>' +
               '</a>' +
               '<a class="align-self-right pr-2" style="font-size: 18px;" href="#" title="Desativar" onclick="mudarStatus(' + item.id_usuario + ',2);">' +
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
               '<p class="mb-1 pl-1 align-self-center pr-1">';
            if (item.perfil.id_perfil == 4) {
               linha = linha + '<a class="align-self-right pr-2" style="font-size: 18px;" title="Agenda do Consultor" href="agenda.php?idConsultor=' + item.id_usuario + '">' +
                  '<i class="simple-icon-calendar"></i>' +
                  '</a>';
            }
            linha = linha + '<a class="align-self-right pr-2" style="font-size: 18px;" title="Editar" href="#" onclick="editar(' + item.id_usuario + ');">' +
               '<i class="simple-icon-note"></i>' +
               '</a>' +
               '<a class="align-self-right pr-2" style="font-size: 18px;" href="#" title="Ativar" onclick="mudarStatus(' + item.id_usuario + ',1);">' +
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

      function editar(idUsuario) {
         $.ajax({
            url: '../utils/consultarUsuarioPorId.php',
            type: 'POST',
            data: {
               idUsuario: idUsuario
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data).data;

                  $("#nomeEditar").val(jsonData.nome);
                  $("#emailEditar").val(jsonData.email);
                  $("#telefoneEditar").val(jsonData.telefone);
                  $(".select-perfil").val(jsonData.perfil.id_perfil);
                  $("#idUsuario").val(jsonData.id_usuario);
                  $("#idStatus").val(jsonData.status.id_status);

                  $(".form-alteracao").show();
                  $(".form-cadastro").hide();
               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
      }

      function procurar(tipo) {
         var valorBusca = $("#inputBusca").val();
         window.location = "?search=" + valorBusca + "&tipo=" + tipo;
      }

      if (getUrlParameter("search") && getUrlParameter("tipo")) {
         $.ajax({
            url: '../utils/consultarUsuarioPor.php',
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
                     $(".div-input-insert").append(linha);
                  });
               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
      } else {
         $("#app-container").addClass("show-spinner");
         $.getJSON("../utils/listarUsuarios.php", function(data) {
            if (data != false) {
               var jsonData = data.data;
               $.each(jsonData, function(key, value) {
                  var linha = criarLinhaLista(value);
                  $(".div-input-insert").append(linha);
               });
            }
            $("#app-container").removeClass("show-spinner");
         });
      }

      function mudarStatus(idUsuario, idStatus) {
         $.ajax({
            url: '../utils/alterarStatusUsuario.php',
            type: 'POST',
            data: {
               idStatus: idStatus,
               idUsuario: idUsuario
            },
            beforeSend: function() {
					$("#app-container").addClass("show-spinner");
				},
            success: function(msg) {
               location.reload();
            }
         });
      }

      if (getUrlParameter('falha') && getUrlParameter('tipo')) {
         switch (getUrlParameter('falha')) {
            case 'true':
               if (getUrlParameter('tipo') == "update") {
                  $.notify({
                     // options
                     message: 'Erro ao atualizar o <strong>Usuário!</strong>'
                  }, {
                     // settings
                     type: 'danger'
                  });
               } else if (getUrlParameter('tipo') == "create") {
                  $.notify({
                     // options
                     message: 'Erro ao cadastar o <strong>Usuário!</strong>'
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
                     message: 'Usuário atualizado com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'success'
                  });
               } else if (getUrlParameter('tipo') == "create") {
                  $.notify({
                     // options
                     message: 'Usuário cadastrado com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'success'
                  });
               }
               break;
         }
      }
   </script>
</body>

</html>