<?php
require_once 'baraja.class.php';
require_once 'jugador.class.php';

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

    // Crear y mezclar la baraja
    $baraja = new Baraja();
    $baraja->crea_baraja(); // Crear todas las cartas
    $baraja->mezcla(); // Mezclar la baraja

    // Inicializar jugadores y repartir cartas
    $jugadores = [];
    for ($i = 1; $i <= $num_jugadores; $i++) {
        $jugador = new Jugador($i); // Crear jugador con un ID único
        for ($j = 0; $j < $num_cartas; $j++) {
            $carta = array_shift($baraja->conjunto_cartas); // Sacar una carta de la baraja
            $jugador->añadir_carta($carta); // Añadir la carta al jugador
        }
        $jugadores[] = $jugador; // Añadir el jugador al array de jugadores
    }

    // Mostrar la mano de cada jugador
    echo "<h1>Partida Inicializada</h1>";
    echo "<p>Número de jugadores: $num_jugadores</p>";
    echo "<p>Número de cartas por jugador: $num_cartas</p>";

    foreach ($jugadores as $jugador) {
        echo "<h2>Jugador {$jugador->id}</h2>";
        echo $jugador->mostrar_mano(); // Mostrar las cartas del jugador
    }

} else {
    echo "<h1>Error: No se recibieron datos del formulario.</h1>";
}
?>
