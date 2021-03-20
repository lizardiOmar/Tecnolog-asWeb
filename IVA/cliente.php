<?php
	require_once "lib/nusoap.php"; 
	$client=new nusoap_client("http://localhost/planetas/pesoXplaneta.php");
	$error=$client->getError();
	$result=$client->call("getIva", array("val_1"=>"100"));
	if($client->fault){
		echo "error";
		print_r($result);
	}else{
		$error=$client->getError();
		if($error){
			echo "Error: ".$error;
		}else{
			echo "<h2>IVA</h2>";
			echo "<h3>16%</h3>";
			echo $result;
		}
	}
?>
