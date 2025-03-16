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
  </div>

</body>
</html>
