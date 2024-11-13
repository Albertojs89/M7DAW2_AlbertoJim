<?php
session_start();

// Verifica la respuesta antes de enviar cualquier salida al navegador
if ($_POST['answer'] == $_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['respuesta']) {
    $message = 'Correcto!';
    $_SESSION['numPR']++; // Incrementar el número de pregunta
} else if ($_POST['answer'] == NULL) {
    $message = " ";
} else if ($_POST['answer'] != $_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['respuesta']) {
    $message = 'Incorrecto! La respuesta correcta es: ' . $_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['respuesta'];
}

// Mover la verificación y redirección antes de cualquier salida
if ($_SESSION['numPR'] == 2) {
    header('Location: roomVictory.php'); // Redirección
    exit; // Detener la ejecución
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 1</title>
</head>
<style>
      body {
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(218,218,231,1) 35%, rgba(0,212,255,1) 100%);
    background-size: cover; /* Hace que la imagen cubra toda la pantalla */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    background-position: center center; /* Centra la imagen */
    height: 100vh; /* Asegura que el `body` ocupe toda la altura de la pantalla */
    margin: 0; /* Elimina el margen para que no haya espacio alrededor */
}
</style>
<body>
  <?  include 'header.php'; ?>
  <div  class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación <?= $_SESSION['numPR']+1; ?></h2>
        <!-- el = es como un echo  -->
        <p class="card-text"><?= $_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['pregunta'] ?></p>
        <form action="rooms.php" method="POST">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
       <?= $message; ?>
    </div>
  </div>
    
</body>
</html>
