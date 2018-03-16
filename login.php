<?php
  session_start(); 
  if (!isset($_SESSION["idusuario"]) || !isset($_SESSION["usuario"]) || !isset($_SESSION["nombre"]) || !isset($_SESSION["apellidos"]) || !isset($_SESSION["ci"])){ 

  }else{ 
      header('Location: index.php');
      exit();
  }
  if(isset($_POST["username"]) || isset($_POST["password"])){

    require('conf/conexion.php');
    require('conf/constantes.php');
    $usuario = htmlspecialchars($_POST["username"]);
    $contraseña=htmlspecialchars($_POST["password"]);

    $query="CALL login('$usuario');";
    
    if ($resultado=$conexion->query($query)){

      while($row = $resultado->fetch_assoc())
      {
         
        $comparador =password_verify($contraseña,$row['contrasena']);
        if($comparador){
          $_SESSION["idusuario"] = $row['idusuario'];
          $_SESSION["usuario"] = $row['usuario'];
          $_SESSION["nombre"] = $row['nombre'];
          $_SESSION["apellidos"] = $row['apellidos'];
          $_SESSION["ci"] = $row['ci'];
          $_SESSION["idtipo"] = $row['idtipo'];
          $_SESSION["tipo"] = $row['tipo'];

          echo "<center><h3>Verificado Exitosamente Redireccionando</h3></center>";
          echo "<script> location.href ='".$url."';</script>";
          
        }else{
          header('Location: login.php?msg=Password incorrectos!');
        }
      }
    }
    else{
      header('Location: login.php?msg=No hay internet!');
    }
  
  }else if (isset($_GET["msg"])) {
    $mensaje=htmlspecialchars($_GET["msg"]);
    echo "<center><h3>".$mensaje."</h3></center>";
  } else {
    
  }   
?> 
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <title>Radio Admin</title>
    <style></style>
  </head>
  <body class="cm-login">

    <div class="text-center" style="padding:90px 0 30px 0;background:#0098f8;border-bottom:1px solid #ddd">
      <img src="assets/img/logo-big1.png" width="300" height="300">
    </div>
    
    <div class="col-sm-6 col-md-4 col-lg-3" style="margin:40px auto; float:none;">
      <form method="post" action="login.php">
  <div class="col-xs-12">
          <div class="form-group">
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-fw fa-user"></i></div>
        <input type="text" name="username" class="form-control" placeholder="Nombre de usuario">
      </div>
          </div>
          <div class="form-group">
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-fw fa-lock"></i></div>
        <input type="password" name="password" class="form-control" placeholder="contraseña">
      </div>
          </div>
        </div>
  <div class="col-xs-6">
          <div class="checkbox"><label><input type="checkbox">Recordar usuario</label></div>
  </div>
  <div class="col-xs-6">
          <button type="submit" class="btn btn-block btn-primary">Inicia Sesion</button>
        </div>
      </form>
    </div>
  </body>
</html>