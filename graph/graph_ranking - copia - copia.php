<?php

	require_once('../conf/conexion.php');
	$conexionranking=$conexion;
	$conexionrankingmusica=$conexion;
	/*$query  = "call ranking_has_musica_read(18);";

	if ($conexion->multi_query($query)) {
	    do {
	        if ($result = $conexion->store_result()) {
	            while ($row = $result->fetch_row()) {
	                printf("%s\n", $row[0]);

	                $queryranking = "call ranking_has_musica_read(18);";

				    $resultadoranking=$conexion->multi_query($queryranking);

				    while($rowranking = $resultadoranking->fetch_assoc())
					{

					    echo "sad";
						
					    
					}
	            }
	            $result->free();
	        }
	        if ($conexion->more_results()) {
	            printf("-----------------\n");
	        }
	    } while ($conexion->next_result());
	}
	else{
		echo "string";
	}*/



	/*$queryranking = "CALL ranking_read();";

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
	     	'ranking_fecha'=> $rowranking['ranking_fecha']
            );

	  
			$queryrankingmusica = "CALL ranking_has_musica_read(".$rowranking['ranking_idranking'].");";

		    $resultadorankingmusica=$conexion->query($queryrankingmusica);

		    while($rowrankingmusica = $resultadorankingmusica->fetch_assoc())
			{

			    echo "sad";
				
			    
			}
		
	    
	}
	$json_string = json_encode($json);
	echo $json_string;*/


	$json = array();
	
	  
	/*$resultadorankingmusica = mysqli_query($conexion, " CALL ranking_has_musica_read(18); ");   
	while($row = mysqli_fetch_assoc($resultadorankingmusica)) {   	
		echo "sadssssssssssssssssssssssssss--------------------------";
	}   
	mysqli_free_result($resultadorankingmusica);   
	mysqli_next_result($conexion);*/


	
	





	$resultadoranking = mysqli_query($conexionranking, " CALL ranking_read(); ");   
	while($rowranking = mysqli_fetch_assoc($resultadoranking)) {   
	    	
	    	$json['ranking'][] = array(
	    	'programacion_idprogramacion'=> $rowranking['programacion_idprogramacion'],
	     	'programacion_titulo'=> $rowranking['programacion_titulo'], 
	     	'ranking_idranking'=> $rowranking['ranking_idranking'],
	     	'ranking_titulo'=> $rowranking['ranking_titulo'],
	     	'ranking_descripcion'=> $rowranking['ranking_descripcion'],
	     	'ranking_fecha'=> $rowranking['ranking_fecha']
	        );
	        

	        $resultadorankingmusica = $conexionrankingmusica->query(" CALL ranking_has_musica_read(18); ");   
			while($rowrankingmusica = $resultadorankingmusica->fetch_assoc() ) {   	
				$json['ranking']["musica"] = array(
		    	'idmusica'=> $rowranking['idmusica'],
		     	'titulo'=> $rowranking['titulo']
		        );
			}   
			mysqli_free_result($resultadorankingmusica);   
			mysqli_next_result($conexionrankingmusica);
	}   
	mysqli_free_result($resultadoranking);   
	mysqli_next_result($conexionranking); 


	
	
	

	//cerrar la conexion 
	mysqli_close($conexionrankingmusica);
	//escribir el json
	$json_string = json_encode($json);
	echo $json_string;




















	/*
		$db = mysqli_connect([...]);   
		  
		$r = mysqli_query($db, " CALL getSomething(2); ");   
		while($row = mysqli_fetch_assoc($r)) {   
		      print_r($row);   
		}   
		  
		mysqli_free_result($r);   
		mysqli_next_result($db);   
		  
		$r = mysqli_query($db, " CALL getSomethingElse(); ");   
		while($row = mysqli_fetch_assoc($r)) {   
		      print_r($row);   
		}   

		mysqli_free_result($r); 
		mysqli_next_result($db);  
		mysqli_close($db);
	*/
?>