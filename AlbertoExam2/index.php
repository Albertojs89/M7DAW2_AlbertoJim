<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['apellido1'] = $_POST['apellido1'];
    $_SESSION['apellido2'] = $_POST['apellido2'];

     header('Location: inicio.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <?php include 'header.php'; ?>
  
  <div class="signin">
    <div class="content text-center">
        <h2>Inicia sesión</h2>
        <form method="POST" action="">
            <div class="inputBox ">
                <input class="p-2 m-2 form-control" placeholder="name" type="text" name="name" required>
            </div>
            <div class="inputBox ">
                <input class="p-2 m-2 form-control" placeholder="apellido" type="text" name="apellido1" required>
            </div>
            <div class="inputBox ">
                <input class="p-2 m-2 form-control" placeholder="apellido2" type="text" name="apellido2" value="" required>
            </div>
            <div class="inputBox">
                <input class="bg-warning btn mt-2" type="submit" value="Iniciar">
            </div>
        </form>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
