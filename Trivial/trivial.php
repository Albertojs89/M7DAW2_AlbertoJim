<?php
session_start();
include 'header.php';
include 'data.php';

// Obtener el número de pregunta (si no existe, iniciarlo en 0)
$numPregunta = isset($_SESSION['num']) ? $_SESSION['num'] : 0;

// Obtener la pregunta actual del array
$preguntaActual = $_SESSION['arrayPreguntas'][$numPregunta];

// Comprobar si se ha enviado una respuesta
if (isset($_POST['respuesta'])) {
    // Comparar la respuesta enviada con la respuesta correcta
    if ($_POST['respuesta'] == $preguntaActual['correcta']) {
        // Respuesta correcta, incrementar el contador y redirigir
        $_SESSION['num']++;
        if($_SESSION['num']>2){
          header('Location: win.php');
          exit;
          
        }
        
    } else {
        // Respuesta incorrecta, mostrar un mensaje de error (opcional)
        echo "Respuesta incorrecta.";
        
    }
}

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
    <h3><?= $preguntaActual['pregunta'] ?></h3>
    <form method="post">
        <input type="hidden" name="numPregunta" value="<?= $numPregunta ?>">
        <input type="submit" name="respuesta" value="<?= $preguntaActual['respuestas'][0] ?>">
        <input type="submit" name="respuesta" value="<?= $preguntaActual['respuestas'][1] ?>">
    </form>
</main>
  
</body>

<footer>
    <div>
      <a href="logout.php"><button>Cerrar Sesión</button></a>
    </div>
  </footer>
</html>