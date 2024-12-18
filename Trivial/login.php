<?php
session_start();
require_once('header.php');
$_SESSION['username']=$_POST['username'];
$_SESSION['role']=$_POST['rol'];

if(isset($_SESSION['username'])){
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  <div>
    <h2>Ingresa tu usuario y rol</h2>
    
  <form method="POST">
    <div class="inputBox ">
        <input class="p-2 m-2 form-control" placeholder="Username" type="text" name="username" required>
        
    </div>
    <div class="inputBox ">
        <input class="p-2 m-2 form-control" placeholder="Rol" type="text" name="rol" required>
    </div>
    <div class="inputBox">
     <a href="index.php"> <input class="bg-warning btn mt-2" type="submit" value="Iniciar"></a>
    </div>
  </div>
</body>
</html>