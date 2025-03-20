<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

$result = $mysqli->query("SELECT * FROM TESTIMONIALS ORDER BY id DESC");
$testimonials = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Testimonios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
  <style>
    .testimonial-photo {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 8px;
    }
    .stars {
      color: #f7d106;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Panel de Testimonios</h2>

  <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info">
      <?= $_SESSION['message']; unset($_SESSION['message']); ?>
    </div>
  <?php endif; ?>

  <div class="mb-3">
    <a href="../admin.php" class="btn btn-warning">Volver al Panel Admin</a>
    <a href="../index.php" class="btn btn-success">Volver al Inicio</a>
    <a href="addTestimonial.php" class="btn btn-primary">+ Añadir Testimonio</a>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Descripción</th>
        <th>Valoración</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($testimonials as $t): ?>
        <tr>
          <td>
            <?php if (!empty($t['photo'])): ?>
              <img src="../<?= $t['photo'] ?>" alt="testimonial" class="testimonial-photo">
            <?php else: ?>
              <span class="text-muted">Sin imagen</span>
            <?php endif; ?>
          </td>
          <td><?= $t['name'] ?></td>
          <td><?= $t['surname'] ?></td>
          <td><?= mb_strimwidth($t['description'], 0, 80, '...') ?></td>
          <td class="stars">
            <?php for ($i = 0; $i < $t['rating']; $i++): ?>
              <i class="fas fa-star"></i>
            <?php endfor; ?>
          </td>
          <td>
            <a href="editTestimonial.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="deleteTestimonial.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este testimonio?')">
              <i class="fas fa-trash-alt"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
