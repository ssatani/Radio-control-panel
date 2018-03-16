<?php
	require_once('../conf/conexion.php');
	
	$query = "CALL noti_read_by(1);";
	if(isset($_GET["d"])){
		$desde=htmlspecialchars($_GET["d"]);
		if ($desde>0) {
			$query = "CALL noti_read_by('$desde');";
		} else {
			$desde=0;
			$query = "CALL noti_read_by('$desde');";
		}
	}
	
    $resultado=$conexion->query($query);

    $clientes = array(); //creamos un array
    while($row = $resultado->fetch_assoc())
	{
		$idprogramacion=$row['idnotificacion'];
	    $titulo=$row['titulo'];
	    $descripcion=$row['descripcion'];
	    $imagen=$row['imagen'];
	    

	    $clientes['notificacion'][] = array(
	    	'idnotificacion'=> $idprogramacion,
	     	'titulo'=> $titulo, 
	     	'descripcion'=> $descripcion, 
            'imagen'=> base64_encode($imagen)
            );
		
	    
	}
	$close = mysqli_close($conexion) 
	or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

	//Creamos el JSON
	$json_string = json_encode($clientes);
	echo $json_string;
?>