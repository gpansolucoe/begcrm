<?php
/*---- Tratando erros ----*/
/*
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
*/
/*---- Fim do Tratando erros ----*/
set_time_limit(0);

//header("Access-Control-Allow-Origin: *");
//header('Content-type: application/json');

date_default_timezone_set('America/Sao_Paulo');
$yesterday = date("Y-m-d", strtotime("yesterday"));

define('bdhost', 'db-gpan.c9ev33uijwhp.us-east-2.rds.amazonaws.com');
define('bdbanco', 'gpansolc_crm');
define('bdlogin', 'admin');
define('bdsenha', 'Hm6%6$T!By:.~XO1e_1E1a7?{n#b');

try {
   $conexao = new PDO("mysql:host=".bdhost.";charset=UTF8;dbname=".bdbanco, bdlogin, bdsenha);
   $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conexao->exec("use gpansolucoescom_crm");
   //echo "<p>Conectado</p>";
} catch(PDOException $erro) {
   //echo "<p>Conexão falhou: " . $erro->getMessage() . "</p>";
}
//$sql = "SELECT atendimento.id_atendimento,atendimento.id_cliente,atendimento.dt_inclusao,atendimento.id_fluxo_atendimento,atendimento.id_empresa,cliente.id_cliente,cliente.telefone,cliente.celular,cliente.email FROM atendimento INNER JOIN cliente ON atendimento.id_cliente=cliente. id_cliente WHERE atendimento.dt_inclusao > '$yesterday 23:59:59' AND atendimento.id_fluxo_atendimento IN (6, 7) ORDER BY atendimento.dt_inclusao desc";
$sql = "SELECT 
atendimento.id_atendimento,atendimento.id_cliente,atendimento.dt_inclusao,
atendimento.id_fluxo_atendimento,atendimento.id_empresa,
cliente.id_cliente,cliente.telefone,cliente.celular,
cliente.email 
FROM atendimento INNER JOIN cliente ON 
cliente.id_cliente=atendimento.id_cliente 
WHERE 
atendimento.id_fluxo_atendimento IN (13, 14) 
AND atendimento.id_empresa = 1 
AND atendimento.dt_inclusao > '$yesterday 23:59:59' 
ORDER BY atendimento.id_fluxo_atendimento asc";

function outputsql($sql) {
   global $conexao;
   $statement = $conexao->prepare($sql);
   $result = $statement->execute();
   $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
   $count = $statement->rowCount();
   return json_encode($rows);
}

$json = json_decode(outputsql($sql), true);


foreach($json as $item) {
    $telefone = ($item["telefone"]) ? telefonelimpo($item["telefone"]) : '';
    $email = ($item["email"]) ? strtolower($item["email"]) : '';
    $conversionName = "";
    $timestamp = date("m-d-Y H:i:s");
    googlesheet($email,$telefone,$conversionName,$timestamp);
}

function telefonelimpo($string){
   $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '', $string);
   return "+55".strtolower(trim($string, ''));
}

function googlesheet($email,$whatsapp,$conversion,$timestamp) {

require __DIR__ . '/vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Google Sheets with Primo');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);
$spreadsheetId = "1MqEyzg1tC05egOjfl-Mp2i5oaTECWN4DP_qL_S1WMIY"; //Criado pelo pessoal do google

$range = "clientes";

$values = [
	[$email,$whatsapp,$conversion,$timestamp]
];

$body = new Google_Service_Sheets_ValueRange([
	'values' => $values
]);

$params = [
	'valueInputOption' => 'RAW'
];

$result = $service->spreadsheets_values->append(
	$spreadsheetId,
	$range,
	$body,
	$params
);

	if($result->updates->updatedRows == 1){
		echo "<p>Sucesso!</p>";
	} else {
		echo "Fail!";
	}

}
