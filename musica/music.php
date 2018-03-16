<?php
	require('../conf/conexion.php');
	if (isset($_GET["idmusica"])) {
		$id= htmlspecialchars($_GET["idmusica"]);
		if ($id > 0)
		{
	   		$query = "CALL musica_read_mp3('$id');";
		    $resultado=$conexion->query($query);
		    if($row = $resultado->fetch_assoc()){
				$audio = $row['archivo']; 
				header("Content-Type: audio/mpeg");
		    	echo $audio;
			}
			else{
				echo "Error".$query;
			}
		}
	} else {
		echo "MusicaNacional es la mejor";
	}
	
	
?>
<title>Radio Online.mp3</title>