<?php
session_start();





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body>
  <main>
    <h2>Que quieres hacer?</h2>
    <div class="container text-center">
      <div class="row align-items-start">
        <div class="col">
          <p>Agregar libro</p>
          <a href="add_book.php"><img src="https://cdn.icon-icons.com/icons2/3249/PNG/512/book_add_filled_icon_200915.png" class="img-fluid" alt="..."></a>
        </div>
      <div class="col">
        <p>Mostrar libros</p>
          <a href="principal.php"><img src="https://cdn-icons-png.flaticon.com/512/2421/2421033.png" class="img-fluid" alt="..."></a>
      </div>
      <div class="col">
        <p>Buscar libro</p>
          <a href=""><img src="https://cdn-icons-png.flaticon.com/512/80/80990.png" class="img-fluid" alt="..."></a>
      </div>
        
      </div>
    </div>
  </main>
</body>
</html>