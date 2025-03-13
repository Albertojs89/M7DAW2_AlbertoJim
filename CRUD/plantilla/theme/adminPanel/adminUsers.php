<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

$result=$mysqli->query("SELECT * FROM USERS ORDER BY id DESC");
$usuarios=$result->fetch_all(MYSQLI_ASSOC); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
  body{
    background-color: beige;
  }
</style>
<section class="container-fluid">
 
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Rol</th>
        <th scope="col">Edad</th>
        <th scope="col">Trabajo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($usuarios as $usuario) {
        echo '
          <tr>
            <th scope="row">' . $usuario['name'] . '</th>
            <td>' . $usuario['surname'] . '</td>
            <td>' . $usuario['email'] . '</td>
            <td>' . $usuario['role'] . '</td>
            <td>' . $usuario['age'] . '</td>
            <td>' . $usuario['job'] . '</td>
            <td><a href="../user/editUser.php?id=' . $usuario['id'] . '" class="btn btn-primary">Editar Usuario</a></td>
          </tr>
        ';
      }
      ?>
    </tbody>
  </table>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>