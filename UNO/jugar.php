<?php
session_start();
require_once 'baraja.class.php';
require_once 'jugador.class.php';

$baraja = unserialize($_SESSION['baraja']);
$jugadores = unserialize($_SESSION['jugadores']);
$jugador_actual = $_SESSION['jugador_actual'];
$carta_en_mesa = unserialize($_SESSION['carta_en_mesa']);

if (isset($_GET['color']) && isset($_GET['numero'])) {
    $color = $_GET['color'];
    $numero = $_GET['numero'];

    // Verificar si la carta está en la mano del jugador actual
    $carta_encontrada = false;
    foreach ($jugadores[$jugador_actual]->mano as $key => $carta) {
        if ($carta->palo === $color && $carta->numero == $numero) {
            $carta_encontrada = true;
            unset($jugadores[$jugador_actual]->mano[$key]); // Remover la carta de la mano del jugador
            break;
        }
    }

    if (!$carta_encontrada) {
        $_SESSION['error'] = "Error: La carta seleccionada no pertenece a la mano del jugador actual.";
        header("Location: index.php");
        exit;
    }

    // Verificar si la carta es válida para jugar
    if ($color === $carta_en_mesa->palo || $numero === $carta_en_mesa->numero) {
        // Colocar la carta en la mesa
        $_SESSION['carta_en_mesa'] = serialize(new Carta($color, $numero));

        // Verificar si es una carta especial
        if ($numero === '+2') {
            // El siguiente jugador debe robar dos cartas
            $siguiente_jugador = ($jugador_actual + 1) % count($jugadores);
            for ($i = 0; $i < 2; $i++) {
                if (!empty($baraja->conjunto_cartas)) {
                    $nueva_carta = array_shift($baraja->conjunto_cartas);
                    $jugadores[$siguiente_jugador]->añadir_carta($nueva_carta);
                }
            }
            // Saltar el turno del siguiente jugador
            $jugador_actual = ($siguiente_jugador + 1) % count($jugadores);
        } elseif ($numero === 'skip') {
            // Saltar el turno del siguiente jugador
            $jugador_actual = ($jugador_actual + 2) % count($jugadores);
        } elseif ($numero === 'reverse') {
            // Cambiar el sentido del juego
            $_SESSION['sentido'] = ($_SESSION['sentido'] === 'horario') ? 'antihorario' : 'horario';
            $jugador_actual = ($_SESSION['sentido'] === 'horario') 
                ? ($jugador_actual + 1) % count($jugadores)
                : ($jugador_actual - 1 + count($jugadores)) % count($jugadores);
        } else {
            // Avanzar al siguiente jugador según el sentido del juego
            $jugador_actual = ($_SESSION['sentido'] === 'horario') 
                ? ($jugador_actual + 1) % count($jugadores)
                : ($jugador_actual - 1 + count($jugadores)) % count($jugadores);
        }

        // Actualizar la sesión
        $_SESSION['baraja'] = serialize($baraja);
        $_SESSION['jugadores'] = serialize($jugadores);
        $_SESSION['jugador_actual'] = $jugador_actual;

    } else {
        $_SESSION['error'] = "Error: La carta jugada no es válida.";
        header("Location: index.php");
        exit;
    }
}

header("Location: index.php");
exit;
?>
