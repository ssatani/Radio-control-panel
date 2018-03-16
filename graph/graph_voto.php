<?php
	require_once('../conf/conexion.php');
	
	$query = "CALL noti_read_by(1);";
	if(isset($_GET["idranking"]) && isset($_GET["idmusica"]) && isset($_GET["idescucha"])){
		$idranking=htmlspecialchars($_GET["idranking"]);
		$idmusica=htmlspecialchars($_GET["idmusica"]);
		$idescucha=htmlspecialchars($_GET["idescucha"]);

		$query = "SELECT voto('$idranking','$idmusica','$idescucha') AS resultado;";
		if($resultado=$conexion->query($query)){
			echo "Correcto";
		}
		else{
			echo "Fallo";
		}

	}
	else{
		echo "Error";
	}
?>