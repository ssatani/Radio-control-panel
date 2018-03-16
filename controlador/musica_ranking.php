<?php 
	include "../modelo/musica.php";
	
	require('../conf/constantes.php');
	
	session_start(); 
	if (!isset($_SESSION["idusuario"])){ 
		header('Location: ..\login.php');
        exit();
	}
	else
	{
        if(isset($_POST["r"])){
            $ranking=htmlspecialchars($_POST["r"]);
            require('../conf/conexion.php');
            $votos=0;
            $ResultadoVotos = mysqli_query($conexion, "SELECT ranking_escucha_count(".$ranking.") AS escuchas; ");   
            if($row = mysqli_fetch_assoc($ResultadoVotos)) {   
                  $votos=$row["escuchas"];   
            }   
          
            mysqli_free_result($ResultadoVotos);   
            mysqli_next_result($conexion);   
          
            
            $resultadomusicaranking = mysqli_query($conexion, "CALL ranking_has_musica_read('$ranking');");  

            $queryranking = "CALL ranking_has_musica_read('$ranking');";
?>
<div class="panel panel-default">
    <div class="panel-heading">Estado de Ranking</div>
    <table class="table table-bordered">
        <?php 
            while($rowmusicaranking = mysqli_fetch_assoc($resultadomusicaranking)){
         ?>
                <tr>
                    <td style="white-space:nowrap">
                        <img src="<?php echo $url; ?>imagen/im_artista.php?id=<?php echo $rowmusicaranking["idartista"]; ?>" alt="" width="50px" height="50px">
                        <?php echo $rowmusicaranking["titulo"]; ?>
                    </td>
                    <td style="width:100%">
                        <div class="progress">
                            <div class="progress-bar" style="width:<?php
                        if($votos>0){
                            echo $rowmusicaranking["conteo"]*100/$votos; 
                        }else{
                            echo 0;
                        }
                       
                        ?>%"></div>
                        </div>
                    </td>
                    <td><?php
                        if($votos>0){
                            echo $rowmusicaranking["conteo"]*100/$votos; 
                        }else{
                            echo 0;
                        }
                       
                        ?>%</td>
                </tr>
        <?php 
            } 
            mysqli_next_result($conexion);  
            mysqli_close($conexion);
         ?>
    </table>
</div>

<script>
    /*$(function() {

        $('.list-group-sortable-connected').sortable({
            placeholderClass: 'list-group-item',
            connectWith: '.connected'
        });
    });*/

</script>
<?php 
            }
    }
?>