<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

$result = $mysqli->query("SELECT * FROM USERS ORDER BY id DESC");
$usuarios = $result->fetch_all(MYSQLI_ASSOC); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Usuarios</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: beige;
    }
    .avatar-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<section class="container-fluid mt-4">
  <h2 class="mb-4">Listado de Usuarios</h2>

  <!-- Mostrar mensaje si existe -->
  <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-info">
      <?= $_SESSION['message']; unset($_SESSION['message']); ?>
    </div>
  <?php endif; ?>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Avatar</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Edad</th>
        <th>Trabajo</th>
        <th colspan="2">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $usuario): ?>
        <tr>
          <td><img src="../<?= $usuario['avatar'] ?>" class="avatar-img" alt="avatar"></td>
          <td><?= $usuario['name'] ?></td>
          <td><?= $usuario['surname'] ?></td>
          <td><?= $usuario['email'] ?></td>
          <td><?= $usuario['role'] ?></td>
          <td><?= $usuario['age'] ?></td>
          <td><?= $usuario['job'] ?></td>
          <td><a href="../user/editUser.php?id=<?= $usuario['id'] ?>" class="btn btn-primary">Editar</a></td>
          <td><a href="../user/deleteUser.php?id=<?= $usuario['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="../logout.php" class="btn btn-secondary mt-3">Cerrar Sesión</a>
</section>
<div class="mt-3">
  <a href="../admin.php" class="btn btn-warning">Volver al Panel Admin</a>
  <a href="../index.php" class="btn btn-success">Volver al Inicio</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
