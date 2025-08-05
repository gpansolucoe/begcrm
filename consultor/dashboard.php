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
         <div class="row">
            <div class="col-12">
               <div class="mb-3">
                  <h1>Dashboard</h1>
                  <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                     <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                           <a href="#">Dashboard</a>
                        </li>
                     </ol>
                  </nav>

               </div>

               <div class="mb-2">
                  <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                     Display Options
                     <i class="simple-icon-arrow-down align-middle"></i>
                  </a>
                  <div class="collapse d-md-block" id="displayOptions">
                     <span class="mr-3 mb-2 d-inline-block float-md-left">
                        <a href="#" onClick="alterarParaLista();" class="mr-2 view-icon linkLista">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                              <path class="view-icon-svg" d="M17.5,3H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z"></path>
                              <path class="view-icon-svg" d="M3,2V3H1V2H3m.12-1H.88A.87.87,0,0,0,0,1.88V3.12A.87.87,0,0,0,.88,4H3.12A.87.87,0,0,0,4,3.12V1.88A.87.87,0,0,0,3.12,1Z"></path>
                              <path class="view-icon-svg" d="M3,9v1H1V9H3m.12-1H.88A.87.87,0,0,0,0,8.88v1.24A.87.87,0,0,0,.88,11H3.12A.87.87,0,0,0,4,10.12V8.88A.87.87,0,0,0,3.12,8Z"></path>
                              <path class="view-icon-svg" d="M3,16v1H1V16H3m.12-1H.88a.87.87,0,0,0-.88.88v1.24A.87.87,0,0,0,.88,18H3.12A.87.87,0,0,0,4,17.12V15.88A.87.87,0,0,0,3.12,15Z"></path>
                              <path class="view-icon-svg" d="M17.5,10H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z"></path>
                              <path class="view-icon-svg" d="M17.5,17H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z"></path>
                           </svg>
                        </a>
                        <a href="#" onClick="alterarParaBlocos();" class="mr-2 view-icon linkBloco">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                              <path class="view-icon-svg" d="M7,2V8H1V2H7m.12-1H.88A.87.87,0,0,0,0,1.88V8.12A.87.87,0,0,0,.88,9H7.12A.87.87,0,0,0,8,8.12V1.88A.87.87,0,0,0,7.12,1Z"></path>
                              <path class="view-icon-svg" d="M17,2V8H11V2h6m.12-1H10.88a.87.87,0,0,0-.88.88V8.12a.87.87,0,0,0,.88.88h6.24A.87.87,0,0,0,18,8.12V1.88A.87.87,0,0,0,17.12,1Z"></path>
                              <path class="view-icon-svg" d="M7,12v6H1V12H7m.12-1H.88a.87.87,0,0,0-.88.88v6.24A.87.87,0,0,0,.88,19H7.12A.87.87,0,0,0,8,18.12V11.88A.87.87,0,0,0,7.12,11Z"></path>
                              <path class="view-icon-svg" d="M17,12v6H11V12h6m.12-1H10.88a.87.87,0,0,0-.88.88v6.24a.87.87,0,0,0,.88.88h6.24a.87.87,0,0,0,.88-.88V11.88a.87.87,0,0,0-.88-.88Z"></path>
                           </svg>
                        </a>
                     </span>
                     <div class="d-block d-md-inline-block">

                     </div>

                  </div>
               </div>
               <div class="separator mb-5"></div>
            </div>
         </div>
         <div class="row blocos" style="display:none;">
            <div class="col-xl-2 col-lg-12">
               <div class="row">
                  <div class="col-12">
                     <div class="coluna-status pl-2 pr-2 pt-2" style="border: 1px solid #d7d7d7;">
                        <h5 class="card-title"><span class="quantidade1"></span> HOT LEAD</h5>
                        <div class="etapa1">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-2 col-lg-12">
               <div class="row">
                  <div class="col-12">
                     <div class="coluna-status pl-2 pr-2 pt-2" style="border: 1px solid #d7d7d7;">
                        <h5 class="card-title"><span class="quantidade3"></span> SEM CONTATO</h5>
                        <div class="etapa3">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-2 col-lg-12">
               <div class="row">
                  <div class="col-12">
                     <div class="coluna-status pl-2 pr-2 pt-2" style="border: 1px solid #d7d7d7;">
                        <h5 class="card-title"><span class="quantidade2"></span> EM ATENDIMENTO</h5>
                        <div class="etapa2">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-2 col-lg-12">
               <div class="row">
                  <div class="col-12">
                     <div class="coluna-status pl-2 pr-2 pt-2" style="border: 1px solid #d7d7d7;">
                        <h5 class="card-title"><span class="quantidade4"></span> PROPOSTA<br><span class="text-muted text-small primary"> Valor Total: <span class="totalProposta"></span></span></h5>
                        <div class="etapa4">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-2 col-lg-12">
               <div class="row">
                  <div class="col-12">
                     <div class="coluna-status pl-2 pr-2 pt-2" style="border: 1px solid #d7d7d7;">
                        <h5 class="card-title"><span class="quantidade5"></span> FECHADO COM BOLETO<br><span class="text-muted text-small primary"> Valor Total: <span class="totalFechadoComBoleto"></span></span></h5>
                        <div class="etapa5">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-2 col-lg-12">
               <div class="row">
                  <div class="col-12">
                     <div class="coluna-status pl-2 pr-2 pt-2" style="border: 1px solid #d7d7d7;">
                        <h5 class="card-title"><span class="quantidade6"></span> FECHADO<br><span class="text-muted text-small primary"> Valor Total: <span class="totalFechado"></span></span></h5>
                        <div class="etapa6">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row lista">
            <div class="col-xl-12 col-lg-12 border">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <span class="quantidade1"></span> HOT LEAD
               </button>

               <div id="collapseOne" class="multi-collapse collapse" data-parent="#accordion" style="">
                  <div class="etapa1">
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 border">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  <span class="quantidade3"></span> SEM CONTATO
               </button>
               <div id="collapseThree" class="multi-collapse collapse" data-parent="#accordion">
                  <div class="etapa3">
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 mt-4 mb-4 border">
               <a class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                  <span class="quantidade7"></span> AGUARDANDO DADOS
               </a>
               <div id="collapseSeven" class="multi-collapse collapse" data-parent="#accordion">
                  <div class="etapa7">
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 border">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <span class="quantidade2"></span> EM ATENDIMENTO
               </button>
               <div id="collapseTwo" class="multi-collapse collapse" data-parent="#accordion">
                  <div class="etapa2">
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 border">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                  <span class="quantidade4"></span> PROPOSTA <span class="text-muted text-small primary"> Valor Total: <span class="totalProposta"></span></span>
               </button>

               <div id="collapseFour" class="multi-collapse collapse" data-parent="#accordion" style="">
                  <div class="etapa4">
                  </div>
               </div>
            </div>

            <div class="col-xl-12 col-lg-12 border">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                  <span class="quantidade5"></span> FECHADO COM BOLETO <span class="text-muted text-small primary"> Valor Total: <span class="totalFechadoComBoleto"></span></span>
               </button>
               <div id="collapseFive" class="multi-collapse collapse" data-parent="#accordion">
                  <div class="etapa5">
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 border">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                  <span class="quantidade6"></span> FECHADO <span class="text-muted text-small primary"> Valor Total: <span class="totalFechado"></span></span>
               </button>
               <div id="collapseSix" class="multi-collapse collapse" data-parent="#accordion">
                  <div class="etapa6">
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                           <input type="hidden" id="idAtendimento" name="idAtendimento" class="idAtendimento" value="">
                           <input type="hidden" id="fluxoAtendimento" name="fluxoAtendimento" class="fluxoAtendimento" value="">
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
      <div class="modal fade" id="modalPerca" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                     <p>Puxa que pena... Qual foi o motivo da perda do atendimento?</p>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="motivoCancelamento">Motivo da Perca</label>
                           <input type="hidden" id="idAtendimento" name="idAtendimento" class="idAtendimento" value="">
                           <input type="hidden" id="fluxoAtendimento" name="fluxoAtendimento" class="fluxoAtendimento" value="">
                           <select id="inputMotivo" name="motivo" class="form-control" required="">
                              <option value="" selected="">Selecione...</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                     <button type="submit" class="btn btn-primary">Atualizar como Perca</button>
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
      $.getJSON("../utils/listarMotivosAtivos.php", function(data) {
         if (data != false) {
            var jsonData = data.data;
            $.each(jsonData, function(key, value) {
               $("#inputMotivo").append('<option value=\"' + value.descricao + '\">' + value.descricao + '</option>');
            });
         }
      });

      if (sessionStorage.getItem("visaoBlocos")) {
         $(".blocos").show();
         $(".lista").hide();
         $(".linkBloco").addClass("active");
         var totalPropostas = 0;
         var totalFechadoComBoletos = 0;
         var totalFechados = 0;
         var quantidade1 = 0;
         var quantidade2 = 0;
         var quantidade3 = 0;
         var quantidade4 = 0;
         var quantidade5 = 0;
         var quantidade6 = 0;
         $("#app-container").addClass("show-spinner");
         $.getJSON("../utils/consultaraAtendimentoDia.php", function(data) {
            if (data != false) {
               var jsonData = JSON.parse(JSON.stringify(data).replaceAll("null", "\"\"")).data;
               var events = [];
               $.each(jsonData, function(key, value) {
                  switch (value.fluxo_atendimento.nome) {
                     case "HOT LEAD":
                        var linha = criarLinhaBlocoEtapa1(value);
                        quantidade1 = quantidade1 + 1;
                        $(".etapa1").append(linha);
                        break;
                     case "EM ATENDIMENTO":
                        var linha = criarLinhaBlocoEtapa2(value);
                        quantidade2 = quantidade2 + 1;
                        $(".etapa2").append(linha);
                        break;
                     case "SEM CONTATO":
                        var linha = criarLinhaBlocoEtapa3(value);
                        quantidade3 = quantidade3 + 1;
                        $(".etapa3").append(linha);
                        break;
                     case "PROPOSTA":
                        var linha = criarLinhaBlocoEtapa4(value);
                        quantidade4 = quantidade4 + 1;
                        totalPropostas = totalPropostas + parseFloat(value.valor_proposta);
                        $(".etapa4").append(linha);
                        break;
                     case "FECHADO COM BOLETO":
                        var linha = criarLinhaBlocoEtapa5(value);
                        quantidade5 = quantidade5 + 1;
                        totalFechadoComBoletos = totalFechadoComBoletos + parseFloat(value.valor_proposta);
                        $(".etapa5").append(linha);
                        break;
                     case "FECHADO":
                        var linha = criarLinhaBlocoEtapa6(value);
                        quantidade6 = quantidade6 + 1;
                        totalFechados = totalFechados + parseFloat(value.valor_proposta);
                        $(".etapa6").append(linha);
                        break;
                  }
               });

               $(".quantidade1").text(quantidade1);
               $(".quantidade2").text(quantidade2);
               $(".quantidade3").text(quantidade3);
               $(".quantidade4").text(quantidade4);
               $(".quantidade5").text(quantidade5);
               $(".quantidade6").text(quantidade6);

               $(".totalProposta").text(totalPropostas.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }));
               $(".totalFechadoComBoleto").text(totalFechadoComBoletos.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }));
               $(".totalFechado").text(totalFechados.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }));
            }
            $("#app-container").removeClass("show-spinner");
         });

      } else {
         $(".linkLista").addClass("active");
         $("#app-container").addClass("show-spinner");
         $.getJSON("../utils/consultaraAtendimentoDia.php", function(data) {
            if (data != false) {

               var jsonData = JSON.parse(JSON.stringify(data).replaceAll("null", "\"\"")).data;
               var events = [];
               var totalPropostas = 0;
               var totalFechadoComBoletos = 0;
               var totalFechados = 0;
               var quantidade1 = 0;
               var quantidade2 = 0;
               var quantidade3 = 0;
               var quantidade4 = 0;
               var quantidade5 = 0;
               var quantidade6 = 0;
               var quantidade7 = 0;
               $.each(jsonData, function(key, value) {
                  switch (value.fluxo_atendimento.nome) {
                     case "HOT LEAD":
                        var linha = criarLinhaLista(value);
                        quantidade1 = quantidade1 + 1;
                        $(".etapa1").append(linha);
                        break;
                     case "EM ATENDIMENTO":
                        var linha = criarLinhaLista(value);
                        quantidade2 = quantidade2 + 1;
                        $(".etapa2").append(linha);
                        break;
                     case "SEM CONTATO":
                        var linha = criarLinhaLista(value);
                        quantidade3 = quantidade3 + 1;
                        $(".etapa3").append(linha);
                        break;
                     case "PROPOSTA":
                        var linha = criarLinhaLista(value);
                        quantidade4 = quantidade4 + 1;
                        totalPropostas = totalPropostas + parseFloat(value.valor_proposta);
                        $(".etapa4").append(linha);
                        break;
                     case "FECHADO COM BOLETO":
                        var linha = criarLinhaLista(value);
                        quantidade5 = quantidade5 + 1;
                        totalFechadoComBoletos = totalFechadoComBoletos + parseFloat(value.valor_proposta);
                        $(".etapa5").append(linha);
                        break;
                     case "AGUARD. DADOS":
                        var linha = criarLinhaLista(value);
                        quantidade7 = quantidade7 + 1;
                        $(".etapa7").append(linha);
                        break;
                     case "FECHADO":
                        var linha = criarLinhaLista(value);
                        quantidade6 = quantidade6 + 1;
                        totalFechados = totalFechados + parseFloat(value.valor_proposta);
                        $(".etapa6").append(linha);
                        break;
                  }
               });

               $(".quantidade1").text(quantidade1);
               $(".quantidade2").text(quantidade2);
               $(".quantidade3").text(quantidade3);
               $(".quantidade4").text(quantidade4);
               $(".quantidade5").text(quantidade5);
               $(".quantidade6").text(quantidade6);
               $(".quantidade7").text(quantidade7);

               $(".totalProposta").text(totalPropostas.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }));
               $(".totalFechadoComBoleto").text(totalFechadoComBoletos.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }));
               $(".totalFechado").text(totalFechados.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }));

              
            }
            $("#app-container").removeClass("show-spinner");
         });
      }

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
         if(getUrlParameter('emp') == 2){
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

      function alterarParaBlocos() {
         sessionStorage.setItem("visaoBlocos", "true");
         location.reload();
      }

      function alterarParaLista() {
         sessionStorage.removeItem('visaoBlocos');
         location.reload();
      }




      function criarLinhaLista(item) {
         if (item.consultor.id_usuario == sessionStorage.getItem("id_usuario")) {
            var linha = '<div class="card d-flex flex-row mb-3">' +
               '<div class="pl-2 d-flex flex-grow-1 min-width-zero">' +
               '<div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">' +
               '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '" class="w-40 w-sm-100">' +
               '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
               '</a>' +
               '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</p>' +
               '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</p>' +
                  '<p id="midia" class="mb-1 text-muted text-small w-15 w-sm-100"><i class="iconsminds-newspaper"></i> ' + item.midia.nome_midia + '</p>' +
               '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-briefcase"></i> ' + (item.servico != null && item.servico.nome_servico != undefined ? item.servico.nome_servico : "Sem Serviço") + '</p>' +
               '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="iconsminds-dollar-sign-2"></i> ' + item.valor_proposta.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }) + '</p>' +
               '<p class="mb-1 text-muted text-small w-20 w-sm-100"><i class="simple-icon-clock"></i> ' + formatarData(item.dt_inclusao) + ' ' + formatarHora(item.dt_inclusao) + '</p>' +
               '<p class="mb-1 text-muted text-small w-15 w-sm-100"><i class="simple-icon-calendar"></i> ' + formatarData(item.dt_agendamento) + '</p>' +
               '<div class="w-15 w-sm-100">' +
               '<span class="badge badge-pill badge-primary">' + item.fluxo_atendimento.nome + '</span>' +
               '</div>' +
               '</div>'

               +
               '<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">' +
               '<div class="btn-group">';
            if (item.fluxo_atendimento.nome != "PERCA" && item.fluxo_atendimento.nome != "CANCELADO") {
               linha = linha + '<a class="dropdown-item" href="#" onclick="setPercaAtendimento(' + item.id_atendimento + ');" data-toggle="modal" data-target="#modalPerca"><i class="iconsminds-inbox"></i> Perca</a>';
            }
            linha = linha + '</div>' +
               '</div>' +
               '</div>' +
               '</div>';

            return linha;
         }
      }

      function criarLinhaBlocoEtapa1(item) {
         if (item.consultor.id_usuario == sessionStorage.getItem("id_usuario")) {
            var linha = '<div class="card d-flex flex-row mb-4">' +
               '<div class=" d-flex flex-grow-1 min-width-zero ml-3">' +
               '<div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">' +
               '<div style="min-width: -webkit-fill-available;">' +
               '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '">' +
               '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
               '</a>' +
               '<p class="mb-2 text-muted text-small"></p>' +
               '<p class="text-extra-small text-muted">' + formatarData(item.dt_inclusao) + ' ' + formatarHora(item.dt_inclusao) + '</p>' +
               '<p class="mb-2 text-muted text-extra-small">Valor Proposta: ' + item.valor_proposta.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }) + '</p>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row mt-2">' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '</div>' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '<a class="float-right" href="#" onClick="moverParaSemContato(' + item.id_atendimento + ');" title="Mover para em atendimento">' +
               '<i class="simple-icon-arrow-right-circle float-right"></i>' +
               '</a>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
            return linha;
         }
      }

      function criarLinhaBlocoEtapa2(item) {
         if (item.consultor.id_usuario == sessionStorage.getItem("id_usuario")) {
            var linha = '<div class="card d-flex flex-row mb-4">' +
               '<div class=" d-flex flex-grow-1 min-width-zero ml-3">' +
               '<div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">' +
               '<div style="min-width: -webkit-fill-available">' +
               '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '">' +
               '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
               '</a>' +
               '<p class="mb-2 text-muted text-small">' + (item.servico.nome_servico == undefined ? "Sem Serviço" : item.servico.nome_servico) + '</p>' +
               '<p class="text-extra-small text-muted">' + formatarData(item.dt_inclusao) + ' ' + formatarHora(item.dt_inclusao) + '</p>' +
               '<p class="mb-2 text-muted text-extra-small">Valor Proposta: ' + item.valor_proposta.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }) + '</p>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row mt-2">' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '<a href="#" onClick="moverParaSemContato(' + item.id_atendimento + ');" title="Voltar para em atendimento"><i class="simple-icon-arrow-left-circle"></i></a>' +
               '</div>' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '<a class="float-right" href="#" onClick="moverParaProposta(' + item.id_atendimento + ');" title="Mover para sem contato">' +
               '<i class="simple-icon-arrow-right-circle float-right"></i>' +
               '</a>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
            return linha;
         }
      }

      function criarLinhaBlocoEtapa3(item) {
         if (item.consultor.id_usuario == sessionStorage.getItem("id_usuario")) {
            var linha = '<div class="card d-flex flex-row mb-4">' +
               '<div class=" d-flex flex-grow-1 min-width-zero ml-3">' +
               '<div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">' +
               '<div style="min-width: -webkit-fill-available;">' +
               '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '">' +
               '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
               '</a>' +
               '<p class="mb-2 text-muted text-small">' + (item.servico.nome_servico == undefined ? "Sem Serviço" : item.servico.nome_servico) + '</p>' +
               '<p class="text-extra-small text-muted">' + formatarData(item.dt_inclusao) + ' ' + formatarHora(item.dt_inclusao) + '</p>' +
               '<p class="mb-2 text-muted text-extra-small">Valor Proposta: ' + item.valor_proposta.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }) + '</p>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +

               '</div>' +
               '<div class="row mt-2">' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '<a class="float-right" href="#" onClick="moverParaEmAtendimento(' + item.id_atendimento + ');" title="Mover para proposta">' +
               '<i class="simple-icon-arrow-right-circle float-right"></i>' +
               '</a>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
            return linha;
         }
      }

      function criarLinhaBlocoEtapa4(item) {
         if (item.consultor.id_usuario == sessionStorage.getItem("id_usuario")) {
            var linha = '<div class="card d-flex flex-row mb-4">' +
               '<div class=" d-flex flex-grow-1 min-width-zero ml-3">' +
               '<div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">' +
               '<div style="min-width: -webkit-fill-available;">' +
               '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '">' +
               '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
               '</a>' +
               '<p class="mb-2 text-muted text-small">' + (item.servico.nome_servico == undefined ? "Sem Serviço" : item.servico.nome_servico) + '</p>' +
               '<p class="text-extra-small text-muted">' + formatarData(item.dt_inclusao) + ' ' + formatarHora(item.dt_inclusao) + '</p>' +
               '<p class="mb-2 text-muted text-extra-small">Valor Proposta: ' + item.valor_proposta.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }) + '</p>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row mt-2">' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '</div>' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '<a class="float-right" href="#" onClick="moverParaFechadoComBoleto(' + item.id_atendimento + ');" title="Mover para em fechado com boleto">' +
               '<i class="simple-icon-arrow-right-circle float-right"></i>' +
               '</a>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
            return linha;
         }
      }

      function criarLinhaBlocoEtapa5(item) {
         if (item.consultor.id_usuario == sessionStorage.getItem("id_usuario")) {
            var linha = '<div class="card d-flex flex-row mb-4">' +
               '<div class=" d-flex flex-grow-1 min-width-zero ml-3">' +
               '<div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">' +
               '<div style="min-width: -webkit-fill-available;">' +
               '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '">' +
               '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
               '</a>' +
               '<p class="mb-2 text-muted text-small">' + (item.servico.nome_servico == undefined ? "Sem Serviço" : item.servico.nome_servico) + '</p>' +
               '<p class="text-extra-small text-muted">' + formatarData(item.dt_inclusao) + ' ' + formatarHora(item.dt_inclusao) + '</p>' +
               '<p class="mb-2 text-muted text-extra-small">Valor Proposta: ' + item.valor_proposta.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }) + '</p>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row mt-2">' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '</div>' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '<a class="float-right" href="#" onClick="moverParaFechado(' + item.id_atendimento + ');" title="Mover para fechado">' +
               '<i class="simple-icon-arrow-right-circle float-right"></i>' +
               '</a>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
            return linha;
         }
      }

      function criarLinhaBlocoEtapa6(item) {
         if (item.consultor.id_usuario == sessionStorage.getItem("id_usuario")) {
            var linha = '<div class="card d-flex flex-row mb-4">' +
               '<div class=" d-flex flex-grow-1 min-width-zero ml-3">' +
               '<div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">' +
               '<div style="min-width: -webkit-fill-available;">' +
               '<a href="editar-atendimento.php?atdid=' + item.id_atendimento + '">' +
               '<p class="list-item-heading mb-1 truncate">' + item.cliente.nome_cliente + '</p>' +
               '</a>' +
               '<p class="mb-2 text-muted text-small">' + (item.servico.nome_servico == undefined ? "Sem Serviço" : item.servico.nome_servico) + '</p>' +
               '<p class="text-extra-small text-muted">' + formatarData(item.dt_inclusao) + ' ' + formatarHora(item.dt_inclusao) + '</p>' +
               '<p class="mb-2 text-muted text-extra-small">Valor Proposta: ' + item.valor_proposta.toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
               }) + '</p>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-phone"></i> ' + item.cliente.telefone + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row">' +
               '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
               '<a href="#" class="text-small w-15"><i class="simple-icon-screen-smartphone"></i> ' + item.cliente.celular + '</a>' +
               '</div>' +
               '</div>' +
               '<div class="row mt-2">' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '</div>' +
               '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
               '<a class="float-right" href="" title="Mover para em atendimento">'

               +
               '</a>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>' +
               '</div>';
            return linha;
         }
      }

      function moverParaEmAtendimento(idAtendimento) {
         $.ajax({
            url: '../utils/moverFluxoAtendimento.php',
            type: 'POST',
            data: {
               idAtendimento: idAtendimento,
               fluxoAtendimento: "EM ATENDIMENTO"
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "") {

               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
         consultarEmAtendimento();
         consultarSemContato();
      }

      function moverParaSemContato(idAtendimento) {
         $.ajax({
            url: '../utils/moverFluxoAtendimento.php',
            type: 'POST',
            data: {
               idAtendimento: idAtendimento,
               fluxoAtendimento: "SEM CONTATO"
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "") {

               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
         consultarHotlead();
         consultarSemContato();
         consultarEmAtendimento();
      }

      function moverParaProposta(idAtendimento) {
         $.ajax({
            url: '../utils/moverFluxoAtendimento.php',
            type: 'POST',
            data: {
               idAtendimento: idAtendimento,
               fluxoAtendimento: "PROPOSTA"
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "") {

               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
         consultarProposta();
         consultarEmAtendimento();
      }

      function moverParaFechadoComBoleto(idAtendimento) {
         $.ajax({
            url: '../utils/moverFluxoAtendimento.php',
            type: 'POST',
            data: {
               idAtendimento: idAtendimento,
               fluxoAtendimento: "FECHADO COM BOLETO"
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "") {

               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
         consultarFechadoComBoleto();
         consultarProposta();
      }

      function moverParaFechado(idAtendimento) {
         $.ajax({
            url: '../utils/moverFluxoAtendimento.php',
            type: 'POST',
            data: {
               idAtendimento: idAtendimento,
               fluxoAtendimento: "FECHADO"
            },
            beforeSend: function() {
               $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
               if (data != "") {

               }
            },
            complete: function(data) {
               $("#app-container").removeClass("show-spinner");
            }
         });
         consultarFechado();
         consultarFechadoComBoleto();
      }

      function setCancelarAtendimento(idAtendimento) {
         $(".idAtendimento").val(idAtendimento);
         $(".fluxoAtendimento").val("CANCELADO")
      }

      function setPercaAtendimento(idAtendimento) {
         $(".idAtendimento").val(idAtendimento);
         $(".fluxoAtendimento").val("PERCA");
      }

      function recarregarHotLead() {
         if (sessionStorage.getItem("visaoBlocos")) {
            consultarHotLead();
         } else {
            $.ajax({
               url: '../utils/listarAtendimentosConsultorPorFluxoEntreOsDias.php',
               type: 'POST',
               data: {
                  fluxoAtendimento: "HOT LEAD"
               },
               beforeSend: function() {
                  $("#app-container").addClass("show-spinner");
               },
               success: function(data) {
                  if (data != false) {
                     var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;
                     $(".etapa1").html("");
                     var quantidade1 = 0;
                     $.each(jsonData, function(key, value) {
                        switch (value.fluxo_atendimento.nome) {
                           case "HOT LEAD":
                              var linha = criarLinhaLista(value);
                              quantidade1 = quantidade1 + 1;
                              $(".etapa1").append(linha);
                              break;
                        }
                     });

                     $(".quantidade1").text(quantidade1);
                  }
               },
               complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
               }
            });
         }

      };

      function consultarHotlead() {
         $.ajax({
            url: '../utils/listarAtendimentosConsultorPorFluxoEntreOsDias.php',
            type: 'POST',
            data: {
               fluxoAtendimento: "HOT LEAD"
            },
            beforeSend: function() {
					$("#app-container").addClass("show-spinner");
				},
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;
                  $(".etapa1").html("");
                  var quantidade1 = 0;
                  $.each(jsonData, function(key, value) {
                     switch (value.fluxo_atendimento.nome) {
                        case "HOT LEAD":
                           var linha = criarLinhaBlocoEtapa1(value);
                           quantidade1 = quantidade1 + 1;
                           $(".etapa1").append(linha);
                           break;
                     }
                  });
                  $(".quantidade1").text(quantidade1);
               }
            },
            complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
            }
         });
      }

      function consultarEmAtendimento() {
         $.ajax({
            url: '../utils/listarAtendimentosConsultorPorFluxoEntreOsDias.php',
            type: 'POST',
            data: {
               fluxoAtendimento: "EM ATENDIMENTO"
            },
            beforeSend: function() {
					$("#app-container").addClass("show-spinner");
				},
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;
                  $(".etapa2").html("");
                  var quantidade2 = 0;
                  $.each(jsonData, function(key, value) {
                     switch (value.fluxo_atendimento.nome) {
                        case "EM ATENDIMENTO":
                           var linha = criarLinhaBlocoEtapa2(value);
                           quantidade2 = quantidade2 + 1;
                           $(".etapa2").append(linha);
                           break;
                     }
                  });
                  $(".quantidade2").text(quantidade2);
               }
            },
            complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
            }
         });
      }

      function consultarSemContato() {
         $.ajax({
            url: '../utils/listarAtendimentosConsultorPorFluxoEntreOsDias.php',
            type: 'POST',
            data: {
               fluxoAtendimento: "SEM CONTATO"
            },
            beforeSend: function() {
					$("#app-container").addClass("show-spinner");
				},
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;
                  $(".etapa3").html("");
                  var quantidade3 = 0;
                  $.each(jsonData, function(key, value) {
                     switch (value.fluxo_atendimento.nome) {
                        case "SEM CONTATO":
                           var linha = criarLinhaBlocoEtapa3(value);
                           quantidade3 = quantidade3 + 1;
                           $(".etapa3").append(linha);
                           break;
                     }
                  });
                  $(".quantidade3").text(quantidade3);
               }
            },
            complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
            }
         });
      }

      function consultarProposta() {
         $.ajax({
            url: '../utils/listarAtendimentosConsultorPorFluxoEntreOsDias.php',
            type: 'POST',
            data: {
               fluxoAtendimento: "PROPOSTA"
            },
            beforeSend: function() {
					$("#app-container").addClass("show-spinner");
				},
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;
                  $(".etapa4").html("");
                  var totalPropostas = 0;
                  var quantidade4 = 0;
                  $.each(jsonData, function(key, value) {
                     switch (value.fluxo_atendimento.nome) {
                        case "PROPOSTA":
                           var linha = criarLinhaBlocoEtapa4(value);
                           quantidade4 = quantidade4 + 1;
                           totalPropostas = totalPropostas + parseFloat(value.valor_proposta);
                           $(".etapa4").append(linha);
                           break;
                     }
                  });
                  $(".quantidade4").text(quantidade4);
                  $(".totalProposta").text(totalPropostas.toLocaleString('pt-br', {
                     style: 'currency',
                     currency: 'BRL'
                  }));
               }
            },
            complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
            }
         });
      }

      function consultarFechadoComBoleto() {
         $.ajax({
            url: '../utils/listarAtendimentosConsultorPorFluxoEntreOsDias.php',
            type: 'POST',
            data: {
               fluxoAtendimento: "FECHADO COM BOLETO"
            },
            beforeSend: function() {
					$("#app-container").addClass("show-spinner");
				},
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;
                  $(".etapa5").html("");
                  var totalFechadoComBoletos = 0;
                  var quantidade5 = 0;
                  $.each(jsonData, function(key, value) {
                     switch (value.fluxo_atendimento.nome) {
                        case "FECHADO COM BOLETO":
                           var linha = criarLinhaBlocoEtapa5(value);
                           quantidade5 = quantidade5 + 1;
                           totalFechadoComBoletos = totalFechadoComBoletos + parseFloat(value.valor_proposta);
                           $(".etapa5").append(linha);
                           break;
                     }
                  });
                  $(".quantidade5").text(quantidade5);
                  $(".totalFechadoComBoleto").text(totalFechadoComBoletos.toLocaleString('pt-br', {
                     style: 'currency',
                     currency: 'BRL'
                  }));
               }
            },
            complete: function(data) {
                  $("#app-container").removeClass("show-spinner");
            }
         });
      }

      function consultarFechado() {
         $.ajax({
            url: '../utils/listarAtendimentosConsultorPorFluxoEntreOsDias.php',
            type: 'POST',
            data: {
               fluxoAtendimento: "FECHADO"
            },
            beforeSend: function() {
					$("#app-container").addClass("show-spinner");
				},
            success: function(data) {
               if (data != false) {
                  var jsonData = JSON.parse(data.replaceAll("null", "\"\"")).data;
                  $(".etapa6").html("");
                  var totalFechados = 0;
                  var quantidade6 = 0;
                  $.each(jsonData, function(key, value) {
                     switch (value.fluxo_atendimento.nome) {
                        case "FECHADO":
                           var linha = criarLinhaBlocoEtapa6(value);
                           quantidade6 = quantidade6 + 1;
                           totalFechados = totalFechados + parseFloat(value.valor_proposta);
                           $(".etapa6").append(linha);
                           break;
                     }
                  });
                  $(".quantidade6").text(quantidade6);
                  $(".totalFechado").text(totalFechados.toLocaleString('pt-br', {
                     style: 'currency',
                     currency: 'BRL'
                  }));
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
               }else if (getUrlParameter('tipo') == "create") {
                  $.notify({
                     // options
                     message: 'Erro ao atualizar seu <strong>Perfil!</strong>'
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
               }else if (getUrlParameter('tipo') == "perfil") {
                  $.notify({
                     // options
                     message: 'Perfil atuaizado com <strong>Sucesso!</strong>'
                  }, {
                     // settings
                     type: 'success'
                  });
               }
               break;
         }
      }

      //setInterval(() => recarregarHotLead(), 10000);
   </script>
</body>

</html>
