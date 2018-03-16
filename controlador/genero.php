<?php 
	include "../modelo/genero.php";
    session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
	}
	else
	{
        require('../conf/conexion.php'); 
		if (isset($_POST["accion"])) {
			if (isset($_POST["idgenero"])) {
				if (isset($_POST["nombre"])) {
					$genero=new genero($_POST["idgenero"],$_POST["nombre"]);
				} else {
					exit();
				}
				
			} else {
				exit();
			}
			
			$genero=new genero(htmlspecialchars($_POST["idgenero"]),htmlspecialchars($_POST["nombre"]));
			$accion=htmlspecialchars($_POST["accion"]);
			switch ($accion) {
				case 'insertar':                    
					$accion="insertar";
				    //CONSULTA CON LOS RESULTADOS
				    $query="call genero_create('".$genero->Nombre()."');";
				    $resultado=$conexion->query($query);
				    if ($resultado)
				    {
				       
				    }
				    else
				    {
				        echo "Error al Insertar";
				    }
					break;
				case 'actualizar':
					$accion="actualizar";
					

				    //CONSULTA CON LOS RESULTADOS
				    $query="call genero_update('".$genero->Idgenero()."','".$genero->Nombre()."');";
				    
				    $resultado=$conexion->query($query);

				    if ($resultado)
				    {
				    }
				    else
				    {
				        echo "No se Actualizo Correctamente.";
				    }
					break;
				case 'eliminar':
					$accion="eliminar";
					$query="call genero_delete('".$genero->Idgenero()."');";
				    
				    $resultado=$conexion->query($query);

				    if ($resultado)
				    {
                        
				    }
				    else
				    {
				        echo "No se Elimino.";
				    }
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

        <button onclick="AgregarGenero();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +Agregar Genero
        </button>

        <br>
    </center>
    <?php 
		$query="call genero_read();";
	    if ($resultado=$conexion->query($query)){
            $i=1;
	?>
       
            <?php
	    	while($row = $resultado->fetch_assoc())
			{
	?>
             <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <?php echo $i++.".-";?>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $row['genero'];?></h4>
                            
                            <button type="button" class="btn btn-warning" onclick="ActualizarGenero('<?php echo $row['idgenero'];?>','<?php echo $row['genero'];?>')" data-toggle="modal" data-target="#myModal">Actualizar</button>
                            
                            <button type="button" class="btn btn-danger" onclick="EliminarGenero('<?php echo $row['idgenero'];?>','<?php echo $row['genero'];?>')">Eliminar</button>
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


               