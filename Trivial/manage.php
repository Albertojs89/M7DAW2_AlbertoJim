<?php
session_start();
include 'header.php';
include 'data.php';

//iniciar la array]
if (!isset($_SESSION['arrayPreguntas'])) {
    $_SESSION['arrayPreguntas'] = [];
}
print_r($_SESSION['arrayPreguntas']); 

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
      <h2>Configuración del Juego</h2>
    <div style="border: 2px solid grey;">
      <p><?php foreach ($_SESSION['arrayPreguntas'] as $pregunta): ?></p>
         <div style="display: flex;">
          <?="esta es: ",$pregunta['id']?>
            <a href="add_edit_question.php?id=<?=$pregunta['id']?>&action=add"><button>Añadir nueva pregunta</button></a>
            <a href="add_edit_question.php?id=<?=$pregunta['id']?>&action=edit"><button id="edit_question_<?=$pregunta['id']?>">Editar pregunta</button></a>
            <a href="delete_question.php?id=<?=$pregunta['id']?>"><button id="delete_question_<?=$pregunta['id']?>">Eliminar pregunta</button></a>
        </div>
        <h2><?=$pregunta['pregunta']?></h2>
        <div class="d-flex">
          <p><?=$pregunta['respuestas'][0]?></p>
          <p><?=$pregunta['respuestas'][1]?></p>
          <h3>Respuesta correcta</h3>
          <p><?=$pregunta['correcta']?></p>
        </div>
        
        <?endforeach;?>
    </div>
  </section>

 
</body>
</html>