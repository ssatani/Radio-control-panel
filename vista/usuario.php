<?php 
	require("../modelo/usuario.php");
	require('../conf/conexion.php');
	require('../conf/constantes.php');
	$accion="insertar";
	session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ../login.php');
		exit();
	}else{ 
	   	$token=session_id();
	}
	
	if (isset($_POST["accion"])) {
		# code...
		$accion=$_POST["accion"];
		switch ($accion) {
			case 'insertar':
				$titulo="Insertar usuario";
				$usuario=new usuario(0,0,"","","","","",'',"");
				break;
			case 'actualizar':
				$titulo="Editar usuario";
				if (isset($_POST["idusuario"]) || 
					isset($_POST["idtipo"]) ||
					isset($_POST["usuario"]) || 
					isset($_POST["contrasena"])|| 
					isset($_POST["nombre"])|| 
					isset($_POST["apellidos"])|| 
					isset($_POST["ci"])|| 
					isset($_POST["telefono"])|| 
					isset($_POST["correo"])) {
					$usuario=new usuario(htmlspecialchars($_POST["idusuario"]),htmlspecialchars($_POST["idtipo"]),htmlspecialchars($_POST["usuario"]),htmlspecialchars($_POST["contrasena"]),htmlspecialchars($_POST["nombre"]),htmlspecialchars($_POST["apellidos"]),htmlspecialchars($_POST["ci"]),htmlspecialchars($_POST["telefono"]),htmlspecialchars($_POST["correo"]));
				} else {
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
<form method="POST" enctype="multipart/form-data"  id="frmusuario" action="#" class="form-horizontal" role="form">
	<input type="hidden" name="accion" value="<?php echo $accion; ?>">
	<input type="hidden" name="token" value="<?php echo $token; ?>">
	<input type="hidden" name="idusuario" value="<?php echo $usuario->Idusuario();; ?>">
 
    	<h2>
    		<?php 
				echo $titulo;
			?>
    	</h2>
	    <table border="1px">
			<tr>
				<td>
					Tipo:
				</td>
				<td>

					<select name="idtipo" class="form-control">
							<?php 
							$query="CALL tipo_read()";
							$resultado=$conexion->query($query);

								if($resultado){
									while($row = $resultado->fetch_assoc()){
							?>
											<option value="<?php echo $row['idtipo']; ?>">
										    	<?php echo $row['tipo']; ?>
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
					Usuario:
				</td>
				<td>
					<input type="text" name="usuario" value="<?php echo $usuario->Usuario(); ?>" class="form-control" placeholder="Usuario">
				</td>
			</tr>
			<?php 
				if ($accion=="actualizar") {
			?>
				<tr>
					<td>
						Anterior Contraseña:
					</td>
					<td>
						<input type="password" name="anteriorcontrasena" class="form-control" id="anteriorcontrasena" placeholder="Contraseña">
					</td>
				</tr>
				<tr>
					<td>
						Contraseña:
					</td>
					<td>
						<input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
					</td>
				</tr>
				<tr>
					<td>
						Confirma Contraseña:
					</td>
					<td>
						<input type="password" name="contrasena1" class="form-control" id="confirmarcontrasena" placeholder="Contraseña">
					</td>
				</tr>
			<?php 
				} else {
			?>
				<tr>
					<td>
						Contraseña:
					</td>
					<td>
						<input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
					</td>
				</tr>
					<tr>
					<td>
						Confirma Contraseña:
					</td>
					<td>
						<input type="password" name="contrasena1" class="form-control" id="confirmarcontrasena" placeholder="Contraseña">
					</td>
				</tr>
			<?php 
				}
			?>
			<tr>
				<td>
					Nombre:
				</td>
				<td>
					<input type="text" name="nombre" value="<?php echo $usuario->Nombre(); ?>" class="form-control" placeholder="Nombre">
				</td>
			</tr>
			<tr>
				<td>
					Apellidos:
				</td>
				<td>
					<input type="text" name="apellidos" value="<?php echo $usuario->Apellidos(); ?>" class="form-control" placeholder="Apellidos">
				</td>
			</tr>
			<tr>
				<td>
					CI:
				</td>
				<td>
					<input type="number" name="ci" value="<?php echo $usuario->Ci(); ?>" class="form-control" placeholder="Cedula de Identidad">
				</td>
			</tr>
			<tr>
				<td>
					Fotografia:
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
					<img src="<?php echo $url;?>imagen/im_usuario.php?id=<?php echo $usuario->Idusuario();?>" alt="" width="100px" height="100px">
					<?php
					}
					?>
					
				</td>
			</tr>

			<tr>
				<td>
					Telefono:
				</td>
				<td>
					<input type="number" name="telefono" value="<?php echo $usuario->Telefono(); ?>" class="form-control" placeholder="Telefono o Celular">
				</td>
			</tr>
			<tr>
				<td>
					Correo:
				</td>
				<td>
					<input type="email" name="correo" value="<?php echo $usuario->Correo(); ?>" class="form-control" placeholder="Correo">
				</td>
			</tr>
		</table>
	
</form>
<button onclick="EnviarUsuario();">Enviar</button>
<button onclick="Cancelar();">Cancelar</button>

</center>