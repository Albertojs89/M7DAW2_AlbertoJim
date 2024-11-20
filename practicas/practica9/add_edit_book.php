<?php
session_start();
include 'libreria.php';

// Verifica si el usuario ha iniciado sesión; si no, redirige a login.php.
if (($_SESSION['username']!='admin')) {
    header('Location: home.php');
    exit;
}
var_dump($_SESSION['libreria']['id']);
?>