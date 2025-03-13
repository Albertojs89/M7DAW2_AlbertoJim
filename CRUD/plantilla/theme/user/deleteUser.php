<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

if(!isset($_GET['id'])){
  header('Location: ../index.php');
  exit();
}

// Corregir la asignación del ID
$id = (int) $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "GET"){
  //delete user con id
  $sql = "DELETE FROM USERS WHERE id = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("i", $id);

  if($stmt->execute()){
    $_SESSION['message'] = "Usuario eliminado correctamente";
  } else {
    $_SESSION['message'] = "Error al eliminar el usuario";
  }
  header('Location: ../adminPanel/adminUsers.php');
  exit();
}
?>