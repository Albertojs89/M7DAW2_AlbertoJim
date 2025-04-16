<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Obtener memory cards
$cards = $mysqli->query("SELECT * FROM MEMORY_CARD ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrar Memory Card - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/css/index.css">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      padding: 40px 20px;
    }
    .admin-memory-container {
      max-width: 1200px;
      margin: auto;
    }
    .admin-memory-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
      margin-top: 30px;
    }
    .memory-card {
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      padding-bottom: 20px;
      display: flex;
      flex-direction: column;
    }
    .memory-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .memory-card h4 {
      padding: 16px;
      font-size: 1.2rem;
      font-weight: 600;
      margin: 0;
    }
    .card-actions {
      display: flex;
      justify-content: center;
      gap: 12px;
    }
    .card-actions a {
      padding: 8px 14px;
      border-radius: 10px;
      font-size: 0.95rem;
      text-decoration: none;
      color: #fff;
    }
    .btn-edit {
      background-color: #4caf50;
    }
    .btn-edit:hover {
      background-color: #3e8e41;
    }
    .btn-delete {
      background-color: #e53935;
    }
    .btn-delete:hover {
      background-color: #c62828;
    }
    .btn-add-memory {
      display: inline-block;
      background-color: #2c2c2c;
      color: #fff;
      padding: 12px 24px;
      font-weight: 600;
      border-radius: 12px;
      text-decoration: none;
      margin-bottom: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .btn-add-memory:hover {
      background-color: #1e1e1e;
      transform: scale(1.05);
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
    }
    .btn-home-return:hover {
      background-color: #1e1e1e;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
<div class="admin-memory-container">
  <h2 class="text-center mb-4">Gestión de Memory Cards</h2>

  <?php if (isset($_GET['mensaje'])): ?>
    <div class="alert alert-success text-center">✅ <?= htmlspecialchars($_GET['mensaje']) ?> Serás redirigido en unos segundos...</div>
    <meta http-equiv="refresh" content="2;URL=adminMemory.php">
  <?php elseif (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center">❌ <?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif; ?>

  <div class="text-center mb-4">
    <a href="añadirMemoryCard.php" class="btn-add-memory"><i class="fas fa-plus"></i> Añadir Memory</a>
  </div>

  <div class="admin-memory-grid">
    <?php foreach ($cards as $card): ?>
      <div class="memory-card">
        <img src="../images/<?= htmlspecialchars($card['imagen']) ?>" alt="Imagen Memory">
        <h4><?= htmlspecialchars($card['titulo']) ?></h4>
        <div class="card-actions">
          <a href="editarMemory.php?id=<?= $card['id'] ?>" class="btn-edit"><i class="fas fa-pen"></i> Editar</a>
          <a href="eliminarMemory.php?id=<?= $card['id'] ?>" class="btn-delete"><i class="fas fa-trash"></i> Eliminar</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="text-center d-flex justify-content-center gap-3 mt-5 mb-4">
    <a href="../index.php" class="btn-home-return">
      <i class="fas fa-home"></i> Inicio
    </a>
    <a href="../admin.php" class="btn-home-return">
      <img src="../images/admin.png" alt="Admin Panel" style="width: 24px; height: 24px;"> Panel Admin
    </a>
  </div>
</div>
</body>
</html>
