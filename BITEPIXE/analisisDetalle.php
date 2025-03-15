<?php

//aqui va la logica php

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Análisis - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styles/css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      padding: 40px 20px;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .analisis-container {
      background-color: #fff;
      max-width: 900px;
      width: 100%;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .analisis-img {
      width: 100%;
      height: 400px;
      border-radius: 12px;
      object-fit: cover;
      margin-bottom: 30px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .analisis-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-align: center;
    }
     .analisis-title2 {
      font-size: 1.7rem;
      font-weight: 500;
      margin-bottom: 20px;
      text-align: center;
    }

    .analisis-text {
      font-size: 1.05rem;
      line-height: 1.8;
      margin-bottom: 30px;
      text-align: justify;
    }

    .analisis-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .analisis-note {
      background-color: #222;
      color: #fff;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 12px;
      font-size: 1.2rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .analisis-date {
      font-size: 0.95rem;
      color: #777;
      margin-top: 10px;
    }

    @media screen and (max-width: 768px) {
      .analisis-container {
        padding: 25px;
      }

      .analisis-img {
        height: 250px;
      }

      .analisis-title {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
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
      <a href="register.php" class="nav-item nav-auth">Register</a>
      <a href="login.php" class="nav-item nav-auth">Login</a>
      <button class="logout-btn">Cerrar sesión</button>
    </div>
  </nav>
</header>
  <div class="analisis-container">
    <img src="/images/zelda.jpg" alt="Imagen del juego" class="analisis-img">

    <h1 class="analisis-title">Análisis de Zelda: Tears of the Kingdom</h1>
    <h2 class="analisis-title2">Solo uno es Leyenda</h2>
    <p class="analisis-text">
      La nueva entrega de Zelda no solo expande el universo, sino que lo reinventa. Un juego que respira libertad, diseño magistral y momentos inolvidables. Con mecánicas pulidas y una narrativa emocional, es un referente moderno del diseño de videojuegos. Esta experiencia deja huella en cada rincón del mundo abierto y demuestra que Nintendo sigue marcando el ritmo.
    </p>

    <div class="analisis-meta">
      <div class="analisis-note">⭐ 9.7</div>
      <div class="analisis-date">Publicado: 14 de marzo de 2025</div>
    </div>
  </div>

</body>
</html>
