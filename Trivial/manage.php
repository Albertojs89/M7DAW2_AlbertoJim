<?php
session_start();
include 'header.php';
include 'data.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>manage</title>
</head>
<body>
  <section>
      <h2>Trivial Game</h2>
    <div style="border: 2px solid grey;">
      <p><?php foreach ($_SESSION['arrayPreguntas'] as $pregunta): ?></p>
         <div style="display: flex;">
          <a href="add_edit_question.php"><button>Añadir nueva pregunta</button></a>
          <a href="add_edit_question."><button>Editar pregunta</button></a>
          <a href="delete_question.php"><button>Eliminar pregunta</button></a>
        </div>
        <h2><?=$pregunta['pregunta']?></h2>
        <div class="d-flex">
          <button type="submit" class="btn btn-success w-100"><?=$pregunta['respuestas'][0]?></button>
          <button type="submit" class="btn btn-success w-100"><?=$pregunta['respuestas'][1]?></button>
          <h3>Respuesta correcta</h3>
          <p><?=$pregunta['correcta']?></p>
        </div>
        
        <?endforeach;?>
    </div>
  </section>

 
</body>
</html>