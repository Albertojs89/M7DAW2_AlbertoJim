<?php
session_start();
require_once 'config.php';


$memoryCards=$mysqli->query("SELECT * FROM MEMORY_CARD ORDER BY id DESC LIMIT 3;")->fetch_all(MYSQLI_ASSOC);
$noticias = $mysqli->query("SELECT * FROM noticias ORDER BY fecha DESC LIMIT 6")->fetch_all(MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bitepixe Inicio</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="styles/css/index.css">
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+2:wght@300;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<body>
<header class="main-header">
  <nav class="nav-bar">
    <div class="nav-left">
      <a href="index.php" class="nav-item nav-home"><span class="nav-dot nav-dot-home"></span> Home</a>
      <a href="analisis.php" class="nav-item nav-analysis"><span class="nav-dot nav-dot-analysis"></span> Análisis</a>
      <a href="rankings.php" class="nav-item nav-rankings"><span class="nav-dot nav-dot-rankings"></span> Rankings</a>
      <a href="about.php" class="nav-item nav-about"><span class="nav-dot nav-dot-about"></span> About</a>
    </div>

    <div class="nav-title">BITEPIXE</div>

    <div class="nav-right">
      <?php if (isset($_SESSION['user_id'])): ?>
        <div class="d-flex align-items-center gap-2">
          <img src="<?= htmlspecialchars($_SESSION['avatar']) ?>" alt="Avatar" style="width: 42px; height: 42px; border-radius: 50%; object-fit: cover; box-shadow: 0 0 8px rgba(0,0,0,0.3);">
          <span style="color: #ccc; font-weight: 600;"><?= htmlspecialchars($_SESSION['nombre']) ?></span>
          <a href="logout.php" class="logout-icon-btn" title="Cerrar sesión">
            <i class="fas fa-power-off"></i>
          </a>

        </div>
      <?php else: ?>
        <a href="register.php" class="nav-item nav-auth">Register</a>
        <a href="login.php" class="nav-item nav-auth">Login</a>
      <?php endif; ?>
    </div>
  </nav>
</header>








<!-- al hacer la logica php tendré que hacer que los item-1 vaya aumentando

-->


  <main>
    <!-- boton para scroll directo a seccion memory card -->
    <div class="scroll-btn-wrapper">
      <a href="#memorycard" class="scroll-btn">↓ Memory Card</a>
    </div>


    <!-- SECCIÓN NOTICIAS -->

<div class="bento-container">
  <?php $i = 1; ?>
  <?php foreach ($noticias as $noticia): ?>
    <a href="noticiasDetalle.php?id=<?= $noticia['id'] ?>" class="bento-item item-<?= $i ?>">
      <img src="/images/<?= htmlspecialchars($noticia['imagen']) ?>" alt="<?= htmlspecialchars($noticia['titulo']) ?>">
      <div class="bento-title">
        <span><?= htmlspecialchars($noticia['titulo']) ?></span>
      </div>
    </a>
    <?php $i++; ?>
  <?php endforeach; ?>
</div>



  <!-- SECCIÓN MEMORY CARD -->
  
  <section id="memorycard" class="memory-card-section">
    <h2 class="memory-card-title">Memory Card</h2>
    <p class="memory-card-subtitle">La nostalgia en recuerdos</p>
    <div class="memory-card-slider">
      <?php foreach ($memoryCards as $card): ?>
        <div class="memory-card">
          <img src="/images/<?= ($card['imagen']) ?>" alt="<?= htmlspecialchars($card['titulo']) ?>">
          <h3><?= htmlspecialchars($card['titulo']) ?></h3>
          <p><?= htmlspecialchars($card['texto']) ?></p>
        </div>
      <?php endforeach; ?>

      
    </div>
  </section>
  <!-- FOOTER -->
  <footer class="site-footer">
  <div class="footer-container">
    <div class="footer-columns">

      <!-- Columna 1: Info contacto -->
      <div class="footer-column">
        <h3 class="footer-subtitle">Contacto</h3>
        <p><i class="fas fa-map-marker-alt"></i> Barcelona, España</p>
        <p><i class="fas fa-envelope"></i> <a href="mailto:contacto@bitepixe.com">bertocover@gmail.com</a></p>
        <p><i class="fas fa-phone"></i> <a href="tel:+34600123456">+34 666 942 922</a></p>
      </div>

      <!-- Columna 2: Enlaces -->
      <div class="footer-column">
        <h3 class="footer-subtitle">Enlaces</h3>
        <ul class="footer-links">
          <li><a href="/">Home</a></li>
          <li><a href="#analisis">Análisis</a></li>
          <li><a href="#rankings">Rankings</a></li>
          <li><a href="#about">About</a></li>
        </ul>
      </div>

      <!-- Columna 3: Redes Sociales -->
      <div class="footer-column">
        <h3 class="footer-subtitle">Síguenos</h3>
        <div class="footer-social">
          <a href="https://github.com/" target="_blank"><i class="fab fa-github"></i></a>
          <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>

    </div>

    <p class="footer-copy">© 2025 BITEPIXE · Desarrollado por Alberto</p>
  </div>
</footer>



</main>

 



    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>