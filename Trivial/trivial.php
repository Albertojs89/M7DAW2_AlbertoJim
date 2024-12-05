<?php
session_start();
include 'header.php';
include 'data.php';

$_SESSION['num']=0;

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trivial</title>
</head>
<body>
  <main>
    <h2>Trivial Game</h2>
    <form action="" method="POST">
      <p><?php foreach ($_SESSION['arrayPreguntas'] as $pregunta): ?></p>
        <h2><?=$pregunta['pregunta']?></h2>
        <div class="d-flex">
          <button type="submit" class="btn btn-success w-100"><?=$pregunta['respuestas'][0]?></button>
          <button type="submit" class="btn btn-success w-100"><?=$pregunta['respuestas'][1]?></button>
        </div>
        <?= $message; ?>
    
    </form>
    <?endforeach;?>
  </main>
  </main>
</body>
</html>