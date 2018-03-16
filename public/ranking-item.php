<?php 
    include "ranking-modelo.php";
    $url="assets/img/logo-big.png";
    $numero=0;

    if (
        isset($_POST["numero"]) && 
        isset($_POST["programacion_idprogramacion"]) && 
        isset($_POST["programacion_titulo"]) && 
        isset($_POST["ranking_idranking"])&& 
        isset($_POST["ranking_titulo"])&& 
        isset($_POST["ranking_descripcion"])&& 
        isset($_POST["ranking_fecha"])&& 
        isset($_POST["top"])&& 
        isset($_POST["votos"])&& 
        isset($_POST["url"])
        ) 
    {
        session_start();
        
        if (isset($_SESSION["idusuario"]) && isset($_SESSION["tipo"])) {
            $ranking=new ranking(
                htmlspecialchars($_SESSION["idusuario"]),
                htmlspecialchars($_POST["programacion_idprogramacion"]),
                htmlspecialchars($_POST["programacion_titulo"]),
                htmlspecialchars($_POST["ranking_idranking"]),
                htmlspecialchars($_POST["ranking_titulo"]),
                htmlspecialchars($_POST["ranking_descripcion"]),
                htmlspecialchars($_POST["ranking_fecha"]),
                htmlspecialchars($_POST["top"]),
                htmlspecialchars($_POST["votos"])
            );
        } else {
            $ranking=new ranking(
            0,
            htmlspecialchars($_POST["programacion_idprogramacion"]),
            htmlspecialchars($_POST["programacion_titulo"]),
            htmlspecialchars($_POST["ranking_idranking"]),
            htmlspecialchars($_POST["ranking_titulo"]),
            htmlspecialchars($_POST["ranking_descripcion"]),
            htmlspecialchars($_POST["ranking_fecha"]),
            htmlspecialchars($_POST["top"]),
            htmlspecialchars($_POST["votos"])
            );
        }
        $url=htmlspecialchars($_POST["url"])."imagen/im_programacion.php?id=".$ranking->Idprogramacion();
        $numero=htmlspecialchars($_POST["numero"]);
    } else {
        date_default_timezone_set("America/La_Paz");
        $ranking=new ranking(0, 0, "Desconocido", 0, "Ranking Musical", "Descripcion Ranking",  strftime("%H:%M %d/%m/%y"), 0, 0);
    }
    
    
    
 ?>

                        <div class="media">
                            <div class="media-left">
                                <img src="<?php echo $url;?>" alt="" width="100px" height="100px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"> <?php echo $ranking->Ranking_titulo();?> <small><i>Publicado a las <?php echo $ranking->Ranking_fecha();?></i></small></h4>
                                <p>
                                    <?php echo $ranking->Ranking_descripcion();?>
                                </p>
                                <p><b>Programa:</b>
                                    <?php echo $ranking->Programacion_titulo();?>
                                </p>

                                <?php 
                                    if ($ranking->Idusuario()>0) {
                                        ?>
                                        <button type="button" class="btn btn-primary" onclick="VerTemas(<?php echo $ranking->Idranking();?>);">Temas Musicales</button>
                                        <?php 
                                    } else {
                                        ?>
                                        <?php 
                                    }
                                    
                                 ?>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#collapse<?php echo $ranking->Idranking();?>" onclick="setMusicas(<?php echo $numero;?>);">Ver Botacion</button>
                                <br>
                                <br>
                                <div id="collapse<?php echo $ranking->Idranking();?>" class="collapse">
                                    <div class="panel panel-default" id="RankingMusical">
                                        <div class="panel-heading">
                                            Estado de Ranking
                                        </div>
                                        <table class="table table-bordered">
                                            <tbody id="ranking<?php echo $ranking->Idranking();?>">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                             <div class="media-right">
                                 <h4 class="media-heading">TOP</h4>
                                 
                                 <p>
                                    <center>
                                        <h1>
                                             <?php echo $ranking->Top();?>       
                                        </h1>
                                        <?php echo $ranking->Votos();?> Votos.
                                    </center>
                                     
                                 </p>
                            </div>
                        </div>
                   