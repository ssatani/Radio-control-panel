<?php 
	require("../modelo/notificacion.php");
	require("../conf/constantes.php");
	$accion="insertar";
	session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ../login.php');
	}else{ 
	   	$token=session_id();
	}
	
	if (isset($_POST["accion"])) {
		# code...
		$accion=$_POST["accion"];
		switch ($accion) {
			case 'insertar':
				$titulo="Nueva notificacion";

				$notificacion=new notificacion(0,htmlspecialchars($_SESSION["idusuario"]),"","",strftime("%H:%M  %m/%d/%y"),"");
				break;
			case 'actualizar':
				$titulo="Editar notificacion";
				if (isset($_POST["idnotificacion"]) || isset($_SESSION["idusuario"]) || isset($_POST["titulo"]) ||isset($_POST["descripcion"]) || isset($_POST["fecha"])|| isset($_POST["nota"])) {
					# code...
					$notificacion=new notificacion(htmlspecialchars($_POST["idnotificacion"]),htmlspecialchars($_POST["idusuario"]),htmlspecialchars($_POST["titulo"]),htmlspecialchars($_POST["descripcion"]),strftime("%H:%M  %m/%d/%y"),htmlspecialchars($_POST["nota"]));
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
	<form method="POST" enctype="multipart/form-data" id="frmnotificacion" action="#"  class="form-horizontal" role="form">
		<input type="hidden" name="accion" value="<?php echo $accion; ?>">
		<input type="hidden" name="idnotificacion" value="<?php echo $notificacion->Idnotificacion(); ?>">
		<input type="hidden" name="fecha" value="<?php echo $notificacion->Fecha(); ?>">
	    	<h2>
	    		<?php 
					echo $titulo;
				?>
	    	</h2>
		    <table border="1px">

				<tr>
					<td>
						Titulo:
					</td>
					<td>

						<input type="text" name="titulo" value="<?php echo $notificacion->Titulo(); ?>" class="form-control" placeholder="Titulo">
					</td>
				</tr>
				<tr>
					<td>
						Descripción:
					</td>
					<td>
						<input type="text" name="descripcion" value="<?php echo $notificacion->Descripcion(); ?>" class="form-control" placeholder="Descripcion">
					</td>
				</tr>
				<tr>
					<td>
						Nota:
					</td>
					<td>
						<input type="text" name="nota" value="<?php echo $notificacion->Nota(); ?>" class="form-control" placeholder="Nota">
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
						 <input type="file" name="imagen" id="imagen" />
						<?php
						} else {
						?>
						<img src="<?php echo $url;?>imagen/im_notificacion.php?id=<?php echo $notificacion->Idnotificacion();?>" alt="" width="100px" height="100px">
						<?php
						}
						?>
					</td>
				</tr>
			</table>

	</form>
	<button onclick="EnviarNotificacion();">
		Enviar
	</button>
	<button onclick="Cancelar();">
		Cancelar
	</button>
</center>
			