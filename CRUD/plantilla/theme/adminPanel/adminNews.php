<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

// Obtener las noticias ordenadas por fecha
$result = $mysqli->query("SELECT * FROM NEWS ORDER BY new_date DESC");
$news = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin News</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: #f9f9f9;
    }
    img {
      width: 140px;
      height: auto;
      object-fit: cover;
    }
  </style>
</head>
<body>

<section class="container mt-5">
  <h2 class="text-center mb-4">Panel de Noticias</h2>

  <!-- Botones navegación -->
  <div class="mb-4">
    <a href="../admin.php" class="btn btn-warning me-2">Volver al Panel Admin</a>
    <a href="../index.php" class="btn btn-success me-2">Volver al Inicio</a>
    <a href="addNews.php" class="btn btn-primary">+ Añadir Noticia</a>
  </div>

  <!-- Tabla de noticias -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Título</th>
        <th>Imagen</th>
        <th>Descripción</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($news as $new): ?>
        <tr>
          <td><?= $new['new_date'] ?></td>
          <td><?= $new['title'] ?></td>
          <td>
           <img class="img" src="../<?= $new['thumbnail'] ?>" alt="post-thumb" class="card-img-top mb-2" />




          </td>
          <td><?= mb_strimwidth($new['description'], 0, 80, '...') ?></td>
          <td>
            <a href="editNews.php?id=<?= $new['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="deleteNews.php?id=<?= $new['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta noticia?')">
              <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
