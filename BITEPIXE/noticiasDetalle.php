<?php
// aqui va la logica php

?>





<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle Noticia - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styles/css/index.css">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      padding: 40px 20px;
      min-height: 100vh;
    }

    .noticia-container {
      background-color: #fff;
      max-width: 1200px;
      margin: 100px auto;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .noticia-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }

    .noticia-content {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      align-items: flex-start;
    }

    .noticia-img {
      width: 100%;
      max-width: 500px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      object-fit: cover;
    }

    .noticia-text {
      flex: 1;
      font-size: 1.05rem;
      line-height: 1.8;
      text-align: justify;
    }

    .noticia-meta {
      margin-top: 30px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      font-size: 0.95rem;
      color: #777;
    }

    @media screen and (max-width: 768px) {
      .noticia-content {
        flex-direction: column;
        align-items: center;
      }

      .noticia-text {
        text-align: center;
      }

      .noticia-meta {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
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

  <div class="noticia-container">
    <h1 class="noticia-title">Skies of Arcadia podría volver</h1>

    <div class="noticia-content">
      <img src="/images/SkiesofArcadia.jpg" alt="Imagen Noticia" class="noticia-img">
      <div class="noticia-text">
        Según varios insiders, SEGA estaría trabajando en un remake o secuela de este icónico RPG de Dreamcast. Aunque no hay confirmación oficial, los rumores suenan cada vez más fuerte.
      </div>
    </div>

    <div class="noticia-meta">
      <div><strong>Publicado:</strong> 14 de marzo de 2025</div>
      <div><strong>Autor:</strong> Alberto</div>
    </div>
  </div>

</body>
</html>
