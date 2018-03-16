<?php 
	include "../modelo/musica.php";
	require('../conf/conexion.php');
	require('../conf/constantes.php');
	
	session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
	}
	else
	{
        
        if(isset($_GET["idranking"])){
            $idranking=htmlspecialchars($_GET["idranking"]);
            
            if (isset($_GET["tam"])) {
                $tam=htmlspecialchars($_GET["tam"]);
                 echo "Agregar->".$tam;
               
                for ($i=1; $i <= $tam; $i++) { 
                    try {
                        $temp="m".$i;
                        $querymusica="CALL ranking_has_musica_create('".$idranking."','".htmlspecialchars($_GET[$temp])."');";
                        
                        $resultadomusica=$conexion->query($querymusica);
                    } catch (Exception $e) {
                        
                    }
                    
                }
                if (isset($_GET["del"])) {
                    $del=htmlspecialchars($_GET["del"]);
                    echo "Eliminar->".$del;
                    for ($j=1; $j <= $del; $j++) { 
                        try {
                            $temp="d".$j;
                            $querymusicadel="CALL ranking_has_musica_delete('".$idranking."','".htmlspecialchars($_GET[$temp])."');";
                            echo " Consulta->".$querymusicadel;
                            $resultadomusicadel=$conexion->query($querymusicadel);
                        } catch (Exception $e) {
                            
                        }
                        
                    }
                }else{

                }
                exit();
            }else{
                
            }
        }else{
            exit();
        }



	}
	
 ?>

    <input type="hidden" id="idranking" value="<?php echo $idranking; ?>">
    <input type="hidden" id="token" value="<?php echo session_id(); ?>">
    <div class="row cm-fix-height" id="connected">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">TOP</div>
                <div class="panel-body">
                    <center>
                        <button type="button" class="btn btn-info" onclick="GuardarRanking();">
                            Publicar Ranking
                        </button>
                    </center>
                    <br>
                    <form method="POST" enctype="multipart/form-data" id="frmmusicasranking" action="#" class="form-horizontal" role="form">

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                TOP Ranking
                            </div>
                            <div class="panel-body">
                                <ul id="listaranking" class="list-group list-group-sortable-connected" bgcolor="green">
                                    <div class="alert alert-info">
                                        <strong>Acción:</strong> Agrege o mueva elementos aqui.
                                    </div>
                                    <?php
                                    	$queryrankingmusica="SELECT ranking.idranking, musica.idmusica, musica.titulo
FROM            ranking_has_musica INNER JOIN
                ranking ON ranking_has_musica.ranking_idranking = ranking.idranking INNER JOIN
                musica ON ranking_has_musica.musica_idmusica = musica.idmusica
WHERE			ranking.idranking=".$idranking.";";
                                        //$queryrankingmusica="call ranking_has_musica_read('".$idranking."')";

										if($resultadorankingmusica=$conexion->query($queryrankingmusica)){
											while($rowrankingmusica = $resultadorankingmusica->fetch_assoc()){
									 ?>
                                        <li class="list-group-item list-group-item-success" id="idmusicaranking<?php echo $rowrankingmusica['idmusica'];?>">
                                           <div class="media">
                                               
                                                <div class="media-body">
                                                    <h4 class="media-heading"><?php echo $rowrankingmusica["titulo"];?></h4>
                                                </div>
                                                <div class="media-right">
                                                    <button type="button" class="btn btn-danger" id="idmusicabutton<?php echo $rowrankingmusica['idmusica'];?>" onclick="QuitarMusicaRankingLista(<?php echo $rowrankingmusica['idmusica'];?>,'<?php echo $rowrankingmusica['titulo'];?>')">-Quitar</button>
                                                </div>
                                            </div>
                                                
                                            <input type="hidden" name="rankingmusica" id="rankingmusica" value="<?php echo $rowrankingmusica["idmusica"];?>">
                                            
                                        </li>
                                        <?php
											}
                                            
										}else{
 									
										}
                                    ?>



                                </ul>

                            </div>
                        </div>

                    </form>


                    <form method="POST" enctype="multipart/form-data" id="frmmusicasrankingdel" action="#" class="form-horizontal" role="form">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Lista a Cancelar
                            </div>
                            <div class="panel-body">
                                <ul id="listarankingdel" class="list-group list-group-sortable-connected">
                                    <div class="alert alert-danger">
                                        <strong>Eliminar</strong> elementos aqui.
                                    </div>
                                </ul>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Temas Musicales</div>
                <div class="panel-body">

                    <?php 
		$query="SELECT `idgenero`, `genero` FROM `genero` WHERE 1;";
	    if ($resultado=$conexion->query($query)){
	?>

                        <?php
	    	while($row = $resultado->fetch_assoc())
			{
	?>
                            <br>
                            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#demo<?php echo $row['idgenero'];?>">
                                <?php echo $row['genero'];?>
                            </button>
                            <div id="demo<?php echo $row['idgenero'];?>" class="collapse">
                                <ul class="list-group list-group-sortable-connected">

                                    <?php 
$querymusica="SELECT `idmusica`, `usuario_idusuario`, `genero_idgenero`, `artista_idartista`, `titulo`, `fecha` FROM `musica` WHERE genero_idgenero='".$row['idgenero']."';";
if ($resultadomusica=$conexion->query($querymusica)){

?>

                                        <?php
while($rowmusica = $resultadomusica->fetch_assoc())
{
?>




                                            <li class="list-group-item list-group-item-info" id="idmusica<?php echo $rowmusica['idmusica'];?>">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="<?php echo $url;?>imagen/im_artista.php?id=<?php echo $rowmusica['artista_idartista'];?>" width="50px" height="50px">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo $rowmusica['titulo'];?></h4>
                                                        <p>
                                                            <?php echo $rowmusica['fecha'];?>
                                                        </p>
                                                    </div>
                                                    <div class="media-right">
                                                        <button type="button" class="btn btn-success" id="idmusicabutton<?php echo $rowmusica['idmusica'];?>" onclick="AgregarMusicaRanking(<?php echo $rowmusica['idmusica'];?>,'<?php echo $rowmusica['titulo'];?>')">+Agregar</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="idmusica" id="idmusica" value="<?php echo $rowmusica['idmusica'];?>">


                                            </li>




                                            <?php 
}
?>

                                                <?php 
}
else
{
?>

                                                    No hay resultados
                                                    <?php        
}
?>

                                </ul>
                            </div>


                            <?php 
        }
        ?>

                                <?php 
        }
        else
        {
        ?>

                                    <?php        
        }
        ?>





                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {

            $('.list-group-sortable-connected').sortable({
                placeholderClass: 'list-group-item',
                connectWith: '.connected'
            });
        });

    </script>
