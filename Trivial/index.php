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
</head>
<body>
  <header>
    <div>
        <?php if ($_SESSION['role'] === 'admin'): ?>
        <a href="manage.php">⚙️</a>
        <?php else: ?>
        <a href="login.php">⚙️</a>
        <?php endif; ?>
    </div>
  </header>
  <main>
    <h2>Trivial Game</h2>
    <div>
      <?php if ($_SESSION['role'] === 'admin'): ?>
        <a href="manage.php">Comenzar!</a>
        <?php else: ?>
        <a href="trivial.php">Comenzar!</a>
        <?php endif; ?>
      
      
    </div>
  </main>

  <footer>
    <div>
      <a href="logout.php"><button>Cerrar Sesión</button></a>
    </div>
  </footer>
</body>
</html>