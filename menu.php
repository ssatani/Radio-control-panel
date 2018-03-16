<li><a href="#" class="sf-house" onclick="principal();">Inicio</a></li>
<li><a href="#" class="sf-calendar-clock" onclick="programacion();">Programacion</a></li>
<li><a href="#" class="sf-bullhorn" onclick="notificacion();">Notificaciones</a></li>
<li><a href="#" class="sf-dashboard" onclick="ranking();">Rankings</a></li>
<li class="cm-submenu">
    <a class="sf-window-layout">Musica<span class="caret"></span></a>
    <ul>
        <li><a href="#" onclick="musica();">Temas</a></li>
        <li><a href="#" onclick="genero();">Generos</a></li>
        <li><a href="#" onclick="artista();">Artistas</a></li>
    </ul>
</li>
<?php 
    switch ($_SESSION["tipo"]) {
            case 'administrador':
?>

    <li><a href="#" class="sf-user-id" onclick="usuarios();">Usuarios</a></li>
    <?php 
                break;
            case 'usuario':
?>

        <?php 


                break;
            case 'marketin':
?>

            <?php
                break;
            default:
                
                break;
        }
        
    
?>
                <li>
                    <a href="procesador.php?estado=0" class="sf-lock-open" ">Cerrar Session</a></li>
