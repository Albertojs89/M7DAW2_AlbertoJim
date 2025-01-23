<?php
session_start();
require_once 'baraja.class.php';
require_once 'jugador.class.php';

// Recuperar el estado actual del juego desde la sesión
$baraja = $_SESSION['baraja']; // Mazo restante
$jugador_actual = $_SESSION['jugador_actual']; // Jugador en turno
$jugadores = $_SESSION['jugadores']; // Lista de jugadores

// Verificar si hay cartas en el mazo
if (!empty($baraja->conjunto_cartas)) {
    // Sacar una carta del mazo
    $nueva_carta = array_shift($baraja->conjunto_cartas);
    
    // Añadir la carta a la mano del jugador actual
    $jugadores[$jugador_actual]->añadir_carta($nueva_carta);
    
    // Actualizar la sesión con los nuevos datos
    $_SESSION['baraja'] = $baraja;
    $_SESSION['jugadores'] = $jugadores;
} else {
    // Si el mazo está vacío
    echo "<h1>El mazo está vacío, no se puede robar más cartas.</h1>";
    exit;
}

// Redirigir de vuelta al tablero principal
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