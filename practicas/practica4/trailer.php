<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<style>
     body{
        margin-top: 50px;
        margin: auto;
        background: linear-gradient(to right, #1f2647, #465ea4);
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
            <div class="trailer">
            <iframe width="760" height="515" src="'.$pelicula['trailer_url'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            
            </div>
            <div class="btnVolverTrailer">
                <a href="index.php"><button>Volver</button></a>
            </div>
            ';
        }
    }
?>

    
</body>
</html>