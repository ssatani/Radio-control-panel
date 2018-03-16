<?php 
	require("../modelo/programacion.php");
	require('../conf/conexion.php');
	require('../conf/constantes.php');

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
				$titulo="Insertar programacion";

				$programacion=new programacion(0,$_SESSION["idusuario"],"","","00:00","0");
				break;
			case 'actualizar':
				$titulo="Editar programacion";
				if (isset($_POST["idprogramacion"]) || isset($_SESSION["idusuario"]) || isset($_POST["titulo"]) ||isset($_POST["descripcion"]) || isset($_POST["h_ini"])|| isset($_POST["duracion"])) {
					# code...
					$programacion=new programacion(htmlspecialchars($_POST["idprogramacion"]),htmlspecialchars($_SESSION["idusuario"]),htmlspecialchars($_POST["titulo"]),htmlspecialchars($_POST["descripcion"]),htmlspecialchars($_POST["h_ini"]),htmlspecialchars($_POST["duracion"]));
				} else {
					# code...
					echo "No hay todos los datos";
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
	<form method="POST" enctype="multipart/form-data" id="frmprogramacion" action="#" class="form-horizontal" role="form">
		<input type="hidden" name="accion" value="<?php echo $accion; ?>">
		<input type="hidden" value="<?php echo $programacion->Idprogramacion(); ?>" name="idprogramacion">
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

					<input type="text" value="<?php echo $programacion->Titulo(); ?>" name="titulo" class="form-control" placeholder="Titulo">
				</td>
			</tr>
			<tr>
				<td>
					Descripción:
				</td>
				<td>
					<input type="text" value="<?php echo $programacion->Descripcion(); ?>" name="descripcion" class="form-control" placeholder="Descripcion">
				</td>
			</tr>
			
			<tr>
				<td>
					Hora Inicio:
				</td>
				<td>
					<input type="time" value="<?php echo $programacion->Hora_ini(); ?>" name="h_ini" class="form-control"  >
				</td>
			</tr>
			<tr>
				<td>
					Duración:
				</td>
				<td>
					<input type="number" value="<?php echo $programacion->Duracion(); ?>" name="duracion" class="form-control">Horas
				</td>
			</tr>
			<tr>
				<td>
					Imagen:(Obligatorio)
				</td>
				<td>
					<?php 
					if ($accion=='insertar') {
					?>
						<img src="assets/img/logo-big.png" class="img-rounded" height="100px" width="100px" id="image">
						<input type="file" name="imagen" id="imagen" class="imagen"/>
					<?php
					} else {
					?>
					<img src="<?php echo $url;?>imagen/im_programacion.php?id=<?php echo $programacion->Idprogramacion();?>" alt="" width="100px" height="100px">
					<?php
					}
					?>
					
				</td>
			</tr>
		</table>
	</form>
	<button onclick="EnviarProgramacion();">Enviar</button>
	<button onclick="Cancelar();">Cancelar</button>
</center>