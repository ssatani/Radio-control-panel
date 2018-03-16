<?php 
	require("../modelo/usuario.php");
	require('../conf/conexion.php');
	require('../conf/constantes.php');
	session_start();
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
	}
	else{ 
		if (isset($_POST["accion"])||isset($_POST["token"])) {
			if (isset($_POST["token"])==session_id()) {
				$accion=$_POST["accion"];
				$titulo="";
				switch ($accion) {
					case 'insertar':
						$titulo="Insertar usuario";
						$usuario=new usuario(
							0,
							htmlspecialchars($_POST["idtipo"]),
							htmlspecialchars($_POST["usuario"]),
							htmlspecialchars($_POST["contrasena"]),
							htmlspecialchars($_POST["nombre"]),
							htmlspecialchars($_POST["apellidos"]),
							htmlspecialchars($_POST["ci"]),
							htmlspecialchars($_POST["telefono"]),
							htmlspecialchars($_POST["correo"]));
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
					    // Insertamos en la base de datos.
					    $query="CALL usu_create('".$usuario->IdTipo()."','".$usuario->Usuario()."','".$usuario->Contrasena()."','".$usuario->Nombre()."','".$usuario->Apellidos()."','".$usuario->Ci()."','".$data."','".$usuario->Telefono()."','".$usuario->Correo()."')";
						$resultado=$conexion->query($query);

					    if ($resultado)
					    {
					        //header('Location: ..\usuario.php');
					        //echo "<sript>alert('Exito');</script>";
					    }
					    else
					    {
					        echo "<sript>alert ('Ocurrió un error al enviar los datos, porfavor verifiquelos');</script>";
					    }
						
						break;
					
					case 'actualizar':
						$titulo="Actualizar Usuario";
						$usuario=new usuario(
							htmlspecialchars($_POST["idusuario"]),
							htmlspecialchars($_POST["idtipo"]),
							htmlspecialchars($_POST["usuario"]),
							htmlspecialchars($_POST["contrasena"]),
							htmlspecialchars($_POST["nombre"]),
							htmlspecialchars($_POST["apellidos"]),
							htmlspecialchars($_POST["ci"]),
							htmlspecialchars($_POST["telefono"]),
							htmlspecialchars($_POST["correo"])
						);
						if (isset($_POST["anteriorcontrasena"])) {
							$antcon=htmlspecialchars($_POST["anteriorcontrasena"]);
							
							if ($antcon=="") {
								# code...
								$query="call usu_update('".$usuario->Idusuario()."','".$usuario->IdTipo()."','".$usuario->Usuario()."','".$usuario->Nombre()."','".$usuario->Apellidos()."','".$usuario->Ci()."','".$usuario->Telefono()."','".$usuario->Correo()."');";
							} else {
								# code...
								$query="call usu_updateverificando('".$usuario->Idusuario()."','".$usuario->IdTipo()."','".$usuario->Usuario()."','".password_hash(htmlspecialchars($_POST["anteriorcontrasena"]), PASSWORD_DEFAULT)."','".$usuario->Contrasena()."','".$usuario->Nombre()."','".$usuario->Apellidos()."','".$usuario->Ci()."','".$usuario->Telefono()."','".$usuario->Correo()."');";
							}
						} else {
							$query="call usu_update('".$usuario->Idusuario()."','".$usuario->IdTipo()."','".$usuario->Usuario()."','".$usuario->Contrasena()."','".$usuario->Nombre()."','".$usuario->Apellidos()."','".$usuario->Ci()."','".$usuario->Telefono()."','".$usuario->Correo()."');";
						}
						if ($resultado=$conexion->query($query)){
							echo "<script>alert('$query');</script>";
						}else{
							echo "<script>alert('Nose pudo actualizar usuario.');</script>";
						}
						break;
					case 'eliminar':
						$titulo="Eliminar usuario";
						$usuario=new usuario(htmlspecialchars($_POST["idusuario"]),"","","","","","","","");
						$query="call usu_delete('".$usuario->Idusuario()."');";
						if ($resultado=$conexion->query($query)){
						}else{
							echo "<script>alert('Error en la Eliminacion del Usuario.');</script>";
						}

						break;
					default:
						# code...
						$titulo="No hay acciones de  usuario";
						break;
				}
			} else {
				
			}
		} else {
			# code...
			$titulo="Ver usuario";
		}
		
	}
?>
    <br>
    <center>
        <button onclick="AgregarUsuario();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +Agregar usuario
        </button>

    </center>
    <br>

    <?php 
	$query="call usu_read(".$_SESSION["idtipo"].");";
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
                            <img src="<?php echo $url;?>imagen/im_usuario.php?id=<?php echo $row['idusuario'];?>" alt="" width="100px" height="100px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $row['nombre']." ".$row['apellidos'];?></h4>
                            <p>
                                <b>Usuario:</b>
                                <?php echo $row['usuario'];?>
                            </p>
                            <p>
                                <b>Ci:</b>
                                <?php echo $row['ci'];?>
                            </p>

                            <p>
                                <b>Telefono:</b>
                                <?php echo $row['telefono'];?>
                            </p>

                            <p>
                                <b>Correo:</b>
                                <?php echo $row['correo'];?>
                            </p>


                            <button onclick="ActualizarUsuario('<?php echo $row['idusuario'];?>','<?php echo $row['idtipo'];?>','<?php echo $row['usuario'];?>','<?php echo $row['contrasena'];?>','<?php echo $row['nombre'];?>','<?php echo $row['apellidos'];?>','<?php echo $row['ci'];?>','<?php echo $row['telefono'];?>','<?php echo $row['correo'];?>');" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Actualizar
                            </button>
                            <button onclick="EliminarUsuario('<?php echo $row['idusuario'];?>','<?php echo session_id();?>');" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
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
