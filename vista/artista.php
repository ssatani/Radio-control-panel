<?php 
	include "../modelo/artista.php";
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
                
				$accion="insertar";
				$titulo="Insertar Artista";

				$artista=new artista("0",$_SESSION["idusuario"],"");
				break;
			case 'actualizar':
				# code...
				$accion="actualizar";
				$titulo="Editar Artista";
				if (isset($_POST["idartista"]) || isset($_POST["nombre"])) {
					# code...
					$artista=new artista($_POST["idartista"],$_SESSION["idusuario"],$_POST["nombre"]);
					
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
            <form method="POST" enctype="multipart/form-data" id="frmartista" action="#"  class="form-horizontal" role="form">
                <table>
                    <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                    <input type="hidden" name="idartista" value="<?php echo $artista->Idartista();?>">
                    <input type="hidden" name="idusuario" value="<?php echo $artista->Idusuario();?>">

                    <tr>
                        <td>
                            Artista:
                        </td>
                        <td>
                            <input type="text" name="nombre" value="<?php echo $artista->Nombre();?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Imagen:
                        </td>
                        <td>

                            <?php 
						if ($accion=='insertar') {
						?>
                                <img src="assets/img/logo-big.png" class="img-rounded" height="100px" width="100px" id="image">

                                <input type="file" name="imagen" id="imagen" class="file" multiple=true data-preview-file-type="any" />


                                <?php
						} else {
						?>

                                    <img src="<?php echo $url;?>imagen/im_artista.php?id=<?php echo $artista->IdArtista();?>" alt="" width="100px" height="100px">
                                    <?php
						}
						?>
                        </td>
                    </tr>

                    <input type="hidden" name="token" value="<?php echo $token ?>">




                </table>

            </form>
            <button onclick="EnviarArtista();">
                Enviar
            </button>
            <button onclick="Cancelar();">
                Cancelar
            </button>
        </center>

