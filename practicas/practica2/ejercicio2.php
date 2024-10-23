<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    echo "<h1>Tablas de Multiplicar</h1>";
    echo "<br>";

    echo "<div class='contenido2'>";
        $j=0;
        $res=0;
       
            for($i=0;$i<10;$i++){
                echo "<div class='tabla'>";
                for($j=0;$j<10;$j++){
                    $res=$i*$j;
                    echo "$i*$j={$res}";
                    echo "<br>";
                }
                echo "</div>";
                echo "<br>";
            }
        
    
    echo "</div>";
    ?>
    
</body>

<footer>
        <a href="index.php">Inicio</a>
</footer>
</html>