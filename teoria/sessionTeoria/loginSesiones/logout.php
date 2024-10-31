<?php
session_start();
session_unset(); //eliminar las variables de sesión
session_destroy(); //destruir la sesión

header('Location: login.php'); //redireccionar al login

?>