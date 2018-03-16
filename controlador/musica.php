<?php 
	include "../modelo/musica.php";
	require('../conf/conexion.php');
	require('../conf/constantes.php');
	
	session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
	}
	else
	{
		if (isset($_POST["accion"])) {
			# code...
			$accion=$_POST["accion"];
			switch ($accion) {
				case 'insertar':
					$accion="insertar";
					$musica=new musica(htmlspecialchars($_POST["idmusica"]),$_SESSION["idusuario"],htmlspecialchars($_POST["idartista"]),htmlspecialchars($_POST["idgenero"]),htmlspecialchars($_POST["titulo"]),strftime("%H:%M  %m/%d/%y"));
					if (!isset($_FILES["music"]) || $_FILES["music"]["error"] > 0){
						echo "<script>alert ('Musica Invalida.');</script>";
					}
					else{
						
						$permitidos = array("audio/mp3");
						//if (in_array($_FILES['music']['type'], $permitidos)){
							// Archivo temporal
						    $archivo_temporal = $_FILES['music']['tmp_name'];

						    // Tipo de archivo
						    $tipo = $_FILES['music']['type'];

						    // Leemos el contenido del archivo temporal en binario.
						    $fp = fopen($archivo_temporal, 'r+b');
						    $data = fread($fp, filesize($archivo_temporal));
						    fclose($fp);
						    
						    //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
						    //$data=file_POST_contents($archivo_temporal);

						    // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
						    $data = $conexion->real_escape_string($data);

						    //CONSULTA CON LOS RESULTADOS
						    $query="call musica_create(".$musica->Idusuario().",".$musica->Idartista().",".$musica->Idgenero().",'".$musica->Titulo()."','".$data."','".$musica->Fecha()."');";
						    $resultado=$conexion->query($query);
						    //echo ">".$query;
						    if ($resultado)
						    {
						        //echo "Insertado";
						    }
						    else
						    {
						        echo "<script>alert ('Error al cargar los datos');</script>";
						    }
						/*}
						else{
							echo "Formato no permitido";
						}*/
						
					}
					break;
				case 'actualizar':
					$accion="actualizar";
					$musica=new musica(htmlspecialchars($_POST["idmusica"]),$_SESSION["idusuario"],htmlspecialchars($_POST["idartista"]),htmlspecialchars($_POST["idgenero"]),htmlspecialchars($_POST["titulo"]),strftime("%H:%M  %m/%d/%y"));
                    
					$query="call musica_update('".$musica->Idmusica()."');";
					if ($resultado=$conexion->query($query)){

					}else{

					}
					break;
				case 'eliminar':
					$accion="eliminar";
					$musica=new musica(htmlspecialchars($_POST["idmusica"]),$_SESSION["idusuario"],"","","",strftime("%H:%M del %d/%m/%y"));
					$query="call musica_delete('".$musica->Idmusica()."');";
					if ($resultado=$conexion->query($query)){

					}else{

					}

					break;
				case 'buscar':
					# code...
					$accion="buscar";
					
					break;
				default:
					# code...
					$accion="";
					break;

			}

		} else {
			# code...
			
		}
	}
	
 ?>

    <center>
        <br>

        <button onclick="AgregarMusica();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +Agregar Musica
        </button>

        <br>
    </center>

    <?php 
		$query="call musica_read();";
	    if ($resultado=$conexion->query($query)){
	?>
            <?php
	    	while($row = $resultado->fetch_assoc())
			{
	?>
               <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                             <img src="<?php echo $url;?>imagen/im_artista.php?id=<?php echo $row['artista_idartista'];?>" alt="" width="100px" height="100px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $row['musica_titulo'];?> <small><i>Publicado a las <?php echo $row['musica_fecha'];?></i></small></h4>
                            <p>
                               <b>
                                   Genero:
                                </b>
                                <?php echo $row['genero_genero'];?>
                            </p>
                            <p>
                                <b>
                                    Artista:
                                </b>
                                <?php echo $row['artista_artista'];?>
                            </p>

                            <button type="button" class="btn btn-danger" onclick="EliminarMusica('<?php echo $row['musica_idmusica'];?>')">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
               
                       
    

                <?php 
			}
	?>
                    <?php 
		}
		else
	    {
	?>

                        <?php        
	    }
	?>
