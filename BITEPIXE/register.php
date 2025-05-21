<?php
session_start();
require_once 'config.php';

$mensaje = '';

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = trim($_POST["nombre"]);
  $email = trim($_POST["email"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  // Procesar avatar
  $avatar_nombre = '';
  if (!empty($_FILES['avatar']['name'])) {
    $nombre_archivo = uniqid() . '_' . basename($_FILES['avatar']['name']);
    $ruta_destino = "images/avatars/" . $nombre_archivo;
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $ruta_destino)) {
      $avatar_nombre = $nombre_archivo;
    } else {
      $mensaje = "Error al subir el avatar.";
    }
  }

  if (empty($mensaje)) {
    // Insertar en base de datos
    $stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, email, password, avatar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $email, $password, $avatar_nombre);

    if ($stmt->execute()) {
      header('Location: login.php'); // redirigir si todo fue bien
      exit;
    } else {
      $mensaje = '❌ Error al registrar usuario.';
    }

    $stmt->close();
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: #f5f5f5;
      background-image: radial-gradient(circle, rgba(0, 0, 0, 0.05) 2px, transparent 1px);
      background-size: 20px 20px;
      font-family: 'Urbanist', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .register-card {
      background-color: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      max-width: 450px;
      width: 100%;
    }

    .register-card h2 {
      font-weight: 700;
      margin-bottom: 25px;
      text-align: center;
      font-size: 1.8rem;
    }

    .form-control {
      border-radius: 12px;
    }

    .btn-register {
      border-radius: 12px;
      font-weight: 600;
    }

    .form-label {
      font-weight: 500;
    }

    .mensaje {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      color: #d9534f;
    }

    @media (max-width: 768px) {
      .register-card {
        padding: 25px;
        border-radius: 12px;
      }

      .register-card h2 {
        font-size: 1.5rem;
      }
    }

    @media (max-width: 480px) {
      .register-card {
        padding: 20px;
        box-shadow: none;
        background-color: #fff;
        border: 1px solid #ddd;
      }

      .register-card h2 {
        font-size: 1.4rem;
      }

      .btn-register {
        font-size: 0.95rem;
        padding: 10px 16px;
      }
    }
  </style>
</head>
<body>

  <div class="register-card">
    <h2>Crear cuenta</h2>

    <?php if (!empty($mensaje)): ?>
      <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required />
      </div>

      <div class="mb-3">
        <label for="avatar" class="form-label">Avatar (sube una imagen)</label>
        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required />
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-dark btn-register">Registrarme</button>
      </div>
    </form>

    <div class="d-grid mt-3">
      <a href="index.php" class="btn btn-outline-secondary btn-register">← Volver al inicio</a>
    </div>
  </div>

</body>
</html>
