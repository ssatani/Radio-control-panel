    <?php session_start(); ?>
    <div class="row cm-fix-height">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="../assets/img/devices.png" alt="Responsive across devices" class="img-responsive">
                    <br>
                    <p>Controla tu estacion de radio, desde cualquier dispsitvo solo necesitas una conexion a internet.</p>
                </div>
            </div>
    </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <a href="#" class="panel panel-default thumbnail cm-thumbnail" onclick="programacion();">
                <div class="panel-body text-center">
                    <span class="svg-48">
                        <img src="../assets/img/sf/calendar-clock.svg" alt="window-layout">
                    </span>
                    <h4>PROGRAMACION</h4> <small>aca puedes agregar un programa nuevo, como asi tambien  modificarlo o simplemente eliminarlo</small>

                </div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <a href="#" class="panel panel-default thumbnail cm-thumbnail" onclick="notificacion();">
                <div class="panel-body text-center">
                    <span class="svg-48">
                        <img src="../assets/img/sf/bullhorn.svg" alt="notepad">
                    </span>
                    <h4>NOTIFICACIONES</h4> <small>en este apartado puedes enviar notificaciones, atodos los usuarios que descarganro tu aplicaion ya sea en Android o iOS</small>

                </div>
            </a>
        </div>
       
        <?php 
            
            if ($_SESSION["tipo"]=="administrador") {
                # code...
            
        ?>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <a href="#" class="panel panel-default thumbnail cm-thumbnail" onclick="notificacion();">
                <div class="panel-body text-center">
                    <span class="svg-48">
                        <img src="../assets/img/sf/user-id.svg" alt="cat">
                    </span>
                    <h4>USUARIOS</h4> <small>el control y gestion usuarios es muy importante pra la administracion de tu estacion de RADIO, asi que te brindamos un completo control de los mismos en esta seccion.</small>

                </div>
            </a>
        </div>

         <?php 
            }    
         ?>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <a href="procesador.php?estado=0" class="panel panel-default thumbnail cm-thumbnail">
                <div class="panel-body text-center">
                    <span class="svg-48">
                        <img src="../assets/img/sf/lock-open.svg" alt="lock-open">
                    </span>
                    <h4>Cerrar sesion</h4> <small>ciempre que termines con la gestion de tu RADIO, cierra secion para evitar malos entendidos.</small>

                </div>
            </a>
        </div>
    </div>