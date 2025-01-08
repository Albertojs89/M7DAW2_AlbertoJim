<?php
session_start();
include 'classes/Libro.php';


if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $titol=$_POST["titol"];
  $autor=$_POST["autor"];
  $anyPublicacio=$_POST["anyPublicacio"];
  $foto=$_POST["urlPortada"];
}



$llibre1=new Llibre("El imperio Final","Brandon Sanderson",2020,"");
echo $llibre1->descripcio();


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Ingresa tu libro</h2>

    
    <form action="" method="POST">
      <!-- titol -->
       <div class="mb-3">
            <label for="titol" class="form-label">Titol</label>
            <input type="text" class="form-control" id="titol" name="titol" required>
        </div>

        <!-- Autor -->
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>

        <!-- Año de Publicación -->
        <div class="mb-3">
            <label for="anyPublicacio" class="form-label">Año de Publicación</label>
            <input type="number" class="form-control" id="anyPublicacio" name="anyPublicacio" required>
        </div>

        <!-- URL de la Portada -->
        <div class="mb-3">
            <label for="urlPortada" class="form-label">URL de la Portada</label>
            <input type="url" class="form-control" id="urlPortada" name="urlPortada" required>
        </div>

        <!-- Botón de Enviar -->
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>


  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>