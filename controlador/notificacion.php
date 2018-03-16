<?php 
	require("../modelo/notificacion.php");
	require('../conf/conexion.php');
	require('../conf/constantes.php');
	session_start();
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
	}
	else{ 
		if (isset($_POST["accion"])) {
			# code...
			$accion=$_POST["accion"];
			$titulo="";
			switch ($accion) {
				case 'insertar':
					$titulo="Insertar notificacion";
					date_default_timezone_set("America/La_Paz");
					$notificacion=new notificacion(htmlspecialchars($_POST["idnotificacion"]),htmlspecialchars($_SESSION["idusuario"]),htmlspecialchars($_POST["titulo"]),htmlspecialchars($_POST["descripcion"]),strftime("%H:%M  %m/%d/%y"),htmlspecialchars($_POST["nota"]));
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
					$query="CALL noti_create('".$notificacion->Idusuario()."','".$notificacion->Titulo()."','".$notificacion->Descripcion()."','".$notificacion->Fecha()."','".$data."','".$notificacion->Nota()."')";

					$resultado=$conexion->query($query);

				    if ($resultado)
				    {
				        //header('Location: ..\notificacion.php');
				        //echo "<sript>alert('Exito');</script>";
				    }
				    else
				    {
				        echo "<sript>alert ('Ocurrió un error al enviar los datos, porfavor verifiquelos');</script>";
				    }
					break;
				
				case 'eliminar':
					$titulo="Eliminar notificacion";
					$notificacion=new notificacion($_POST["idnotificacion"],$_SESSION["idusuario"],"","",strftime("%H:%M  %m/%d/%y"),"");
					$query="call noti_delete('".$notificacion->Idnotificacion()."');";
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
					$titulo="No hay acciones de  notificacion";
					break;
			}

		} else {
			# code...
			$titulo="Ver notificacion";
		}
		
	}
?>
    <br>
    <center>
        <button onclick="AgregarNotificacion();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +Agregar Notificacion
        </button>
    </center>
    <br>
    <?php 
	$query="call noti_read();";
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
                            <img src="<?php echo $url;?>imagen/im_notificacion.php?id=<?php echo $row['idnotificacion'];?>" alt="" width="100px" height="100px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $row['titulo'];?> <small><i>Publicado a las <?php echo $row['fecha'];?></i></small></h4>
                            <p>
                                <?php echo $row['descripcion'];?>
                            </p>
                            <p><b>Nota:</b>
                                <?php echo $row['nota'];?>
                            </p>
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
