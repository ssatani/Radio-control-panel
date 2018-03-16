<?php
	$json = array(); //creamos un array
	if(isset($_GET["r"])){
		$idranking=htmlspecialchars($_GET["r"]);

		if ($idranking>0) {
            
            if(isset($_GET["idescucha"])){
                $idescucha=htmlspecialchars($_GET["idescucha"]);
                $queryranking = "CALL ranking_has_musica_read_idescucha('$idranking','$idescucha');";
                resultadorankingidescucha($queryranking);
            }else{
                $queryranking = "CALL ranking_has_musica_read('$idranking');";  
                resultadoranking($queryranking);
            }
		} else {
			exit();
		}	
	}else{
        echo "[]";
        exit();
    }
    
	

    function resultadoranking($queryranking){

        $json = array(); //creamos un array
	    require_once('../conf/conexion.php');
        if($resultadoranking=$conexion->query($queryranking)){
            while($rowranking = $resultadoranking->fetch_assoc())
            {

                $json['rankingmusica'][] = array(
                    'idmusica'=> $rowranking['idmusica'],
                    'titulo'=> $rowranking['titulo'], 
                    'fecha'=> $rowranking['fecha'],
                    'idartista'=> $rowranking['idartista'],
                    'artista'=> $rowranking['artista'],
                    'conteo'=> $rowranking['conteo'],
                    );
            }
            $json_string = json_encode($json);
            echo $json_string;
        }
        else{
            echo "[]";
        }

    }
    function resultadorankingidescucha($queryranking){
        $json = array(); //creamos un array
	    require_once('../conf/conexion.php');
        if($resultadoranking=$conexion->query($queryranking)){
            while($rowranking = $resultadoranking->fetch_assoc())
            {

                $json['rankingmusica'][] = array(
                    'idmusica'=> $rowranking['idmusica'],
                    'titulo'=> $rowranking['titulo'], 
                    'fecha'=> $rowranking['fecha'],
                    'idartista'=> $rowranking['idartista'],
                    'artista'=> $rowranking['artista'],
                    'conteo'=> $rowranking['conteo'],
                    'voto' => $rowranking['voto']
                    );
            }
            $json_string = json_encode($json);
            echo $json_string;
        }
        else{
            echo "['error']";
        }

    }
?>
