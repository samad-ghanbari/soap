<?php
require_once('lib/nusoap.php');
//SOAP stands for Simple Object Access Protocol

$server = new nusoap_server();
$server->configureWSDL("myService", "urn:myNamespace"); //web service description language
//WSDL is an XML-based language for describing Web services.

function get_name($myIn)
{
	 	return "Ghanbari ".$myIn;
}

$server->register("get_name",
 							["myIn"=>"xsd:string"],
							["return"=>"xsd:string"],
							"urn:myNamespace",
					    "urn:myNamespace#get_name",
					    "rpc",
					    "encoded",
					    "Get name"
						);// register function in myService
 //XML Schema Definition >>> param type
 // xsd : string, date , numeric...

//listener
//  php < 5.6 :  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)? $HTTP_RAW_POST_DATA:"";
//@$server->service($HTTP_RAW_POST_DATA);
$server->service(file_get_contents("php://input"));


?>
