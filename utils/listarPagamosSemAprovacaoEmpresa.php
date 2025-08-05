<?php

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    
    include_once '../endpoints/pagamento.php';
    session_start();

    $idEmpresa = $_SESSION["id_empresa"];
    
    $pagamento = new Pagamento();

    echo $pagamento->listarTodosPagamentosSemAprovacao($idEmpresa);

?>