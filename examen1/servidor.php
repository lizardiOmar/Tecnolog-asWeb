<?php
	require_once "lib/nusoap.php";







	// Declaración del servidor SOAP
	$server = new soap_server();
	$server->configureWSDL("servidor", "urn:servidor");
	$server->register(""array("día"=>"xsd:int", "mes"=>"xsd:int", "año"=>"xsd:int"), 
		array("return"=>"xsd:int"),
		"urn:servidor",
		"urn:servidor#",
		"rpc",
		"encode",
		"Muestra los dias que faltan para tu cumpleaños, cual es tu signo zodiacal y cuandos dias has vivido"
);
@$server->service(file_get_contents("php://input"));





?>