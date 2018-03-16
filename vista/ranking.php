<?php 
	require("../modelo/ranking.php");
	require('../conf/conexion.php');

	//$queryartistas="CALL artista_read();";
	//$querygeneros="CALL genero_read();";
	$queryartistas="SELECT `idartista`, `artista` FROM `artista` WHERE 1";
	$querygeneros="SELECT `idgenero`, `genero` FROM `genero` WHERE 1";
	$resultadoartistas=$conexion->query($queryartistas);
	$resultadogeneros=$conexion->query($querygeneros);




	$accion="insertar";
	session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
	}else{ 
	   	$token=session_id();
	}
	
	if (isset($_POST["accion"])) {
		# code...
		$accion=$_POST["accion"];
		switch ($accion) {
			case 'insertar':
				# code...
				$titulo="Insertar Ranking";
				setlocale(LC_ALL,"es_ES");

				if (isset($_POST["idprogramacion"])) {
					$ranking=new ranking(0,$_POST["idprogramacion"],$_SESSION["idusuario"],"","",strftime("%H:%M  %m/%d/%y"),0);
				} else {
					$ranking=new ranking(0,0,$_SESSION["idusuario"],"","",strftime("%H:%M  %m/%d/%y"),0);
				}
				break;
			case 'actualizar':
				# code...
				$titulo="Editar Ranking";
				if (isset($_POST["idranking"]) || isset($_POST["idprogramacion"]) || isset($_POST["idusuario"]) ||isset($_POST["titulo"]) || isset($_POST["descripcion"])|| isset($_POST["top"])) {
					# code...
					$ranking=new ranking($_POST["idranking"],$_POST["idprogramacion"],$_POST["idusuario"],$_POST["titulo"],$_POST["descripcion"],getdate(),$_POST["top"]);
				} else {
					# code...
					
				}
				break;
			default:
				# code...
				break;
		}
	} else {
		# code...
		exit();
	}

?>
    <center>
        <h1>
			<?php 
				echo $titulo;
		 	?>
		</h1>
        <form action="ranking_proc.php" method="POST" enctype="multipart/form-data" id="frmranking" action="#" class="form-horizontal" role="form">
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="idranking" value="<?php echo $ranking->Idranking();?>">
            <input type="hidden" name="idusuario" value="<?php echo $ranking->Idusuario();?>">
            <input type="hidden" name="fecha" value="<?php echo $ranking->Fecha();?>">


            <table border="1px">
                <?php 
				if ($ranking->Idprogramacion() > 0) {
			?>
                    <input type="hidden" name="idprogramacion" value="<?php echo $ranking->Idprogramacion();?>">
                    <?php
				} else {

			?>
                        <tr>
                            <td>
                                Titulo:
                            </td>
                            <td>
                                <input type="text" name="titulo" value="<?php echo $ranking->Titulo();?>">
                            </td>
                        </tr>
                        <?php 
					$query="call prog_read();";
				    if ($resultado=$conexion->query($query)){
			?>
                            <tr>
                                <td>
                                    Programacion:
                                </td>
                                <td>
                                    <select name="idprogramacion">
                                        <?php
			    	while($row = $resultado->fetch_assoc())
					{
			?>
                                            <option value="<?php echo $row['idprogramacion']; ?>">
                                                <?php echo $row['titulo'];?>
                                            </option>


                                            <?php 
					}
			?>
                                    </select>
                                </td>
                            </tr>
                            <?php 
					}
					else
				    {
			?>

                                <?php        
			    	}
			?>

                                    <?php
				}
			?>





                                        <tr>
                                            <td>
                                                Descripcion:
                                            </td>
                                            <td>
                                                <textarea name="descripcion" rows="5" cols="40">
                                                    <?php echo $ranking->Descripcion();?>
                                                </textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Numero de canciones:
                                            </td>
                                            <td>
                                                <input type="number" name="top" value="<?php echo $ranking->Top();?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="hidden" name="token" value="<?php echo $token ?>">
                                            </td>
                                        </tr>
            </table>
        </form>
        <button onclick="EnviarRankings();">Enviar</button>
        <button onclick="Cancelar();">Cancelar</button>
    </center>
