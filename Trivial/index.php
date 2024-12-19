<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barrio&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
  <?php require_once('header.php'); ?>
  <!-- Header -->
  <header class="text-center my-3 mt-5 btn-config">
    <?php if ($_SESSION['role'] === 'admin'): ?>
      <a href="manage.php" class="btn btn-info shadow-lg p-3 mb-5">⚙️</a>
    <?php else: ?>
      <a href="login.php" class="btn btn-info shadow-lg p-3 mb-5">⚙️</a>
    <?php endif; ?>
  </header>

  <!-- Main Content -->
  <main class="d-flex flex-column flex-grow-1 text-center">
    <div class="d-flex text-center justify-content-center ">
      <h2 id="titleInicio" class="mb-4" style="color: red;">T</h2>
      <h2 id="titleInicio" class="mb-4" style="color: violet;">r</h2>
      <h2 id="titleInicio" class="mb-4" style="color: green;">i</h2>
      <h2 id="titleInicio" class="mb-4" style="color: blue;">v</h2>
      <h2 id="titleInicio" class="mb-4" style="color: pink;">i</h2>
      <h2 id="titleInicio" class="mb-4" style="color: red;">a</h2>
      <h2 id="titleInicio" class="mb-4">l</h2>
    </div>
    <h2 id="titleInicio2" class="mb-4">Game</h2>
    <div>
      <?php if ($_SESSION['role'] === 'admin'): ?>
        <a href="manage.php" class="btn btn-outline-primary btn-lg">Comenzar!</a>
      <?php else: ?>
        <a href="trivial.php" class="btn btn-outline-primary btn-lg">Comenzar!</a>
      <?php endif; ?>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center mt-4 mb-3">
    <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
  </footer>

</body>
</html>
