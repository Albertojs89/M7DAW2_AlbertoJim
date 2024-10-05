<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <div class="container">
                        <div class="imgDetalle">
                            <img src="'.$pelicula['imatge'].'">
                            <a href="trailer.php?nom='.$pelicula['nom'].'"><button><i class="fa-solid fa-film"></i></button></a>
                        </div>
                        
                        <div class="infor">
                            <div>
                                <p><strong>Sinopsis</strong></p>
                                <p>'.$pelicula['sinopsi'].'</p>
                            </div>
                            <div>
                                <p><strong>Duración</strong></p>
                                <p>'.$pelicula['durada'].'</p>
                            </div>
                            <div>
                                <p><strong>Directores</strong></p>
                                <p>'.$pelicula['director'].'</p>
                            </div>
                            <div>
                                <p><strong>Cualificación</strong></p>
                                <p>'.$pelicula['qualificacio'].'</p>
                            </div>
                            <div>
                                <p><strong>Género</strong></p>
                                <p>'.$pelicula['genere'].'</p>
                            </div>
                            <div>
                                <div>
                                    <p><strong>Horarios</strong></p>
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
                    echo'<i class="estrellas fa-solid fa-star" style="color: yellow"></i>';
                }else{
                    echo'<i class="estrellas fa-solid fa-star" style="color: grey;"></i>';
                }
            };
            
            
        }
    }
    
        foreach($peliculas as $pelicula){
            if(isset($_GET['nom'])){
                $nombre=$_GET['nom'];
                
            }
            
            if($pelicula["nom"]==$nombre){
                echo'
            <div>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="'.$pelicula['carrusel1'].'" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="'.$pelicula['carrusel2'].'" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="'.$pelicula['carrusel3'].'" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
            
            
            ';
                }
            }
    
?>

</div>


<div class="btnVolver">
    <a href="index.php">
        <button>Volver</button>
    </a>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>