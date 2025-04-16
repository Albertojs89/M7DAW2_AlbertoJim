<?php
session_start();
require_once 'config.php';

$mensaje = '';

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = trim($_POST['nombre']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

  // Subida del avatar
  $avatarNombreFinal = null;

  if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $nombreOriginal = $_FILES['avatar']['name'];
    $tmp = $_FILES['avatar']['tmp_name'];
    $ext = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
    $permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($ext, $permitidas)) {
      $avatarNombreFinal = uniqid('avatar_', true) . '.' . $ext;
      $rutaDestino = __DIR__ . '/images/avatars/' . $avatarNombreFinal;

      if (move_uploaded_file($tmp, $rutaDestino)) {
        // Guardar en BD
        $stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, email, avatar, password, rol, fecha_registro) VALUES (?, ?, ?, ?, 'user', NOW())");
        $stmt->bind_param("ssss", $nombre, $email, $avatarNombreFinal, $passwordHashed);

        if ($stmt->execute()) {
          $mensaje = "<div class='alert alert-success text-center'>✅ Usuario registrado correctamente.</div>";
        } else {
          $mensaje = "<div class='alert alert-danger text-center'>❌ Error al registrar usuario: " . $stmt->error . "</div>";
        }
        $stmt->close();
      } else {
        $mensaje = "<div class='alert alert-danger text-center'>❌ Error al mover el archivo al servidor.</div>";
      }
    } else {
      $mensaje = "<div class='alert alert-danger text-center'>❌ Tipo de archivo no permitido. Solo JPG, PNG, GIF, WEBP.</div>";
    }
  } else {
    $mensaje = "<div class='alert alert-danger text-center'>❌ No se subió ningún avatar o hubo un error.</div>";
  }

  $mysqli->close();
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
       background-color: #f5f5f5; /* Gris claro */
  background-image: radial-gradient(circle, rgba(0, 0, 0, 0.05) 2px, transparent 1px); /* Patrón sutil */
  background-size: 20px 20px; /* Tamaño del patrón */
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
    }
  </style>
</head>
<body>

  <div class="register-card">
    <h2>Crear cuenta</h2>

    <?php if (isset($mensaje)): ?>
      <div class="mensaje"><?= $mensaje ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required>
  </div>

  <div class="mb-3">
    <label for="avatar" class="form-label">Avatar (sube una imagen)</label>
    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" required>
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
