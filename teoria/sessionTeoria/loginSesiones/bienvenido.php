<?php
session_start();
//comprobaciones isset:
if(!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <header>
    <h1>Bienvenido <?=$_SESSION['username']?></h1>
    <a href="logout.php">Cerrar sesión</a>
  </header>
</body>
</html>