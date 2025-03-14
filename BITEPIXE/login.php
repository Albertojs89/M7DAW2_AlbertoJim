<?php

//AQUI VA LA LOGICA PHP

?>





<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
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
      max-width: 400px;
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
  </style>
</head>
<body>

  <div class="login-card">
    <h2>Iniciar sesión</h2>
    <form action="procesar_login.php" method="POST">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" required>
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-dark btn-login">Entrar</button>
      </div>
    </form>
  </div>

</body>
</html>
