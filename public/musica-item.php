<?php 
    include "musica-modelo.php";
    $url="assets/img/logo-big.png";
    $votos=0;
    

    if (
        isset($_POST["idmusica"]) && 
        isset($_POST["titulo"]) && 
        isset($_POST["fecha"])&& 
        isset($_POST["idartista"])&& 
        isset($_POST["artista"])&& 
        isset($_POST["conteo"])&& 
        isset($_POST["voto"])&& 
        isset($_POST["votos"])&& 
        isset($_POST["url"])
        ) 
    {
        
        session_start();
        
       
            $musica=new musica(
                htmlspecialchars($_POST["idmusica"]),
                htmlspecialchars($_POST["titulo"]),
                htmlspecialchars($_POST["fecha"]),
                htmlspecialchars($_POST["idartista"]),
                htmlspecialchars($_POST["artista"]),
                htmlspecialchars($_POST["conteo"]),
                htmlspecialchars($_POST["voto"])
            );
        $url=htmlspecialchars($_POST["url"])."imagen/im_artista.php?id=".$musica->Idartista();
        $votos=htmlspecialchars($_POST["votos"]);
        

    } else {
        date_default_timezone_set("America/La_Paz");
        $musica=new musica(0,"Musica", strftime("%H:%M %d/%m/%y"), 0, "Artista", 0, false);
    }
    
    
    
 ?>

<tr>
    <td style="white-space:nowrap">
        <img src="<?php echo $url; ?>" alt="" width="20px" height="20px">
        <?php echo $musica->Titulo(); ?>
    </td>
    <td style="width:100%">
        <div class="progress">
            <div class="progress-bar" style="width:<?php
                        if($votos>0){
                            echo $musica->Conteo()*100/$votos; 
                        }else{
                            echo 0;
                        }
                       
                        ?>%"></div>
        </div>
    </td>
    <td>
        <?php
                        if($votos>0){
                            echo $musica->Conteo()*100/$votos; 
                        }else{
                            echo 0;
                        }
                       
                        ?>%</td>
</tr>
