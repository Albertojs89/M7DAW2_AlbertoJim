<?php
session_start();
include 'libreria.php';
include 'functions.php';

if (($_SESSION['username']!='admin')) {
    header('Location: home.php');
    exit;
}

$id=$_GET['id'];
if (isset($_GET['id'])){
  eliminarLibro($id);
  header('Location: home.php');
}


?>
