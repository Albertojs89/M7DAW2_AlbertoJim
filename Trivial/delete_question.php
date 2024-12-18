<?php
session_start();
include 'data.php';




$id=$_GET['id'];
if (isset($_GET['id'])){
  eliminarPregunta($id);
  header('Location: manage.php');
  exit();
}


?>