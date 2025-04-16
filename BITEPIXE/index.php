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
<?php include 'header.php'; ?>



<main>
  <!-- HERO BLOCK -->
<section class="hero-bitepixe">
  <div class="container-hero">
  
    <div class="hero-center">
      <h1 class="hero-title">BITEPIXE</h1>
      <p class="hero-subtitle">Otra manera de enterarte sobre las noticias de videojuegos</p>
    </div>
  </div>
</section>
 <!-- SECCIÓN NOTICIAS -->

<div class="bento-container">
  <?php $i = 1; ?>
  <?php foreach ($noticias as $noticia): ?>
    <a href="noticiasDetalle.php?id=<?= $noticia['id'] ?>" class="bento-item item-<?= $i ?>">
      <img src="images/<?= htmlspecialchars($noticia['imagen']) ?>" alt="<?= htmlspecialchars($noticia['titulo']) ?>">
      <div class="bento-title">
        <span><?= htmlspecialchars($noticia['titulo']) ?></span>
      </div>
    </a>
    <?php $i++; ?>
  <?php endforeach; ?>
</div>



  <!-- SECCIÓN MEMORY CARD -->
  
  <section id="memorycard" class="memory-card-section">
    <div class="memory-scroll-indicator left-indicator"><i class="fas fa-chevron-left"></i></div>
<div class="memory-scroll-indicator right-indicator"><i class="fas fa-chevron-right"></i></div>

    <h2 class="memory-card-title">Memory Card</h2>
    <p class="memory-card-subtitle">La nostalgia en recuerdos</p>
    <div class="memory-card-slider">
      <?php foreach ($memoryCards as $card): ?>
        <div class="memory-card">
          <img src="images/<?= ($card['imagen']) ?>" alt="<?= htmlspecialchars($card['titulo']) ?>">
          <h3><?= htmlspecialchars($card['titulo']) ?></h3>
          <p><?= htmlspecialchars($card['texto']) ?></p>
        </div>
      <?php endforeach; ?>

      
    </div>
  </section>

  <!-- /MEMORY CARD -->



  <!-- FOOTER -->




</main>

 



    

<script>
  function toggleMobileMenu() {
    const menu = document.getElementById("mobileMenu");
    menu.classList.toggle("show");
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>