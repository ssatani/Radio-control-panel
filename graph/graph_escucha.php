<?php

	require_once('../conf/conexion.php');
	// establecer el gestro de errores definido por el usuario
	
	//variables que usare en el proceso
	

	$json = array();
	
	if (isset($_GET["idfacebook"]) && isset($_GET["nombre"]) && isset($_GET["urlimagen"])) {
		# code...
		

		$gestor_errores_antiguo = set_error_handler("Errores");

		$idfacebook=htmlspecialchars($_GET["idfacebook"]);
        $nombre=htmlspecialchars($_GET["nombre"]);
        $urlimagen=htmlspecialchars($_GET["urlimagen"]);
        
		$url="https://graph.facebook.com/".$idfacebook."/posts/?access_token=724338654435962|oygmXeAFcVa6wc95Ft6EVTtOyW8";
		$data = file_get_contents($url);

		if ($data=="{\"data\":[]}") {
			$queryescucha = "call escucha_read('$idfacebook','$nombre','$urlimagen');";
		    $resultadoescucha=$conexion->query($queryescucha);

		    while($rowescucha = $resultadoescucha->fetch_assoc())
			{

			    $json['escucha'][] = array(
			    	'idescucha'=> $rowescucha['idescucha'],
			     	'idfacebook'=> $rowescucha['idfacebook'], 
			     	'nombre'=> $rowescucha['nombre'],
			     	'urlimagen'=> $rowescucha['urlimagen']
		            );
			    
			}
		} else {
			
			//echo "Fallo";
		}
		
	} else {
		# code...
	}
	$json_string = json_encode($json);
	echo $json_string;
	



	// función de gestión de errores
	function Errores($errno, $errstr, $errfile, $errline)
	{
	    if (!(error_reporting() & $errno)) {
	        // Este código de error no está incluido en error_reporting
	        return;
	    }
	    switch ($errno) {
	    case E_USER_ERROR:
	        exit(1);
	        break;
	    case E_USER_WARNING:
	        break;
	    case E_USER_NOTICE:
	        break;
	    default:
	        break;
	    }
	    return true;
	}

?>