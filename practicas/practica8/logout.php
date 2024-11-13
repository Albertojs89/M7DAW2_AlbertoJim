<?
session_start();
session_destroy();
header("Location: index.php"); // Redirige al usuario a 'index.php'
exit; 

?>