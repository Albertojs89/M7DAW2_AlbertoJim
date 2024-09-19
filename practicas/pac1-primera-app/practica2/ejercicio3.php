<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <?php
    echo "<div class='contenido2'>";
        $num=rand(1,100);
        echo "<h1>";
        echo $num;
        echo "</h1>";
        $resultado=$num%2;
        echo "<div class='tabla'>";
        if($resultado==0){
            echo "Es par";
        }else{
            echo "Es impar";
        }
        echo "</div>";


    echo "</div>";


    ?>

    <a href="ejercicio3.php">Reiniciar</a>
</body>
<footer>
        <a href="index.php">Inicio</a>
</footer>
</html>