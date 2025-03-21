<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Obtener usuarios
$usuarios = $mysqli->query("SELECT * FROM usuarios ORDER BY fecha_registro DESC")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Administrar Usuarios - BITEPIXE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      padding: 40px 20px;
    }
    .usuarios-container {
      max-width: 1200px;
      margin: auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .usuarios-container h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .avatar-mini {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0 0 6px rgba(0,0,0,0.2);
    }
    .btn-edit {
      background-color: #4caf50;
      color: white;
    }
    .btn-edit:hover {
      background-color: #3e8e41;
    }
    .btn-delete {
      background-color: #e53935;
      color: white;
    }
    .btn-delete:hover {
      background-color: #c62828;
    }
    .btn-nav {
      display: inline-block;
      margin-top: 20px;
      border-radius: 12px;
      padding: 10px 20px;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      background-color: #2c2c2c;
      border: 2px solid #2c2c2c;
    }
    .btn-nav:hover {
      background-color: #1e1e1e;
    }
  </style>
</head>
<body>

<div class="usuarios-container">
  <h2>👤 Lista de Usuarios Registrados</h2>

  <?php if (isset($_GET['mensaje'])): ?>
    <div class="alert alert-success text-center"><?= htmlspecialchars($_GET['mensaje']) ?></div>
  <?php elseif (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center"><?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif; ?>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Avatar</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Rol</th>
          <th>Fecha Registro</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $u): ?>
          <tr>
            <td><?= $u['id'] ?></td>
            <td><img src="../images/avatars/<?= htmlspecialchars($u['avatar']) ?>" alt="Avatar" class="avatar-mini"></td>
            <td><?= htmlspecialchars($u['nombre']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['rol']) ?></td>
            <td><?= date("d-m-Y", strtotime($u['fecha_registro'])) ?></td>
            <td>
              <a href="editarUsuario.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-edit"><i class="fas fa-pen"></i></a>
              <a href="eliminarUsuario.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="text-center mt-4 d-flex justify-content-center gap-3">
    <a href="../index.php" class="btn-nav"><i class="fas fa-home"></i> Inicio</a>
    <a href="../admin.php" class="btn-nav"><img src="../images/admin.png" alt="Panel Admin" style="width: 20px; height: 20px; vertical-align: middle;"> Panel Admin</a>
  </div>
</div>

</body>
</html>
