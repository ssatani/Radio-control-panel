<?php 
	include "../modelo/ranking.php";
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
					$ranking=new ranking(0,$_POST["idprogramacion"],$_SESSION["idusuario"],$_POST["titulo"],$_POST["descripcion"],strftime("%H:%M  %m/%d/%y"),$_POST["top"]);
		
				    //CONSULTA CON LOS RESULTADOS
				    $query="call ranking_create(".$ranking->Idprogramacion().",".$ranking->Idusuario().",'".$ranking->Titulo()."','".$ranking->Descripcion()."','".$ranking->Fecha()."','".$ranking->Top()."');";
				    $resultado=$conexion->query($query);
		
				    if ($resultado)
				    {
				        //echo "Insertado";
				    }
				    else
				    {
				        echo "<script>alert ('Error al cargar los datos');</script>";
				    }
					
					break;
				case 'actualizar':
					$accion="actualizar";
					$ranking=new ranking($_POST["idranking"],$_POST["idprogramacion"],$_SESSION["idusuario"],$_POST["titulo"],$_POST["descripcion"],strftime("%H:%M  %m/%d/%y"),$_POST["top"]);
		
				    //CONSULTA CON LOS RESULTADOS
				    $query="call ranking_update(".$ranking->Idprogramacion().",".$ranking->Idusuario().",'".$ranking->Titulo()."','".$ranking->Descripcion()."','".$ranking->Fecha()."','".$ranking->Top()."');";
				    $resultado=$conexion->query($query);
		
				    if ($resultado)
				    {
				        //echo "Insertado";
				    }
				    else
				    {
				        echo "<script>alert ('Error al cargar los datos');</script>";
				    }
					break;
				case 'eliminar':
					$accion="eliminar";
					$ranking=new ranking($_POST["idranking"],$_POST["idprogramacion"],$_SESSION["idusuario"],$_POST["titulo"],$_POST["descripcion"],strftime("%H:%M  %m/%d/%y"),$_POST["top"]);
					$query="call ranking_delete('".$ranking->Idranking()."');";
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






    <br>
    <center>
        <button onclick="AgregarRanking();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +Agregar Ranking
        </button>
    </center>
    <br>

    <?php 
		$query="call ranking_read();";
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
                            <img src="<?php echo $url;?>imagen/im_programacion.php?id=<?php echo $row['programacion_idprogramacion'];?>" alt="" width="100px" height="100px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"> <?php echo $row['ranking_titulo'];?> <small><i>Publicado a las <?php echo $row['ranking_fecha'];?></i></small></h4>
                            <p>
                                <?php echo $row['ranking_descripcion'];?>
                            </p>
                            <p><b>Programa:</b>
                                <?php echo $row['programacion_titulo'];?>
                            </p>
                            <button type="button" class="btn btn-primary" onclick="VerTemas(<?php echo $row['ranking_idranking'];?>);">Temas Musicales</button>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ranking<?php echo $row['ranking_idranking'];?>" onclick="MusicaRanking(<?php echo $row['ranking_idranking'];?>)">Ver Botacion</button>

                            <div id="ranking<?php echo $row['ranking_idranking'];?>" class="collapse">
                               
                            </div>
                        </div>
                        
                         <div class="media-right">
                             <h4 class="media-heading">TOP</h4>
                             
                             <p>
                                <center>
                                    <h1>
                                         <?php echo $row['top'];?>       
                                    </h1>
                                    <?php echo $row['votos'];?> Votos.
                                </center>
                                 
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


                        <?php 
	 
	 ?>
