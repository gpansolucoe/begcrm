<?php
date_default_timezone_set('America/Sao_Paulo');

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

class Status{
   function getStatus(){
        $this->source = "http://ec2-user@ec2-18-118-195-37.us-east-2.compute.amazonaws.com:8080";
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->date = date("Y-m-d H:i:s");
        $this->url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $this->status = $this->info($this->source);

        $result = json_encode(array('source' => $this->source, 'status' => $this->status, 'ip' => $this->ip, 'data' => $this->date, 'url' => $this->url));

        return $result;
   }

   function info($url) {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_HEADER, 1);
        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)");
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );

        $content = curl_exec( $ch );
        $info = curl_getinfo( $ch );
        $error = curl_error( $ch );

        curl_close($ch);
        return ($error) ? $error : $info;
   }
}
?>
