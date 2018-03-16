<?php 
	include "../modelo/genero.php";
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
				$titulo="Insertar Genero";
				$genero=new genero("0","");
				break;
			case 'actualizar':
				# code...
				$accion="actualizar";
				$titulo="Editar Genero";
				if (isset($_POST["idgenero"]) || isset($_POST["nombre"])) {
					# code...
					$genero=new genero($_POST["idgenero"],$_POST["nombre"]);
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
			Agregar Genero
		</h1>
        <form method="POST" enctype="multipart/form-data" id="frmgenero" action="#"  class="form-horizontal" role="form">
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="idgenero" value="<?php echo $genero->Idgenero();?>">
            <table>
                <tr>
                    <td>
                        Genero:
                    </td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo $genero->Nombre();?>">
                    </td>
                </tr>
                <tr>
                   
                </tr>
            </table>
        </form>
        <button onclick="EnviarGenero();">
            Enviar
        </button>
        <button onclick="Cancelar();">
            Cancelar
        </button>
    </center>
