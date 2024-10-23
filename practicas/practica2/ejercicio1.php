<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php
        echo "<h1>Exercici 1: Nombres parells entre 50 i 500</h1>";
        echo "<br>";
        ?>
    </header>
    <main>
        <?php
            $i=50;
            $resto=0;

            
            echo "<div class='container'>";
                for($i=50;$i<=500;$i++){
                    
                    $resto=$i%2;
                    if($resto==0){
                        echo"<br>";
                        echo "<div class='contenido'>{$i}</div>";
                    }
                    
                }
                
            echo "</div>";


        ?>
    </main>
    <footer>
        <a href="index.php">Inicio</a>
    </footer>

</body>
</html>



