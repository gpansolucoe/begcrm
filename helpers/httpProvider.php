<?php

    require '../vendor/autoload.php';

	use GuzzleHttp\Psr7;
    use GuzzleHttp\Exception\RequestException;
    
    Class HttpProvider{

        function requestHttpWithToken($type, $body, $url, $token){
            $client = new GuzzleHttp\Client();
			try {
                switch($type){
                    case "POST":
                        $response = $client->request($type, $this->getServiceHost().$url, [
                            'headers'=> ['Authorization' => 'Bearer '.$token,'Content-Type' => 'application/json'],
                            'json' => $body
                        ]);
                        return $response->getStatusCode() == 200 || $response->getStatusCode() == 202 ? $response->getBody() : false;
                    break;
                    case "PUT":
                        $response = $client->request($type, $this->getServiceHost().$url, [
                            'headers'=> ['Authorization' => 'Bearer '.$token,'Content-Type' => 'application/json'],
                            'json' => $body
                        ]);
                        return $response->getStatusCode() == 200 ? $response->getBody() : false;
                    break;
                    case "DELETE":
                        $response = $client->request($type, $this->getServiceHost().$url, [
                            'headers'=> ['Authorization' => 'Bearer '.$token,'Content-Type' => 'application/json']
                        ]);
                        return $response->getStatusCode() == 200 ? $response->getBody() : false;
                    break;
                    default:
                        $response = $client->request($type, $this->getServiceHost().$url, [
                            'headers'=> ['Authorization' => 'Bearer '.$token,'Content-Type' => 'application/json']
                        ]);
                        return $response->getStatusCode() == 200 ? $response->getBody() : false;
                }
            }catch (RequestException $e) {
                $toolsArray = array("Retrace", "Basic Error Logging", "Hammer", $e);
                error_log(print_r($toolsArray, true));
			}
        }

        function requestHttpWithOutToken($type, $body, $url){
            $client = new GuzzleHttp\Client();
			try {
                switch($type){
                    case "POST":
                        $response = $client->request($type, $this->getServiceHost().$url, [
                            'headers'=> ['Content-Type' => 'application/json'],
                            'json' => $body
                        ]);
                        return $response->getStatusCode() == 200 || $response->getStatusCode() == 202 ? $response->getBody() : false;
                    break;
                    case "PUT":
                        $response = $client->request($type, $this->getServiceHost().$url, [
                            'headers'=> ['Content-Type' => 'application/json'],
                            'json' => $body
                        ]);
                        return $response->getStatusCode() == 200 ? $response->getBody() : false;
                    break;
                    default:
                        $response = $client->request($type, $this->getServiceHost().$url, [
                            'headers'=> ['Content-Type' => 'application/json']
                        ]);
                        return $response->getStatusCode() == 200 ? $response->getBody() : false;
                }
            }catch (RequestException $e) {
                $toolsArray = array("Retrace", "Basic Error Logging", "Hammer", $e);
                error_log(print_r($toolsArray, true));
			}
        }

        function getServiceHost(){
			$config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/imports/app.ini');		
			return $config['service_host'];
		}

    }


?>