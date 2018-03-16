<?php 
	include "../modelo/artista.php";
	include "../conf/constantes.php";
    
    session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
	}
	else
	{
        require('../conf/conexion.php'); 
		if (isset($_POST["accion"])) {
			# code...
			$accion=$_POST["accion"];
			switch ($accion) {
				case 'insertar':
					$accion="insertar";
					$artista=new artista($_POST["idartista"],$_SESSION["idusuario"],$_POST["nombre"]);
					
                    $limite_kb = 16384;
                    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                    $data='';
                    if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
                        //echo "<script>alert ('Error en la imagen1.');</script>";
                        // Leemos el contenido del archivo temporal en binario.
                        $imagen_temporal = '../assets/img/logo-big.png';
                        $fp = fopen($imagen_temporal, 'r+b');
                        $data = fread($fp, filesize($imagen_temporal));
                        fclose($fp);
                        $data = $conexion->real_escape_string($data);
                    }
                    else{

                        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                        $limite_kb = 16384;

                        if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
                        {
                            // Archivo temporal
                            $imagen_temporal = $_FILES['imagen']['tmp_name'];

                            // Tipo de archivo
                            $tipo = $_FILES['imagen']['type'];

                            // Leemos el contenido del archivo temporal en binario.
                            $fp = fopen($imagen_temporal, 'r+b');
                            $data = fread($fp, filesize($imagen_temporal));
                            fclose($fp);

                            //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
                             $data=file_get_contents($imagen_temporal);

                            // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
                            $data = $conexion->real_escape_string($data);

                            // Insertamos en la base de datos.

                        }
                    }
                    $query="call artista_create('".$artista->Idusuario()."','".$artista->Nombre()."','".$data."');";

                    $resultado=$conexion->query($query);

                    if ($resultado)
                    {
                        echo "Insertado";
                    }
                    else
                    {
                        echo "Ocurrió algun error al copiar el archivo.";
                    }
						
					
					break;
				case 'actualizar':
					$accion="actualizar";
					if (isset($_POST["idartista"]) || isset($_POST["idusuario"]) || isset($_POST["nombre"]))  {
						
						$artista=new artista($_POST["idartista"],$_SESSION["idusuario"],$_POST["nombre"]);
						$query="call artista_update(".$artista->Idartista().",".$artista->Idusuario().",'".$artista->Nombre()."');";
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
					} else {
						# code...
						
					}
					break;
				case 'eliminar':
					$accion="eliminar";
					$artista=new artista($_POST["idartista"],$_SESSION["idusuario"],"");
					$query="call artista_delete('".$artista->Idartista()."');";
					$resultado=$conexion->query($query);
					break;
				case 'buscar':
					# code...
					$accion="buscar";
					$artista=new artista($_POST["idartista"],"","");
					$sql="call artista_create()";
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
        
        <button onclick="AgregarArtista();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +Agregar Artista
        </button>

        <br>
        <br>
    </center>
    <?php 
		$query="call artista_read();";
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
                               <img src="<?php echo $url;?>imagen/im_artista.php?id=<?php echo $row['idartista'];?>" alt="" width="100px" height="100px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"> Artista:<?php echo $row['artista'];?></h4>

                            <button type="button" class="btn btn-danger" onclick="EliminarArtista('<?php echo $row['idartista'];?>')">Eliminar</button>
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


                            <?php 
	 
	 ?>
