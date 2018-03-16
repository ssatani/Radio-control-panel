<?php 
	require("../modelo/programacion.php");
	require("../conf/conexion.php");
	require("../conf/constantes.php");

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
					$titulo="Insertar Programacion";
					$programacion=new programacion(htmlspecialchars($_POST["idprogramacion"]),htmlspecialchars($_SESSION["idusuario"]),htmlspecialchars($_POST["titulo"]),htmlspecialchars($_POST["descripcion"]),htmlspecialchars($_POST["h_ini"]),htmlspecialchars($_POST["duracion"]));
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
				    $query="CALL prog_create('".$programacion->Idusuario()."','".$programacion->Titulo()."','".$programacion->Descripcion()."','".$programacion->Hora_ini()."','".$programacion->Duracion()."','".$data."')";

					$resultado=$conexion->query($query);

				    if ($resultado)
				    {
				        //header('Location: ..\programacion.php');
				        //echo "<sript>alert('Exito');</script>";
				    }
				    else
				    {
				        echo "<sript>alert ('Ocurrió un error al enviar los datos, porfavor verifiquelos');</script>";
				    }
						
					break;
				case 'actualizar':
					    $titulo="Editando Programacion";
						$programacion=new programacion(htmlspecialchars($_POST["idprogramacion"]),htmlspecialchars($_SESSION["idusuario"]),htmlspecialchars($_POST["titulo"]),htmlspecialchars($_POST["descripcion"]),htmlspecialchars($_POST["h_ini"]),htmlspecialchars($_POST["duracion"]));
						$query="CALL prog_update('".$programacion->Idprogramacion()."','".$programacion->Idusuario()."','".$programacion->Titulo()."','".$programacion->Descripcion()."','".$programacion->Hora_ini()."','".$programacion->Duracion()."')";

						$resultado=$conexion->query($query);

					    if ($resultado)
					    {
					        //header('Location: ..\programacion.php');
					        //echo "<sript>alert('Exito');</script>";
					    }
					    else
					    {
					        echo "<sript>alert ('Ocurrió un error al enviar los datos, porfavor verifiquelos');</script>";
					    }
					
					break;
				case 'eliminar':
					$titulo="Eliminar Programacion";
					$programacion=new programacion(htmlspecialchars($_POST["idprogramacion"]),$_SESSION["idusuario"],"","","",strftime("%H:%M  %m/%d/%y"));
					$query="call prog_delete('".$programacion->Idprogramacion()."');";
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
					$titulo="No hay acciones de  Programacion";
					break;
			}

		} else {
			# code...
			$titulo="Ver Programacion";
		}
	}	
?>
    <br>
    <center>
        <button onclick="AgregarProgramacion();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +Agregar Programacion
        </button>
    </center>
    <br>


    <?php 
	$query="call prog_read();";
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
                            <img src="<?php echo $url;?>imagen/im_programacion.php?id=<?php echo $row['idprogramacion'];?>" alt="<?php echo $row['titulo'];?>" width="100px" height="100px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $row['titulo'];?></h4>
                            <p>
                                <?php echo $row['descripcion'];?>
                            </p>
                            <p>
                                <b>
                                   Hora Inicio:
                               </b>
                                <?php echo $row['hora_ini'];?>
                            </p>
                            <p>
                                <b>
                                   Duracion:
                               </b>
                                <?php echo $row['duracion'];?> Horas
                            </p>
                             <button onclick="ActualizarProgramacion('<?php echo $row['idprogramacion'];?>','<?php echo $_SESSION['idusuario'];?>','<?php echo $row['titulo'];?>','<?php echo $row['descripcion'];?>','<?php echo $row['hora_ini'];?>','<?php echo $row['duracion'];?>');" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Actualizar
                            </button>
                            <button onclick="EliminarProgramacion('<?php echo $row['idprogramacion'];?>','<?php echo session_id();?>',);" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                Eliminar
                            </button>
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
