<?php
	require_once "lib/nusoap.php"; 
	$client=new nusoap_client("http://localhost/pesoXplaneta/pesoXplaneta.php");
	$error=$client->getError();
	
	$planeta=3;
	$result=$client->call("calcularPeso", array("peso"=>"100", "planeta"=>$planeta));
	if($client->fault){
		echo "error";
		print_r($result);
	}else{
		$error=$client->getError();
		if($error){
			echo "Error: ".$error;
		}else{
			echo "<h1>Resultado<h1/>";
			switch ($planeta) {
			case 0://luna
				echo "<h2>Tu peso en la Luna es: $result<h2/>";
				
				break;
			case 1://marte
				echo "<h2>Tu peso en Marte es: $result<h2/>";
				break;
			case 2://venus
				echo "<h2>Tu peso en Venus es: $result<h2/>";
				break;
			case 3://Jupiter
				echo "<h2>Tu peso en Jupiter es: $result<h2/>";
				break;
			default://tierra
    			echo "<h2>Tu peso en Tierra es: $result<h2/>";
				break;
		}
		}
	}
	
	
	
	
?>