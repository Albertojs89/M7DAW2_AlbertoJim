<?php
session_start();
require_once('header.php');
$_SESSION['username'] = $_POST['username'];
$_SESSION['role'] = $_POST['rol'];

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barrio&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <style>
    
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Asegura que el formulario esté centrado verticalmente */
      
    }
    .form-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px; 
    }
    .form-title {
      margin-bottom: 20px;
      text-align: center;
    }
    .form-control {
      border-radius: 5px;
    }
    .btn-custom {
      background-color: #f0ad4e;
      color: white;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="form-container">
      <h2 class="form-title">Ingresa tu usuario y rol</h2>
      <form method="POST">
        <div class="mb-3">
          <input class="p-2 form-control" placeholder="Username" type="text" name="username" required>
        </div>
        <div class="mb-3">
          <input class="p-2 form-control" placeholder="Rol" type="text" name="rol" required>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-custom mt-2">Iniciar</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
