<?php
session_start();
require_once 'config.php';

// Obtener todos los análisis
$analisis = $mysqli->query("SELECT * FROM analisis ORDER BY fecha DESC")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Análisis - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .analisis-grid {
      max-width: 1200px;
      margin: 100px auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
      padding: 0 20px;
      margin-top: 200px !important;
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

    .analisis-card img.card-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .analisis-card-title {
      padding: 20px 20px 10px;
      font-size: 1.2rem;
      font-weight: 600;
      text-align: center;
    }

    .platform-icons {
      display: flex;
      justify-content: center;
      gap: 10px;
      padding-bottom: 15px;
    }

    .platform-icons img {
      width: 35px;
      height: 35px;
      object-fit: contain;
    }
    .pc-icon {
  width: 28px !important;
  height: 28px !important;
  object-fit: contain;
}

  </style>
</head>
<body>
<?php include 'header.php'; ?>

  <div class="analisis-grid container-fluid">
    <?php foreach ($analisis as $item): ?>
      <a href="analisisDetalle.php?id=<?= $item['id'] ?>" class="analisis-card">
        <img src="images/<?= htmlspecialchars($item['imagen']) ?>" class="card-img" alt="<?= htmlspecialchars($item['titulo']) ?>">
        <div class="analisis-card-title"><?= htmlspecialchars($item['titulo']) ?></div>
        <div class="platform-icons">
          <?php
            $plataformas = explode(',', $item['plataforma']);
            foreach ($plataformas as $plat) {
              $plat = trim($plat);
              $iconPath = "images/plataformas/" . strtolower($plat) . ".png";
              if (file_exists(__DIR__ . $iconPath)) {
                $class = (strtolower($plat) === 'pc') ? 'pc-icon' : '';
                echo '<img src="' . $iconPath . '" alt="' . htmlspecialchars($plat) . '" class="' . $class . '">';

              } else {
                echo '<img src="' . $iconPath . '" alt="' . htmlspecialchars($plat) . '">'; // Si no existe igual se muestra el path
              }
            }
          ?>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

</body>
</html>
