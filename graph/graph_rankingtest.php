<?php
	if (isset($_GET["idescucha"])) {
		$idescucha=htmlspecialchars($_GET["idescucha"]);

	} else {
		echo "[]";
		exit();
	}
	
	require_once('../conf/conexion.php');

	$queryranking = "CALL ranking_read();";

    $resultadoranking=$conexion->query($queryranking);
	mysqli_next_result($conexion);   

    $json = array(); //creamos un array
    while($rowranking = $resultadoranking->fetch_assoc())
	{

	    $json['ranking'][] = array(
	    	'programacion_idprogramacion'=> $rowranking['programacion_idprogramacion'],
	     	'programacion_titulo'=> $rowranking['programacion_titulo'], 
	     	'ranking_idranking'=> $rowranking['ranking_idranking'],
	     	'ranking_titulo'=> $rowranking['ranking_titulo'],
	     	'ranking_descripcion'=> $rowranking['ranking_descripcion'],
	     	'ranking_fecha'=> $rowranking['ranking_fecha'],
            'top'=> $rowranking['top'],
            'votos'=> $rowranking['votos'],
            'musica' => musicas($conexion,$rowranking['ranking_idranking'],$idescucha)
            );	    
	}

	$json_string = json_encode($json);
    echo $json_string;
	function musicas($conexion,$idranking,$idescucha){
		$jsontest = array(); //creamos un array
		$query = "CALL ranking_has_musica_read_idescucha('$idranking','$idescucha');";  
	    $resultado=$conexion->query($query);
		mysqli_next_result($conexion);  
	    $json = array(); //creamos un array
	    while($row = $resultado->fetch_assoc())
		{
		   $jsontest[] = array(
	    		'idmusica'=> $row['idmusica'],
                'titulo'=> $row['titulo'], 
                'fecha'=> $row['fecha'],
                'idartista'=> $row['idartista'],
                'artista'=> $row['artista'],
                'conteo'=> $row['conteo'],
                'voto' => $row['voto']
            );
		}
		//mysqli_free_result($row); 
		mysqli_next_result($conexion);
		return $jsontest;
	}
	mysqli_close($conexion);
?>