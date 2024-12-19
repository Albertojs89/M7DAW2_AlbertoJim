<?php
session_start();
if(isset($_SESSION['username'])){
  echo'
  <header style:"font-family: "Sour Gummy", serif!important; ">
    <h2>Jugador: '.$_SESSION['username'].'</h2>
    <h3>Rol: '.$_SESSION['role'].'</h3>
  </header>
  ';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barrio&family=Delius&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<body>
  
</body>
</html>
