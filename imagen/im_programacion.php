<?php
	require('../conf/conexion.php');
	$id= htmlspecialchars($_GET["id"]);
	if ($id > 0)
	{
   		$query = "CALL imgprog_read('$id');";
	    $resultado=$conexion->query($query);
	    if($row = $resultado->fetch_assoc())
		{
			$imagen = $row['imagen']; 
		}
	    header("Content-type: jpeg");
	    echo $imagen;
	}
?>