<?php
	require_once "lib/nusoap.php";
	
	function getMasa ($peso){//el peso será expresado en KG como un tipo float
		return $peso/9.81;
	}

	function calcularPeso($peso, $planeta){//la variable planeta sera un int como el mtro. sugirió, simulando un indice.
	
		$masa=getMasa($peso);
		
		switch ($planeta) {
			case 0://luna
				return $masa*1.62;
				break;
			case 1://marte
				return $masa*3.711;
				break;
			case 2://venus
				return $masa*8.87;
				break;
			
			case 4://Jupiter
				return $masa*24.79;
				break;
			default://terra
    				return $masa*9.81;
				break;
		}
	}
	//Declarar servidor de SOAP (Nu SOAP)
	$server=new soap_server();
	$server->configureWSDL("pesoXplaneta", "urn:pesoXplaneta");
	$server->register(
		"calcularPeso",
		array("peso"=>"xsd:float", "planeta"=>"xsd:int"),
		array("return"=>"xsd:float"),
		"urn:pesoXplaneta",//ActionSOAP
		"urn:pesoXplaneta#getPeso",//Nombre de dominios
		"rpc",//Estilo de codificación
		"encoded",//
		"5",//Documentación
		"6"//Estilo de codificación		
	);
	@$server->service(file_get_contents("php://input"));
?>
