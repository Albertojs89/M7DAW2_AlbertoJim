<?php
require_once 'baraja.class.php';



// Validar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y asegurar que los datos existen y son números
    // is_numeric se asegura de que el valor recibido sea un número o una cadena numérica
    if (isset($_POST['num_jugadores']) && is_numeric($_POST['num_jugadores'])) {
        // (int) convierte el valor a un número entero
        $num_jugadores = (int)$_POST['num_jugadores'];
    } else {
        die("Error: Número de jugadores inválido.");
    }

    if (isset($_POST['num_cartas']) && is_numeric($_POST['num_cartas'])) {
        $num_cartas = (int)$_POST['num_cartas'];
    } else {
        die("Error: Número de cartas inválido.");
    }

    // Validar el rango de los datos
    if ($num_jugadores < 1 || $num_jugadores > 5) {
        die("Error: El número de jugadores debe estar entre 1 y 5.");
    }

    if ($num_cartas < 1 || $num_cartas > 7) {
        die("Error: El número de cartas debe estar entre 1 y 7.");
    }

    // Si todo es válido, podemos inicializar la partida
    echo "<h1>Partida Inicializada</h1>";
    echo "<p>Número de jugadores: $num_jugadores</p>";
    echo "<p>Número de cartas por jugador: $num_cartas</p>";

    // Logica mas adelante-->


    
} else {
    echo "<h1>Error: No se recibieron datos del formulario.</h1>";
}
?>
















<!-- //probamos que salgan en pantalla pintadas:
// $baraja = new Baraja();
// $baraja->crea_baraja(); // Generar todas las cartas
// $baraja->mezcla(); // Barajar las cartas

// echo $baraja->pinta_baraja(); // Mostrar las cartas visualmente


//  -->

<a href="formulario_uno.php" class="btn btn-primary">Ir al formulario</a>
