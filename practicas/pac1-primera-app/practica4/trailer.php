<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/RV9L7ui9Cn8?si=L9XFA611_YJZ7X_R" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <a href="index.php"><button>Volver</button></a>
            </div>
            ';
        }
    }
?>

    
</body>
</html>