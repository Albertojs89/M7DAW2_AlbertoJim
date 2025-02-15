<?php
session_start();
require_once 'baraja.class.php';
require_once 'jugador.class.php';

// Recuperar el estado actual del juego
$baraja = unserialize($_SESSION['baraja']);
$jugadores = unserialize($_SESSION['jugadores']);
$jugador_actual = $_SESSION['jugador_actual'];
$carta_en_mesa = unserialize($_SESSION['carta_en_mesa']);

// Verificar si se recibieron los datos de la carta
if (isset($_GET['color']) && isset($_GET['numero'])) {
    $color = $_GET['color'];
    $numero = $_GET['numero'];

    // Verificar si la carta es válida (mismo color o número que la carta en la mesa)
    if ($color === $carta_en_mesa->palo || $numero === $carta_en_mesa->numero) {
        // Buscar y eliminar la carta de la mano del jugador actual
        foreach ($jugadores[$jugador_actual]->mano as $key => $carta) {
            if ($carta->palo === $color && $carta->numero == $numero) {
                // Actualizar la carta en la mesa
                $_SESSION['carta_en_mesa'] = serialize($carta);

                // Eliminar la carta de la mano del jugador
                unset($jugadores[$jugador_actual]->mano[$key]);

                // Reindexar el array de la mano
                $jugadores[$jugador_actual]->mano = array_values($jugadores[$jugador_actual]->mano);
                break;
            }
        }

        // Actualizar la sesión con los nuevos datos
        $_SESSION['jugadores'] = serialize($jugadores);

        // Avanzar el turno
        if ($_SESSION['sentido'] === 'horario') {
            $_SESSION['jugador_actual'] = ($_SESSION['jugador_actual'] + 1) % count($jugadores);
        } else {
            $_SESSION['jugador_actual'] = ($_SESSION['jugador_actual'] - 1 + count($jugadores)) % count($jugadores);
        }

        // Redirigir de vuelta a index.php
        header("Location: index.php");
        exit;
    } else {
        // Si la carta no es válida
        echo "<h1>Error: Carta inválida. Debe coincidir el color o el número con la carta en la mesa.</h1>";
        echo "<a href='index.php'>Volver a la partida</a>";
        exit;
    }
} else {
    echo "<h1>Error: No se recibió ninguna carta válida.</h1>";
    echo "<a href='index.php'>Volver a la partida</a>";
    exit;
}
?>
