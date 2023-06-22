<?php
require_once('lib/nusoap.php');

$client = new nusoap_client('http://localhost/webService/server.php?wsdl',true);
$res = $client->call('get_name',['myIn'=>'is testing']);

echo $res;
//var_dump( $res);

?>
