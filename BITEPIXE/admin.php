


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Urbanist', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .admin-container {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
      max-width: 1200px;
      width: 100%;
    }

    .admin-module {
      background-color: #fff;
      border-radius: 16px;
      overflow: hidden;
      width: 280px;
      height: 280px;
      text-align: center;
      position: relative;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
      color: #111;
    }

    .admin-module:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 28px rgba(0, 0, 0, 0.25);
    }

    .admin-icon {
      font-size: 4rem;
      color: #333;
      margin-top: 60px;
    }

    .admin-label {
      font-size: 1.5rem;
      font-weight: 600;
      margin-top: 25px;
    }
    .back-btn {
  padding: 10px 24px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 1.1rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

.back-btn:hover {
  background-color: #333;
  transform: scale(1.03);
}

  </style>
</head>
<body>

  <div class="admin-container">
    <a href="/adminPanels/adminNoticias.php" class="admin-module">
      <i class="bi bi-gear-fill admin-icon"></i>
      <div class="admin-label">Noticias</div>
    </a>

    <a href="/adminPanels/adminAnalisis.php" class="admin-module">
      <i class="bi bi-gear-fill admin-icon"></i>
      <div class="admin-label">Análisis</div>
    </a>

    <a href="/adminPanels/adminRankings.php" class="admin-module">
      <i class="bi bi-gear-fill admin-icon"></i>
      <div class="admin-label">Ranking</div>
    </a>
  </div>
  <div class="mt-4 text-center">
  <a href="index.php" class="btn btn-dark back-btn">← Volver al inicio</a>
</div>


</body>
</html>
