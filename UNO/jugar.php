<?php
session_start();
require_once 'baraja.class.php';
require_once 'jugador.class.php';

// Recuperar estado del juego
$baraja = unserialize($_SESSION['baraja']);
$jugador_actual = $_SESSION['jugador_actual'];
$jugadores = unserialize($_SESSION['jugadores']);
$carta_en_mesa = unserialize($_SESSION['carta_en_mesa']);

// Verificar si la carta es válida para jugar
if (isset($_GET['color']) && isset($_GET['numero'])) {
    $color = $_GET['color'];
    $numero = $_GET['numero'];
    $carta = new Carta($color, $numero);

    if ($carta->numero === $carta_en_mesa->numero || $carta->palo === $carta_en_mesa->palo) {
        // Actualizar la carta en la mesa
        $_SESSION['carta_en_mesa'] = serialize($carta);

        // Manejar cartas especiales
        if ($carta->numero === '+2') {
            $siguiente_jugador = ($_SESSION['sentido'] === 'horario')
                ? ($jugador_actual + 1) % count($jugadores)
                : ($jugador_actual - 1 + count($jugadores)) % count($jugadores);

            // El siguiente jugador roba 2 cartas
            if (count($baraja->conjunto_cartas) >= 2) {
                for ($i = 0; $i < 2; $i++) {
                    $jugadores[$siguiente_jugador]->añadir_carta(array_shift($baraja->conjunto_cartas));
                }
            }
            $jugador_actual = $siguiente_jugador;
        } elseif ($carta->numero === 'reverse') {
            // Cambiar el sentido del juego
            $_SESSION['sentido'] = ($_SESSION['sentido'] === 'horario') ? 'antihorario' : 'horario';
        } elseif ($carta->numero === 'skip') {
            // Saltar el turno del siguiente jugador
            $jugador_actual = ($_SESSION['sentido'] === 'horario')
                ? ($jugador_actual + 2) % count($jugadores)
                : ($jugador_actual - 2 + count($jugadores)) % count($jugadores);
        } else {
            // Turno normal
            $jugador_actual = ($_SESSION['sentido'] === 'horario')
                ? ($jugador_actual + 1) % count($jugadores)
                : ($jugador_actual - 1 + count($jugadores)) % count($jugadores);
        }

        // Actualizar la sesión
        $_SESSION['jugador_actual'] = $jugador_actual;
        $_SESSION['jugadores'] = serialize($jugadores);
        $_SESSION['baraja'] = serialize($baraja);
    } else {
        echo "<h1>Error: La carta no es válida para jugar.</h1>";
        exit;
    }
}

// Redirigir a index.php
header("Location: index.php");
exit;
?>
