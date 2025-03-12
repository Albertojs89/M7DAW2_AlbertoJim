<?php
session_start();
require_once '../theme/comicsSoons/config.php';

//verificar si eres admin, sino redirige a index.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}


?>





<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>adminPanel</title>
</head>
<link href="css/admin.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<body>
 <div class="card-container">
    <a href="adminPanel/adminTestimonials.php" class="card testimonials">TESTIMONIALS</a>
    <a href="adminPanel/adminNews.php" class="card news">NEWS</a>
    <a href="adminPanel/adminUsers.php" class="card users">USERS</a>
    <a href="adminPanel/adminProjects.php" class="card projects">PROJECTS</a>
  </div>
</body>
</html>