<?php
	require_once "lib/nusoap.php";
	
	function getIva ($costo){
		return $costo*1.16;
	}
	//Declarar servidor de SOAP (Nu SOAP)
	$server=new soap_server();
	$server->configureWSDL("iva", "urn:iva");
	$server->register(
		"getIva",
		array("costo"=>"xsd:string"),
		array("return"=>"xsd:string"),
		"urn:iva",//ActionSOAP
		"urn:iva#getIva",//Nombre de dominios
		"rpc",//Estilo de codificación
		"encoded",//
		"5",//Documentación
		"6"//Estilo de codificación		
	);
	@$server->service(file_get_contents("php://input"));
?>