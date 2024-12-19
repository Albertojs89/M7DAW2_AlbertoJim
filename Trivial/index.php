<?php
session_start();
require_once('header.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Header -->
  <header class="text-center my-3 mt-5">
    <?php if ($_SESSION['role'] === 'admin'): ?>
      <a href="manage.php" class="btn btn-warning">⚙️</a>
    <?php else: ?>
      <a href="login.php" class="btn btn-dark">⚙️</a>
    <?php endif; ?>
  </header>

  <!-- Main Content -->
  <main class="d-flex flex-column justify-content-center align-items-center flex-grow-1 text-center">
    <h2 id="titleInicio" class="mb-4">Trivial Game</h2>
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
