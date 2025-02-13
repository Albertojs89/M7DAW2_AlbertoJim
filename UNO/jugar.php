<?php
session_start();

if (isset($_GET['color']) && isset($_GET['numero'])) {
    $color = $_GET['color'];
    $numero = $_GET['numero'];

    echo "<h1>Carta seleccionada:</h1>";
    echo "<p>Color: $color</p>";
    echo "<p>Número: $numero</p>";
} else {
    echo "<h1>Error: No se recibió ninguna carta válida.</h1>";
}
?>
