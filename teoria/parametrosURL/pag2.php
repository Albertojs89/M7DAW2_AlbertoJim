<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ESTA ES LA PAGINA 2</h1>
    <?php
        if(isset($_GET['nom'])&&isset($_GET['edad'])){
            $nom=$_GET['nom'];
            $edad=$_GET['edad'];

            echo "<p>Nom: {$nom}</p>";
            echo "<p>Edat: {$edad}</p>";
        }
    ?>
</body>
</html>