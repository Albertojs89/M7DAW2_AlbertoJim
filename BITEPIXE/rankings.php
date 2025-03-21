<?php
require_once 'config.php';

// Obtener todas las plataformas distintas (para el filtro)
$plataformas = $mysqli->query("SELECT DISTINCT plataforma FROM analisis")->fetch_all(MYSQLI_ASSOC);

// Procesar filtro si existe
$filtroPlataforma = isset($_GET['plataforma']) ? trim($_GET['plataforma']) : '';

// Consulta principal
$sql = "SELECT * FROM analisis";
if ($filtroPlataforma) {
    $sql .= " WHERE plataforma LIKE '%$filtroPlataforma%'";
}
$sql .= " ORDER BY nota DESC";
$analisis = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rankings - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/css/index.css">
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
      text-align: center;
    }

    .ranking-table td {
      vertical-align: middle;
      text-align: center;
    }

    .img-ranking {
      width: 80px;
      height: 60px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .filter-form {
      max-width: 300px;
      margin: 0 auto 20px;
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>

  <div class="ranking-container">
    <h2 class="ranking-title">📈 Rankings de Juegos</h2>

    <!-- Filtro de plataforma -->
    <form method="GET" class="filter-form mb-4">
      <select name="plataforma" class="form-select" onchange="this.form.submit()">
        <option value="">-- Ver todas las plataformas --</option>
        <?php foreach ($plataformas as $p): ?>
          <option value="<?= htmlspecialchars($p['plataforma']) ?>" <?= $filtroPlataforma === $p['plataforma'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($p['plataforma']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </form>

    <table class="table table-bordered ranking-table">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Título</th>
          <th>Plataforma</th>
          <th>Nota</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($analisis as $item): ?>
          <tr>
            <td><img src="images/<?= htmlspecialchars($item['imagen']) ?>" class="img-ranking" alt="<?= htmlspecialchars($item['titulo']) ?>"></td>
            <td><?= htmlspecialchars($item['titulo']) ?></td>
            <td><?= htmlspecialchars($item['plataforma']) ?></td>
            <td><span class="score-badge"><?= htmlspecialchars($item['nota']) ?></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <a href="index.php" class="btn btn-dark back-floating-btn">← Volver al inicio</a>

</body>
</html>
