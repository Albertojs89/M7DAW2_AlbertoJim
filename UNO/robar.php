<?php
session_start();
require_once 'baraja.class.php';
require_once 'jugador.class.php';

// Recuperar el estado actual del juego desde la sesión
$baraja = unserialize($_SESSION['baraja']);
$jugador_actual = $_SESSION['jugador_actual'];
$jugadores = unserialize($_SESSION['jugadores']);

// Verificar si hay cartas en el mazo
if (count($baraja->conjunto_cartas) > 0) {
    // Sacar una carta del mazo
    $nueva_carta = array_shift($baraja->conjunto_cartas);
    
   // Añadir la carta a la mano del jugador actual
$jugadores[$jugador_actual]->añadir_carta($nueva_carta);

// Detectar si la carta es reverse y cambiar el orden del turno
if ($nueva_carta->numero === 'reverse') {
    $_SESSION['sentido'] = ($_SESSION['sentido'] === 'horario') ? 'antihorario' : 'horario';
}

// Actualizar el turno según el sentido del juego
if ($_SESSION['sentido'] === 'horario') {
    $jugador_actual = ($jugador_actual + 1) % count($jugadores);
} else {
    $jugador_actual = ($jugador_actual - 1 + count($jugadores)) % count($jugadores);
}

    
    // Actualizar la sesión con los nuevos datos
    $_SESSION['baraja'] = serialize($baraja);
    $_SESSION['jugadores'] = serialize($jugadores);
    $_SESSION['jugador_actual'] = $jugador_actual;
} else {
    // Si el mazo está vacío
    echo "<h1>El mazo está vacío, no se puede robar más cartas.</h1>";
    exit;
}

// Redirigir de vuelta a index.php
header("Location: index.php");
exit;

?>
<!-- 
 EXPLICACION----------------------------------------------------------------
 ¿Qué logramos con cada dato guardado en la sesión?
$_SESSION['baraja']:

Contiene el objeto de la clase Baraja, que incluye:
Todas las cartas restantes en el mazo (conjunto_cartas).
Métodos para mezclar o manipular las cartas en el futuro.
Al guardar baraja en la sesión, podemos reutilizarla en diferentes archivos o solicitudes sin perder las cartas restantes.
Ejemplo práctico: Cuando alguien roba una carta, array_shift($baraja->conjunto_cartas) se aplicará sobre la misma instancia de baraja, preservando el estado del mazo.


El uso de sesiones nos permite:

Mantener el estado del juego:

Almacenar información como el mazo restante, los jugadores, y el turno actual entre diferentes solicitudes.
Interactividad dinámica:

Permitir que acciones como "robar una carta" o "jugar una carta" afecten directamente al estado del juego sin perder datos.
Simplificar el desarrollo:

En lugar de pasar constantemente datos entre formularios o URLs, los datos del juego persisten en la sesión hasta que termine la partida.
-->