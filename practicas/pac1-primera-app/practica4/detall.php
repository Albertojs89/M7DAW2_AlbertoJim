<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
</head>

<style>
body{
    background-color: #5D4A66;
    width: 1300px;
    margin: auto;
}
.medidaImg {
    height: 100% ;
    width: 700px;
    border-radius: 10px;
}
.medidaImg img{
    width: 100%;
    height: 100%;
}

.container{
    display: flex;
    padding: 20px;
    
}
.infor{
    
}
button{
    width: 100%;
    height: 40px;
    border-radius: 10px;
}
p{
    display: block;
    justify-content: space-between;
    margin-left: 20px;
    font-size: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: white;
    margin-top: 50px;
}
</style>
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
            //<i class="fa-solid fa-star"></i> Hacer un for de 5=valoracion y dentro un if si no llega =sucede algo

        }



echo '
    </div>   
    </div>
</div>
<a href="index.php"><button>Volver</button></a>
';
?>




</body>
</html>