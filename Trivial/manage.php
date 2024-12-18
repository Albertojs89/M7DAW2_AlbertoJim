<?php
session_start();
include 'header.php';
include 'data.php';

//iniciar la array]
if (!isset($_SESSION['arrayPreguntas'])) {
    $_SESSION['arrayPreguntas'] = [];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>manage</title>
</head>
<link rel="stylesheet" href="style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body>
  <section>
      <h2>Configuración del Juego</h2>
    <div style="border: 2px solid grey;">
      <p><?php foreach ($_SESSION['arrayPreguntas'] as $pregunta): ?></p>
         <div style="display: flex;">
          
            <a href="add_edit_question.php?>&action=add"><button>Añadir nueva pregunta</button></a>
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

<div>
    <a href="logout.php"><button>Cerrar sesión</button></a>
    <a href="index.php"><button>Inicio</button></a>
</div>
</html>