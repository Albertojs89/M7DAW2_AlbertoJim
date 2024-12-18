<?php
session_start();
include 'header.php';
include 'data.php';



// Obtener el ID de la pregunta de la URL
$id = $_GET['id'];
$action = $_GET['action'];
echo $action;
echo "<br>";
// Verificar si el ID existe y mostrar un mensaje o realizar alguna acción
if (isset($id)) {
    echo "El ID de la pregunta es: " . $id;
    // Resto del código para editar o añadir la pregunta
} else {
    echo "No se ha proporcionado un ID de pregunta.";
}

?>