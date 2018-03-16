<?php
	require_once('../conf/conexion.php');

	$query = "CALL prog_read_json();";
    $resultado=$conexion->query($query);

    $clientes = array(); //creamos un array
    while($row = $resultado->fetch_assoc())
	{
		$idprogramacion=$row['idprogramacion'];
	    $titulo=$row['titulo'];
	    $descripcion=$row['descripcion'];
	    $hora_ini=$row['hora_ini'];
	    $duracion=$row['duracion'];
	    $imagen=$row['imagen'];
	    

	    $clientes['programas'][] = array(
	    	'idprogramacion'=> $idprogramacion,
	     	'titulo'=> $titulo, 
	     	'descripcion'=> $descripcion, 
            'hora_ini'=> $hora_ini, 
            'duracion'=> $duracion, 
            'imagen'=> base64_encode($imagen)
            );
		
	    
	}
	$close = mysqli_close($conexion) 
	or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

	//Creamos el JSON
	$json_string = json_encode($clientes);
	echo $json_string;
?>