<?php
session_start();
require_once 'config.php';

// Verificar si hay ID válida
if (!isset($_GET['id'])) {
  echo "Análisis no encontrado.";
  exit;
}

$id = intval($_GET['id']);

// Obtener el análisis desde la BD
$stmt = $mysqli->prepare("SELECT * FROM analisis WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$analisis = $result->fetch_assoc();

if (!$analisis) {
  echo "Análisis no encontrado.";
  exit;
}

// Preparar plataformas como array
$plataformas = explode(',', $analisis['plataforma']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($analisis['titulo']) ?> - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styles/css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      padding: 40px 20px;
      min-height: 100vh;
    }

    .analisis-container {
      background-color: #fff;
      max-width: 900px;
      margin: 80px auto;
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
      margin-bottom: 15px;
      text-align: center;
    }

    .analisis-subtitle {
      font-size: 1.4rem;
      font-weight: 500;
      margin-bottom: 20px;
      text-align: center;
      color: #444;
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

    .platform-icons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 20px;
    }

    .platform-icons img {
      width: 40px;
      height: 40px;
      object-fit: contain;
    }

    .platform-icons img.pc-icon {
      width: 30px !important;
      height: 30px !important;
    }

    @media screen and (max-width: 768px) {
      .analisis-container {
        padding: 25px;
      }

      .analisis-img {
        height: 250px;
      }

      .analisis-title {
        font-size: 1.6rem;
      }
    }
    .btn-home-return {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background-color: #2c2c2c; /* Gris oscuro */
  color: #fff;
  border: 2px solid #2c2c2c;
  padding: 10px 20px;
  font-weight: 600;
  border-radius: 12px;
  text-decoration: none;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  font-size: 1rem;
}

.btn-home-return i {
  font-size: 1.1rem;
}

.btn-home-return:hover {
  background-color: #1e1e1e;
  transform: scale(1.05);
}

  </style>
</head>
<body>
<?php include 'header.php'; ?>

  <div class="analisis-container">
    <img src="/images/<?= htmlspecialchars($analisis['imagen']) ?>" alt="Imagen del juego" class="analisis-img">

    <h1 class="analisis-title"><?= htmlspecialchars($analisis['titulo']) ?></h1>
    <h2 class="analisis-subtitle"><?= htmlspecialchars($analisis['subtitulo']) ?></h2>

    <p class="analisis-text"><?= nl2br(htmlspecialchars($analisis['texto'])) ?></p>

    <div class="platform-icons">
      <?php foreach ($plataformas as $plat): 
        $plat = trim($plat);
        $iconPath = "/images/plataformas/" . strtolower($plat) . ".png";
        $class = (strtolower($plat) === 'pc') ? 'pc-icon' : '';
      ?>
        <img style="object-fit: contain; width: 80px;" src="<?= $iconPath ?>" class="<?= $class ?>" alt="<?= htmlspecialchars($plat) ?>">
      <?php endforeach; ?>
    </div>

    <div class="analisis-meta mt-4">
      <div class="analisis-note">⭐ <?= htmlspecialchars($analisis['nota']) ?></div>
      <div class="analisis-date">Publicado: <?= htmlspecialchars($analisis['fecha']) ?></div>
    </div>

    <!-- botones navegación -->
    <div class="text-center mt-5 d-flex justify-content-center gap-3">
      <a href="index.php" class="btn-home-return">
        <i class="fas fa-home"></i> 
      </a>
      <a href="analisis.php" class="btn-home-return">
        <i class="fas fa-arrow-left"></i> 
      </a>
    </div>

  </div>
      
</body>
</html>
