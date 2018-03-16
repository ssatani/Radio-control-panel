<?php 
    require("conf/constantes.php");
    session_start(); 
    if (!isset($_SESSION["idusuario"])){ 
        header('Location: login.php');
        exit();
    }else{
        
    
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
        <link rel="stylesheet" type="text/css" href="assets/css/material-design.css">
        <link rel="stylesheet" type="text/css" href="assets/css/small-n-flat.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">


        <title>Panel de control</title>
    </head>

    <body class="cm-no-transition cm-1-navbar">
        <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex">
                    <a href="index.php" class="cm-logo"></a>
                </div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <?php 
                                include 'menu.php';
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>
                    <?php 
                            echo "Bienvenido ".$_SESSION["nombre"];
                         ?>
                </h1>

                </div>
                <div class="pull-right">

                </div>

                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown">
                        <img src="<?php echo $url; ?>imagen/im_usuario.php?id=<?php echo $_SESSION["idusuario"]?>" alt="" width="35px" height="40px" class="img-circle">
                    </button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;">
                                <strong>
                                <?php 
                                echo $_SESSION["nombre"]." ".$_SESSION["apellidos"];
                                ?>
                                </strong>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-cog"></i> Settings</a>
                        </li>
                        <li>
                            <a href="procesador.php?estado=0"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <div id="global">



            <div class="container-fluid" id="contenido">

            </div>
        </div>


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ultra Korys Radio</h4>
                    </div>
                    <div class="modal-body">
                        <div id="frms">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>




        <script src="assets/js/lib/jquery-2.1.3_min.js"></script>
        <script src="assets/js/jquery.mousewheel.min.js"></script>
        <script src="assets/js/jquery_cookie.min.js"></script>
        <script src="assets/js/fastclick.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/clearmin_min.js"></script>
        <script src="assets/js/demo/home.js"></script>
        
        <script src="assets/js/fileinput.min.js"></script>

        <script src="assets/js/jquery.sortable.min.js"></script>

        <script src="assets/js/tools.js"></script>



    </body>

    </html>

<?php 
    }
 ?>