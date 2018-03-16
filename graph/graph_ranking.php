<?php

	require_once('../conf/conexion.php');

	$queryranking = "CALL ranking_read();";

    $resultadoranking=$conexion->query($queryranking);

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
            'votos'=> $rowranking['votos']
            );
	}
	$json_string = json_encode($json);
	echo $json_string;
?>