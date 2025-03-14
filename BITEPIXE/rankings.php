<?php
//aqui va la logica php

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rankings - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Urbanist', sans-serif;
      padding: 40px 20px;
    }

    .ranking-container {
      max-width: 1200px;
      margin: 0 auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .ranking-title {
      text-align: center;
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 30px;
    }

    .ranking-table th {
      background-color: #222;
      color: #fff;
      font-weight: 600;
      font-size: 1.1rem;
      text-align: center;
    }

    .ranking-table td {
      vertical-align: middle;
      text-align: center;
      font-size: 1.05rem;
    }

    .platform-icon {
      font-size: 1.2rem;
      margin-right: 6px;
    }

    .score-badge {
      padding: 6px 12px;
      font-weight: bold;
      border-radius: 8px;
      background-color: #e0e0e0;
      color: #000;
    }

    .score-badge.high { background-color: #5dd35d; color: #fff; }
    .score-badge.medium { background-color: #f6d743; color: #222; }
    .score-badge.low { background-color: #ff5c5c; color: #fff; }

        .back-floating-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    padding: 10px 22px;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 12px;
    background-color: #222;
    color: #fff;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
    text-decoration: none;
    z-index: 999;
    transition: all 0.3s ease;
  }

.back-floating-btn:hover {
  background-color: #444;
  transform: scale(1.05);
}
  </style>
</head>
<body>

  <div class="ranking-container">
    <h2 class="ranking-title">📈 Rankings de Juegos</h2>

    <table class="table table-bordered ranking-table">
      <thead>
        <tr>
          <th>🎮 Juego</th>
          <th>🖥️ Plataforma</th>
          <th>⭐ Nota</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ejemplo visual estático (será dinámico con PHP más adelante) -->
        <tr>
          <td>Avowed</td>
          <td><i class="bi bi-xbox platform-icon"></i> Xbox</td>
          <td><span class="score-badge high">9.2</span></td>
        </tr>
        <tr>
          <td>Starfield</td>
          <td><i class="bi bi-windows platform-icon"></i> PC</td>
          <td><span class="score-badge medium">7.8</span></td>
        </tr>
        <tr>
          <td>Zelda: Tears of the Kingdom</td>
          <td><i class="bi bi-nintendo-switch platform-icon"></i> Switch</td>
          <td><span class="score-badge high">9.7</span></td>
        </tr>
        <tr>
          <td>Forspoken</td>
          <td><i class="bi bi-playstation platform-icon"></i> PlayStation</td>
          <td><span class="score-badge low">5.9</span></td>
        </tr>
      </tbody>
    </table>
  </div>
  <a href="index.php" class="btn btn-dark back-floating-btn">
     ← Volver al inicio
    </a>

</body>
</html>
