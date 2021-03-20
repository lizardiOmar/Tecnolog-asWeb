<?php
	require_once "lib/nusoap.php";
	
	function getMasa ($peso){//el peso será expresado en KG como un tipo float
		return $peso/9.81;
	}
	//Declarar servidor de SOAP (Nu SOAP)
	$server=new soap_server();
	$server->configureWSDL("iva", "urn:iva");
	$server->register(
		"calcularPeso",
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
