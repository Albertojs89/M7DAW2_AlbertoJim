<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio extra</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <?php
    
     $num=rand(1,100);
     echo "<div class='numero3'>";
     echo "<h1>Número generado: $num</h1>";
     echo "<h2>Divisores de $num</h2>";
     echo "</div>";
    echo "<div class='contenidoDivisor'>";
       

    $chiv=0;
    for($i=2;$i<=$num;$i++){
        $resultado=$num%$i;
        echo "<div class='tabla'>";
            if($resultado==0){
                $chiv++;
                echo $num;    
            }
        echo "</div>";

       

        
    };
    echo "<div>";
    if(chiv<3){
        echo "Es primo";
    }else{
        echo "No es primo";
    }
    echo "</div>"; 


    ?>

    <a class="btnreinicio" href="ejercicio3.php">Reiniciar</a>
</body>
<footer>
        <a href="index.php">Inicio</a>
</footer>
</html>