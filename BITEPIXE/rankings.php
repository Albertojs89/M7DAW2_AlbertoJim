<?php
session_start();
require_once 'config.php';

$plataformas = $mysqli->query("SELECT DISTINCT plataforma FROM analisis")->fetch_all(MYSQLI_ASSOC);
$filtroPlataforma = isset($_GET['plataforma']) ? trim($_GET['plataforma']) : '';
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
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
  

    .ranking-container {
      max-width: 1000px;
      margin: 120px auto 60px;
      background-color: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .ranking-title {
      text-align: center;
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 30px;
      color: #222 !important;
    }

    .ranking-table th {
      background-color: #222;
      color: #fff;
      text-align: center;
      font-weight: bold;
      font-size: 1.05rem;
    }

    .ranking-table td {
      vertical-align: middle;
      text-align: center;
      font-size: 1rem;
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

    .score-badge {
      font-weight: bold;
      padding: 6px 12px;
      border-radius: 8px;
      background-color: #e0e0e0;
      color: #000;
    }

    .btn-home-return {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      background-color: #2c2c2c;
      color: #fff;
      border: 2px solid #2c2c2c;
      padding: 10px 20px;
      font-weight: 600;
      border-radius: 12px;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      font-size: 1rem;
      margin: 30px auto 0;
    }

    .btn-home-return:hover {
      background-color: #1e1e1e;
      transform: scale(1.05);
    }

    .btn-home-return i {
      font-size: 1.1rem;
    }

    @media screen and (max-width: 768px) {
      .ranking-container {
        padding: 25px;
      }

      .img-ranking {
        width: 60px;
        height: 50px;
      }

      .ranking-title {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="ranking-container">
  <h2 class="ranking-title">📈 Rankings de Juegos</h2>

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

  <div class="text-center">
    <a href="index.php" class="btn-home-return">
      <i class="fas fa-home"></i>
    </a>
  </div>
</div>

</body>
</html>
