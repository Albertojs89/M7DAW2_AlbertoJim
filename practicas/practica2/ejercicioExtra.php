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
    
     
       

    //chivato para sacar divisores del numero generado

    $chiv=0;
    $res=0;

    echo"<div='container'>";
    $num=rand(1,100);
    echo "<div class='numero3'>";
    echo "<h1>Número generado: $num</h1>";
    echo "<h2>Divisores de $num</h2>";
    echo "</div>";
   echo "<div class='contenidoDivisor'>";
        for($i=1;$i<=$num;$i++){
            $res=$num%$i;
            if($res==0){
                $chiv++;
                echo"<div class='tabla2'>";
                    echo("$i");
                echo"</div>";
            }
        }
        
    echo"</div>";
    echo"<div class='primoNoprimo'>";
            if($chiv<=2){
                echo("$num Es número primo");
            }else{
                echo("$num No es número primo");
            }
    echo"</div>";



    ?>

    <a class="btnreinicio" href="ejercicioExtra.php">Reiniciar</a>
</body>
<footer class="footer2">
        <a href="index.php">Inicio</a>
</footer>
</html>