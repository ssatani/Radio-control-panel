<?php
	function conectarse(){
		$servidor= "localhost";
		$usuarios="root";
		$password="";
		$db="dbkorys";
		$conectar= new mysqli($servidor,$usuarios,$password,$db)
		or die ("error de Conexion");
		return $conectar;
	} 
	/*function desconectarse(){
		mysqli_close(); 
	} */
	$conexion=conectarse();
	//$deconexion=desconectarse();
?>