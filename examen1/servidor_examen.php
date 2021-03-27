<?php

	require_once "lib/nusoap.php";
	date_default_timezone_set("America/Mexico_City");
	
	$dia_hoy=date("d");
	$mes_hoy=date("m");
	$año_hoy=date("Y");
	
	$fecha_hoy=$dia_hoy."-".$mes_hoy."-".$año_hoy;
	
	$dia_n=("25");
	$mes_n=("03");
	$año_n=("1994");
	
	$fecha_nacido=$dia_n."-".$mes_n."-".$año_n;
	
	//Calcular proximo cumpleaños
	function diferencia_entre_fechas($fecha_nac,$hoy)
	{
		$dias = (strtotime($fecha_nac)-strtotime($hoy))/86400;
		$dias = abs($dias); $dias = floor($dias);
		return $dias;
	}
	
	function dias_cumple($d_n, $m_n, $a_n, $d_h, $m_h, $a_h){
		if($m_n<$m_h){
			$año=$a_h+1;
			$cumple=$d_n."-".$m_n."-".$año;
		}else{
			if($d_n<$d_h){
				$año=$a_h+1;
				$cumple=$d_n."-".$m_n."-".$año;
			}else{
				$cumple=$d_n."-".$m_n."-".$a_h;
			}
		}
		$hoy=$d_h."-".$m_h."-".$a_h;
		return diferencia_entre_fechas($hoy, $cumple);
	}
	//echo dias_cumple($dia_n, $mes_n, $año_n, $dia_hoy, $mes_hoy, $año_hoy);

	
	//Calcular días de vida
	
	//Definir signo zodiacal






	// Declaración del servidor SOAP
	//Declarar servidor de SOAP (Nu SOAP)
	$server=new soap_server();
	$server->configureWSDL("servidor_examen", "urn:examen");
	$server->register(
		"calcular_fechas",
		array("día"=>"xsd:int", "mes"=>"xsd:int", "año"=>"xsd:int"),
		array("return"=>"xsd:int"),
		"urn:dias_cumple",//ActionSOAP
		"urn:servidor_examen#dias_cumple",//Nombre de dominios
		"rpc",//Estilo de codificación
		"encoded",//
		""		
	);
	@$server->service(file_get_contents("php://input"));
?>