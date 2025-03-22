<?php
session_start();
require_once 'config.php';

// Lógica del login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta segura (usamos prepare para evitar SQL injection)
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $usuario['password'])) {
            // Guardar datos en la sesión
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['avatar'] = $usuario['avatar'];


            header('Location: index.php');
            exit;
        } else {
            $error = "⚠ Contraseña incorrecta.";
        }
    } else {
        $error = "⚠ Usuario no encontrado.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión - BITEPIXE</title>
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

    .login-card {
      background-color: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      max-width: 450px;
      width: 100%;
    }

    .login-card h2 {
      font-weight: 700;
      margin-bottom: 25px;
      text-align: center;
    }

    .form-control {
      border-radius: 12px;
    }

    .btn-login {
      border-radius: 12px;
      font-weight: 600;
    }

    .form-label {
      font-weight: 500;
    }

    .error {
      color: red;
      text-align: center;
      font-weight: 600;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2>Iniciar Sesión</h2>

    <?php if (isset($error)): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="tucorreo@example.com" required>
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-dark btn-login">Entrar</button>
      </div>
    </form>

    <div class="d-grid mt-3">
      <a href="index.php" class="btn btn-outline-secondary btn-login">← Volver al inicio</a>
    </div>
  </div>

</body>
</html>




