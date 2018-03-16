<?php 
	require("../modelo/musica.php");
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
				$titulo="Insertar musica";
				setlocale(LC_TIME,"es_ES");

				$musica=new musica(0,$_SESSION["idusuario"],0,0,"",strftime("%H:%M  %m/%d/%y"));
				break;
			case 'actualizar':
				# code...
				$titulo="Editar musica";
				if (isset($_POST["idmusica"]) || isset($_POST["idusuario"]) || isset($_POST["idartista"]) ||isset($_POST["idgenero"]) || isset($_POST["titulo"])) {
					# code...
					$musica=new musica($_POST["idmusica"],$_POST["idusuario"],$_POST["idartista"],$_POST["idgenero"],$_POST["titulo"],getdate());
				} else {
					# code...
					exit();
				}
				break;
			default:
				# code...
				$accion="insertar";
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
        <form method="POST" enctype="multipart/form-data" id="frmmusica" action="#" class="form-horizontal" role="form">
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="idmusica" value="<?php echo $musica->Idmusica();?>">
            <input type="hidden" name="idusuario" value="<?php echo $musica->Idusuario();?>">


            <input type="hidden" name="fecha" value="<?php echo $musica->Fecha();?>">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <table>
                <tr>
                    <td>
                        Artista:
                    </td>
                    <td>
                        <select name="idartista">
                            <?php 
								

								if($resultadoartistas){
									while($row = $resultadoartistas->fetch_assoc()){
							?>
                                <option value="<?php echo $row['idartista']; ?>">
                                    <?php echo $row['artista']; ?>
                                </option>
                                <?php 
									}
								}
							?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Genero:
                    </td>
                    <td>
                        <select name="idgenero">

                            <?php 
								
								
								if($resultadogeneros){
									while($row = $resultadogeneros->fetch_assoc()){
							?>
                                <option value="<?php echo $row['idgenero']; ?>">
                                    <?php echo $row['genero']; ?>
                                </option>
                                <?php 
									}
								}
								else{

								}
							?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        Musica:
                    </td>
                    <td>
                        <input type="text" name="titulo" value="<?php echo $musica->Titulo();?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Archivo:
                    </td>
                    <td>
                        <input type="file" name="music" id="music">
                    </td>
                </tr>

            </table>
        </form>
        <button onclick="EnviarMusica();">
            Enviar
        </button>
        <button onclick="Cancelar();">
            Cancelar
        </button>
    </center>
