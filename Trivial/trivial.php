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
        if ($_SESSION['num'] > 2) {
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
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">

  <main class="d-flex flex-column justify-content-center align-items-center flex-grow-1 text-center">
    <h2 class="mb-4">Pregunta <?=$numPregunta+1?></h2>
    <h3 class="mb-4"><?= $preguntaActual['pregunta'] ?></h3>
    
    <form method="post" class="d-flex flex-column align-items-center">
        <input type="hidden" name="numPregunta" value="<?= $numPregunta ?>">
        <button type="submit" name="respuesta" value="<?= $preguntaActual['respuestas'][0] ?>" class="btn btn-outline-primary mb-2"><?= $preguntaActual['respuestas'][0] ?></button>
        <button type="submit" name="respuesta" value="<?= $preguntaActual['respuestas'][1] ?>" class="btn btn-outline-primary"><?= $preguntaActual['respuestas'][1] ?></button>
    </form>
  </main>
  
  <footer class="text-center mt-4 mb-3">
    <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    <a href="index.php" class="btn btn-secondary">Inicio</a>
  </footer>

</body>
</html>
