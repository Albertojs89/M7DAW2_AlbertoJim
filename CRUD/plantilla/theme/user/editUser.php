<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

if(!isset($_GET['id'])){
  header('Location: ../index.php');
  exit();
}

// Corregir la asignación del ID
$id = (int) $_GET['id'];
$result = $mysqli->query("SELECT * FROM USERS WHERE id = $id");
$usuario = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $age = $_POST['age'];
  $job = $_POST['job'];

  $sql = "UPDATE USERS SET name=?, surname=?, email=?, role=?, age=?, job=? WHERE id=?";
  $stmt = $mysqli->prepare($sql); //statement
  $stmt->bind_param("ssssssi", $name, $surname, $email, $role, $age, $job, $id);
  if($stmt->execute()){
    header('Location:../adminPanel/adminUsers.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuario</title>
</head>
<body>
  <form method="POST">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" value="<?= $usuario['name'] ?>" required>
    <br>
    <label for="surname">Apellido:</label>
    <input type="text" id="surname" name="surname" value="<?= $usuario['surname'] ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $usuario['email'] ?>" required>
    <br>
    <label for="role">Rol:</label>
    <input type="text" id="role" name="role" value="<?= $usuario['role'] ?>" required>
    <br>
    <label for="age">Edad:</label>
    <input type="number" id="age" name="age" value="<?= $usuario['age'] ?>" required>
    <br>
    <label for="job">Trabajo:</label>
    <input type="text" id="job" name="job" value="<?= $usuario['job'] ?>" required>
    <br>
    <button type="submit">Guardar Cambios</button>
  </form>
</body>
</html>