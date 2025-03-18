<?php
session_start();
require_once './comicsSoons/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email= $_POST['email'];
  $password = $_POST['password'];
  $age = $_POST['age'];
  $job = $_POST['job'];

  // Cifrar contraseña
  $passwordhashed = password_hash($password, PASSWORD_DEFAULT);

  // --- Subida de imagen (AVATAR) ---
  $nombreArchivo = $_FILES['avatar']['name'];
  $archivoTemporal = $_FILES['avatar']['tmp_name'];

  // Crear carpeta si no existe
  $rutaCarpeta = 'uploads/avatars/';
  if (!is_dir($rutaCarpeta)) {
    mkdir($rutaCarpeta, 0777, true);
  }

  // Evitar sobreescritura con nombre único
  $nombreUnico = uniqid() . '_' . $nombreArchivo;
  $rutaDestino = $rutaCarpeta . $nombreUnico;

  // Mover el archivo al destino final
  move_uploaded_file($archivoTemporal, $rutaDestino);

  // Guardar ruta en BD
  $avatar = $rutaDestino;

  // Preparar consulta
  $stmt = $mysqli->prepare(
    "INSERT INTO USERS (name, surname, email, avatar, password, role, age, job, date_register) 
     VALUES (?, ?, ?, ?, ?, 'user', ?, ?, now())"
  );

  if (!$stmt) {
    die('Error al preparar la consulta: ' . $mysqli->error);
  }

  $stmt->bind_param('sssssis', $name, $surname, $email, $avatar, $passwordhashed, $age, $job);

  if ($stmt->execute()) {
    echo 'Usuario registrado correctamente. <a href="login.php">Iniciar sesión</a>';
  } else {
    echo 'Error al registrar al usuario: ' . $stmt->error;
  }

  $stmt->close();
  $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
</head>
<style>
  .btn {
    margin-top: 50px !important;
  }
</style>
<body>

  <h1>Registro de Usuario</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="surname">Apellidos:</label>
    <input type="text" id="surname" name="surname" required><br><br>

    <label for="age">Edad:</label>
    <input type="number" id="age" name="age" required><br><br>

    <label for="job">Puesto:</label>
    <input type="text" id="job" name="job" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="avatar">Avatar:</label>
    <input type="file" id="avatar" name="avatar" accept="image/*" required><br><br>

    <input type="submit" value="Registrarse">
  </form>

  <div class="container mt-3">
    <a class="btn btn-info mt-5" href="index.php">Volver al Inicio</a>
  </div>

</body>
</html>
