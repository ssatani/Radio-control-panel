<?php
	//$login=$_GET["login"];
	//$password=$_GET["password"];
	if (isset($_GET["estado"])) {
		$estado=$_GET["estado"];

		//$query="SELECT `id_usuarios`, `usuario`, `password`, `nombre` FROM `usuarios` WHERE `usuario`='$login' and `password`='$password'";
		//$resultado=$conexion->query($query);
		session_start(); 
		if ($estado) {
	   		if($row = $resultado->fetch_assoc())
			{
				$_SESSION["id_cuenta"] = $row['id_usuarios'];
				$_SESSION["usuario"] = $row['usuario'];
				$_SESSION["nombre"] = $row['nombre'];
				header('Location: pagina.php');
			}
			else{
				header('Location: index.php');
			}
		}
		else
		{
			session_destroy();
			header('Location: index.php');
		}
	} else {
		# code...
	}
	
	
	


?>