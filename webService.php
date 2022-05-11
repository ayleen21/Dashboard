<?php
try {
//require_once_('./assets/js/plugin/nusoap-0.9.5/lib/nusoap.php');

//URL DEL WEB SERVICE
$wsdl = "http://10.29.98.205/wsserver_sm.php?wsdl";

//CREAR CLIENTE NUSOAP
$client = new SOAPClient($wsdl);


$params = Array('password' => 'SIGT_SM','command' => 'ProductosCentral','fecha' => '2022-04-21','where' => 'nCentral=22');

$return = $client->getListarProductos($params);
print_r($return);
}
catch (Exception $ex) {
    echo "exception ocurrida: " . $ex;

}


?>