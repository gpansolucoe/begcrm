<?php
error_reporting(0);
/*---- Tratando erros ----*/

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

/*---- Fim do Tratando erros ----*/

class Database {

	public $hostname, $dbname, $username, $password, $conn;

	function __construct() {
	    $this->host_name = 'db-gpan.c9ev33uijwhp.us-east-2.rds.amazonaws.com';
	    $this->dbname = 'gpansolc_crm';
	    $this->username = 'admin';
	    $this->password = 'Hm6%6$T!By:.~XO1e_1E1a7?{n#b';
	    try {
	        $this->conn = new PDO("mysql:host=$this->host_name;dbname=$this->dbname", $this->username, $this->password);
	        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $this->conn->exec("use gpansolucoescom_crm");
	    } catch (PDOException $e) {
	        echo 'Error: ' . $e->getMessage();
	    }
	}

	function customSelect($sql) {
	    try {
	        $stmt = $this->conn->prepare($sql);
	        $result = $stmt->execute();
	        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        if ($saida === "txt") {
	        	$txt = $stmt->fetchAll(PDO::FETCH_ASSOC);
	            $out = "saida => ".gettype($txt).array('result' => $txt);
	        } else {
	            $out = array('result' => array('quantidade' => count($rows), 'data' => date("Y-m-d H:i:s"), 'sql' => $sql), 'saida' => $rows);
	        } 
	        return json_encode($out);
	    } catch (PDOException $e) {
	        echo 'Error: ' . $e->getMessage();
	    }
	}
	/*
	function select($tbl, $cond='') {
	    $sql = "SELECT * FROM $tbl";
	    if ($cond!='') {
	        $sql .= " WHERE $cond ";
	    }

	    try {
	        $stmt = $this->conn->prepare($sql);
	        $result = $stmt->execute();
	        $rows = $stmt->fetchAll(); // assuming $result == true
	        return $rows;
	    } catch (PDOException $e) {
	        echo 'Error: ' . $e->getMessage();
	    }
	}
	function num_rows($rows){
	     $n = count($rows);
	     return $n;
	}
	function delete($tbl, $cond='') {
	    $sql = "DELETE FROM `$tbl`";
	    if ($cond!='') {
	        $sql .= " WHERE $cond ";
	    }

	    try {
	        $stmt = $this->conn->prepare($sql);
	        $stmt->execute();
	        return $stmt->rowCount(); // 1
	    } catch (PDOException $e) {
	        return 'Error: ' . $e->getMessage();
	    }
	}

	function insert($tbl, $arr) {
	    $sql = "INSERT INTO $tbl (`";
	    $key = array_keys($arr);
	    $val = array_values($arr);
	    $sql .= implode("`, `", $key);
	    $sql .= "`) VALUES ('";
	    $sql .= implode("', '", $val);
	    $sql .= "')";

	    $sql1="SELECT MAX( id ) FROM  `$tbl`";
	    try {

	        $stmt = $this->conn->prepare($sql);
	        $stmt->execute();
	        $stmt2 = $this->conn->prepare($sql1);
	        $stmt2->execute();
	        $rows = $stmt2->fetchAll(); // assuming $result == true
	        return $rows[0][0];
	    } catch (PDOException $e) {
	        return 'Error: ' . $e->getMessage();
	    }
	}

	function update($tbl, $arr, $cond) {
	    $sql = "UPDATE `$tbl` SET ";
	    $fld = array();
	    foreach ($arr as $k => $v) {
	        $fld[] = "`$k` = '$v'";
	    }
	    $sql .= implode(", ", $fld);
	    $sql .= " WHERE " . $cond;

	    try {
	        $stmt = $this->conn->prepare($sql);
	        $stmt->execute();
	        return $stmt->rowCount(); // 1
	    } catch (PDOException $e) {
	        return 'Error: ' . $e->getMessage();
	    }
	}
	*/
}

date_default_timezone_set('America/Sao_Paulo');
header('Content-Type: application/json; charset=utf-8');
$today = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime("yesterday"));

$banco = New Database;

// $where = "WHERE id_empresa = '1' AND ordem < '6' ORDER BY ordem";
// $where = "WHERE cpf != ''";
// $where = "WHERE false";
// $order  = "ORDER BY id_empresa ASC, ordem ASC";
// $order  = "ORDER BY id_documento DESC";
$limite = "LIMIT 100";
// $tabela = "documentos_necessarios";
$tabela = "empresa";
// $tabela = "documento";

$sql = 'SELECT * FROM '.$tabela.' '.$where.' '.$order.' '.$limite.''; //SQL mais complexo

// $sql = 'SELECT * FROM fluxo_atendimento ORDER BY id_empresa ASC';
// $sql = 'SELECT * FROM cliente WHERE telefone = "(21) 8031-7770"';
// $sql = 'SELECT * FROM cliente WHERE rg = "12113043"';
// $sql = 'SELECT * FROM cliente WHERE email = "josearnaldo.net@gmail.com"';
// $sql = 'SELECT * FROM cliente WHERE cpf = "165.165.268-69"';
// $sql = 'SELECT * FROM atendimento ORDER BY id_atendimento DESC LIMIT 100';
// $sql = 'SELECT * FROM atendimento WHERE id_cliente = 1331883';

