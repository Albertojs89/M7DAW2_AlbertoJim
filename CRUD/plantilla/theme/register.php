<?php
session_start();
require_once './comicsSoons/config.php';

// COMPROBAR QUE LOS DATOS NO ESTÁN VACÍOS
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email= $_POST['email'];
  $avatar = $_POST['avatar'];
  $password = $_POST['password'];
  $age = $_POST['age'];
  $job = $_POST['job'];

  // Cifrar la contraseña con hash
  $passwordhashed = password_hash($password, PASSWORD_DEFAULT);

  // Preparar la consulta antes de insertar para evitar el SQL Injection
  $stmt = $mysqli->prepare(
    "INSERT INTO USERS (name, surname, email, avatar, password, role, age, job, date_register) VALUES (?, ?, ?, ?, ?, 'user', ?, ?, now())"
  );

  // Comprobar que la preparación tuvo éxito
  if (!$stmt) {
    die('Error al preparar la consulta: ' . $mysqli->error);  // Mejor usar die() para ver el error y detener el script
  }

  // Bindear los parámetros
  $stmt->bind_param('sssssis', $name, $surname, $email, $avatar, $passwordhashed, $age, $job);

  // Ejecutar la consulta
  if ($stmt->execute()) {
    echo 'Usuario registrado correctamente';
  } else {
    echo 'Error al registrar al usuario: ' . $stmt->error;
  }

  // Cerrar la conexión
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
<body>
  <!-- formulario  -->
   <form action="" method="post">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="surname">Apellidos:</label>
    <input type="text" id="surname" name="surname"><br><br>

    <label for="age">Edad:</label>
    <input type="number" id="age" name="age"><br><br>

    <label for="job">Puesto:</label>
    <input type="text" id="job" name="job"><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email"><br><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="avatar">Avatar</label>
    <input type="text" id="avatar" name="avatar"><br><br>

    <input type="submit" value="Registrarse">
  </form>
</body>
</html>