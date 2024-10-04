<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>





<body>

   
    
    
     <?php
        include "peliculas.php";

        foreach($peliculas as $pelicula){
            if(isset($_GET['nom'])){
                $nombre=$_GET['nom'];
                
            }
            
            if($pelicula["nom"]==$nombre){
                echo'
                    <div class="container">
                        <div class="medidaImg">
                            <img src="'.$pelicula['imatge'].'">
                            <a href="trailer.php?nom='.$pelicula['nom'].'"><button>Trailer</button></a>
                        </div>
                        
                        <div class="infor">
                            <div>
                                <p>'.$pelicula['sinopsi'].'</p>
                            </div>
                            <div>
                                <p>'.$pelicula['durada'].'</p>
                            </div>
                            <div>
                                <p>'.$pelicula['director'].'</p>
                            </div>
                            <div>
                                <p>'.$pelicula['director'].'</p>
                            </div>
                            <div>
                                <p>'.$pelicula['qualificacio'].'</p>
                            </div>
                            <div>
                                <p>'.$pelicula['genere'].'</p>
                            </div>
                            <div>
                                <div>
                                    <div class="cajaHoras">
                                        <p>'.$pelicula['horaris'].'</p>
                                    </div>
                                   
                                </div>
                            </div>
                            <div>
                                
                           ';
            }
        }
    ?> 


<?php
    foreach($peliculas as $pelicula){
        if(isset($_GET['nom'])){
            $nombre=$_GET['nom'];
            
        }
        
        if($pelicula["nom"]==$nombre){
            
            
            
            for($i=0;$i<5;$i++){
                
                if($i<$pelicula['estrelles']){
                    echo'<div><i class="fa-solid fa-star" style="color: yellow"></i></div>';
                }else{
                    echo'<div><i class="fa-solid fa-star" style="color: grey;"></i></div>';
                }
            };
            
            
        }
    }
?>

</div>
<a href="index.php"><button>Volver</button></a>






</body>
</html>