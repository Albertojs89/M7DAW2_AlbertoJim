<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

// Consulta todos los proyectos
$result = $mysqli->query("SELECT * FROM PROJECTS ORDER BY id DESC");
$projects = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Proyectos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: beige;
    }
    .thumbnail-img {
      width: 100px;
      height: auto;
      object-fit: contain;
    }
  </style>
</head>
<body>

<section class="container mt-5">
  <h2 class="mb-4 text-center">Panel de Gestión de Proyectos</h2>

  <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-info"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
  <?php endif; ?>

  <!-- Botón añadir proyecto -->
  <div class="mb-3 text-end">
    <a href="addProject.php" class="btn btn-success">+ Añadir Proyecto</a>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Thumbnail</th>
        <th>Título</th>
        <th>URL</th>
        <th>Descripción</th>
        <th colspan="2">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($projects as $project): ?>
        <tr>
          <td><img src="../<?= $project['thumbnail'] ?>" class="thumbnail-img" alt="thumb"></td>
          <td><?= $project['title'] ?></td>
          <td><a href="<?= $project['url'] ?>" target="_blank"><?= $project['url'] ?></a></td>
          <td><?= $project['description'] ?></td>
          <td><a href="editProject.php?id=<?= $project['id'] ?>" class="btn btn-primary">Editar</a></td>
          <td><a href="deleteProject.php?id=<?= $project['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Botones navegación -->
  <div class="mt-4 d-flex gap-2">
    <a href="../logout.php" class="btn btn-secondary">Cerrar Sesión</a>
    <a href="../admin.php" class="btn btn-warning">Volver al Panel Admin</a>
    <a href="../index.php" class="btn btn-success">Volver al Inicio</a>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
