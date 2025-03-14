


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Análisis - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/css/index.css">
  <style>
    .analisis-grid {
      max-width: 1200px;
      margin: 100px auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
      padding: 0 20px;
    }

    .analisis-card {
      background-color: #fff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
      color: #111;
      display: flex;
      flex-direction: column;
    }

    .analisis-card:hover {
      transform: scale(1.03);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .analisis-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .analisis-card-title {
      padding: 20px;
      font-size: 1.2rem;
      font-weight: 600;
      text-align: center;
    }
  </style>
</head>
<body>

<!-- aqui recorremos los juegos para mostrar en tarjetas y con la id lo enviamos a analisis detalle -->


  <div class="analisis-grid">
    <a href="analisisDetalle.php?id=1" class="analisis-card">
      <img src="/images/zelda.jpg" alt="Zelda">
      <div class="analisis-card-title">Análisis de Zelda: Tears of the Kingdom</div>
    </a>

    <a href="analisis_detalle.php?id=2" class="analisis-card">
      <img src="/images/starfield.jpg" alt="Starfield">
      <div class="analisis-card-title">Análisis de Starfield</div>
    </a>

    <a href="analisis_detalle.php?id=3" class="analisis-card">
      <img src="/images/avowed.jpg" alt="Avowed">
      <div class="analisis-card-title">Análisis de Avowed</div>
    </a>

    <!-- Agrega más tarjetas como desees -->
  </div>

</body>
</html>