// $sql = 'SELECT * FROM atendimento WHERE id_cliente = 1301252'; //Meu atendimento
// $sql = 'SELECT * FROM atendimento WHERE id_atendimento = 1331883'; //Meu atendimento
// $sql = 'SELECT * FROM cliente WHERE id_cliente = 1301252'; //Meu cadastro
// $sql = 'SELECT * FROM cliente WHERE cpf LIKE "%009-42%" LIMIT 100';
$sql = 'SELECT telefone FROM cliente WHERE telefone LIKE "%-%" ORDER BY telefone ASC LIMIT 1000';
// $sql = 'SELECT telefone FROM cliente LIMIT 100';

// $sql = 'SELECT * FROM cliente WHERE cpf = "062.391.929-02	" LIMIT 100';
// $sql = 'SELECT * FROM cliente WHERE cpf = "25.448.634/0001-32" LIMIT 100';
// $sql = 'SELECT * FROM cliente WHERE cpf = "165.165.268-69" LIMIT 100';
// $sql = 'SELECT * FROM cliente WHERE cpf = "062.391.929-02" LIMIT 100';

// $sql = 'SELECT * FROM atendimento WHERE id_cliente IN (1326680, 1451324, 1452576)'; //Atendimentos do cliente
// $sql = 'SELECT * FROM atendimento WHERE id_cliente = 1326680'; //Atendimento do cliente

// $sql = 'SELECT * FROM atendimento WHERE id_cliente = 1434573'; //1434573

// $sql = 'SELECT * FROM empresa LIMIT 100';
// $sql = 'SELECT * FROM pagamento ORDER BY id_pagamento DESC LIMIT 500';

// $sql = 'DESCRIBE '.$tabela.'';
// $sql = 'SHOW DATABASES';

// $sql = "SELECT 
// atendimento.id_atendimento,atendimento.id_cliente,atendimento.dt_inclusao,
// atendimento.id_fluxo_atendimento,atendimento.id_empresa,
// cliente.id_cliente,cliente.telefone,cliente.celular,
// cliente.email 
// FROM atendimento INNER JOIN cliente ON 
// cliente.id_cliente=atendimento.id_cliente 
// WHERE 
// atendimento.id_fluxo_atendimento IN (13, 14) 
// AND atendimento.id_empresa = 1 
// AND atendimento.dt_inclusao > '$yesterday 23:59:59' 
// ORDER BY atendimento.id_fluxo_atendimento asc";

// $sql = "UPDATE atendimento SET id_empresa  = '4' WHERE id_atendimento = '1331883'"; //Atualiza meu atendimento
// $sql = "UPDATE atendimento SET dt_agendamento  = '2025-02-07 15:00:26.296281' WHERE id_atendimento = '1370147*'";
// $sql = "UPDATE documentos_necessarios SET data_atualizacao  = '2025-03-21 00:00:00.000000', data_criacao = '2025-03-21 00:00:00.000000' WHERE id_documento_necessario = '39'";
// $sql = "UPDATE documentos_necessarios SET id_servico = '23' WHERE id_documento_necessario = '38'";
// $sql = "UPDATE documentos_necessarios SET path_documento = 'Licence-contrato-prestacao-servicos.php' WHERE id_documento_necessario = 'XX'";
// $sql = "UPDATE documentos_necessarios SET path_documento = 'Regularize_contrato_prestacao_servicos_geral.php' WHERE id_documento_necessario = 'XX'";

// $sql = "UPDATE documentos_necessarios SET id_servico = null, id_empresa = null WHERE id_documento_necessario = '38'";
// $sql = "DELETE FROM documentos_necessarios WHERE id_documento_necessario = '37'";

// $sql = "INSERT INTO documentos_necessarios (data_atualizacao, data_criacao, nome_documento_necessario, path_documento, id_empresa, id_servico) VALUES ('2025-03-31 00:00:00.000000', '2025-03-31 00:00:00.000000', 'EXCLUSÃO', 'Regularize_contrato_prestacao_servicos_geral.php', '2', '27')";

$v = $_GET['v'];
$t = $_GET['t'];
$l = ($_GET['l']) ? "LIMIT ".$_GET['l'] : $limite;
$o = ($_GET['o']) ? "ORDER BY id_".$_GET['t']." DESC" : $order;
if ($v == '0') {
	$sql = 'SHOW DATABASES';
} elseif ($v == '1') {
	$sql = 'SHOW TABLES';
} elseif ($v == '2') {
	$sql = 'SELECT * FROM '.$t.' '.$where.' '.$o.' '.$l.''; //SQL mais complexo
} elseif ($v == '3') {
	$sql = 'SELECT * FROM atendimento WHERE id_atendimento = 1331883'; //Meu atendimento
} elseif ($v == '4') {
	$sql = 'SELECT * FROM cliente WHERE id_cliente = 1301252'; //Meu cadastro
} elseif ($v == '5') {
	$sql = $sql;
	$saida = $banco->customSelect($sql);
	die($saida);

	$file = "emails_".date("d-m-Y").".txt";
	$txt = fopen($file, "w") or die("Unable to open file!");
	fwrite($txt, $saida);
	fclose($txt);

	header('Content-Description: File Transfer');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	header("Content-Type: text/plain");
	readfile($file);
	
} else {
	$sql = $sql;
}

$sql = trim($sql);
$sql = preg_replace('/\s+/', ' ', $sql);

$saida = $banco->customSelect($sql);

echo $saida;
