<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Verificar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: adminUsuarios.php?error=ID no válido');
    exit();
}

$id = intval($_GET['id']);

// Obtener usuario
$stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: adminUsuarios.php?error=Usuario no encontrado');
    exit();
}

$usuario = $result->fetch_assoc();

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $rol = trim($_POST['rol']);
    $avatar = trim($_POST['avatar']);

    if ($nombre && $email && $rol && $avatar) {
        $update = $mysqli->prepare("UPDATE usuarios SET nombre = ?, email = ?, rol = ?, avatar = ? WHERE id = ?");
        $update->bind_param("ssssi", $nombre, $email, $rol, $avatar, $id);
        if ($update->execute()) {
            echo "<div class='alert alert-success text-center mx-auto mt-4 shadow' style='max-width: 600px; font-size: 1.1rem; border-radius: 12px;'>
                    ✅ Usuario actualizado correctamente. <br><small>Serás redirigido en unos segundos...</small>
                  </div>";
            echo "<meta http-equiv='refresh' content='2;URL=adminUsuarios.php'>";
            exit;
        } else {
            $error = "Error al actualizar usuario.";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuario - BITEPIXE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      padding: 40px;
      display: flex;
      justify-content: center;
    }
    .form-card {
      background-color: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
    }
    .form-card h2 {
      text-align: center;
      font-weight: 700;
      margin-bottom: 30px;
    }
    .btn-dark {
      font-weight: 600;
      border-radius: 10px;
    }
    .alert {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<div class="form-card">
  <h2>✏ Editar Usuario</h2>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Correo electrónico</label>
      <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="rol" class="form-label">Rol</label>
      <select name="rol" id="rol" class="form-select" required>
        <option value="user" <?= $usuario['rol'] === 'user' ? 'selected' : '' ?>>Usuario</option>
        <option value="admin" <?= $usuario['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="avatar" class="form-label">Nombre archivo avatar</label>
      <input type="text" name="avatar" id="avatar" class="form-control" value="<?= htmlspecialchars($usuario['avatar']) ?>" required>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-dark">Guardar Cambios</button>
      <a href="adminUsuarios.php" class="btn btn-outline-secondary">← Volver</a>
    </div>
  </form>
</div>
</body>
</html>
