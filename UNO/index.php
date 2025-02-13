<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego UNO</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
require_once 'baraja.class.php';
require_once 'jugador.class.php';

// Verificar si la partida ya está en curso
if (isset($_SESSION['baraja']) && isset($_SESSION['jugadores'])) {
    // Deserializar la baraja y los jugadores
    $baraja = unserialize($_SESSION['baraja']);
    $jugadores = unserialize($_SESSION['jugadores']);
    $jugador_actual = $_SESSION['jugador_actual'];

    // Mostrar el estado actual del juego
    echo "<h1>Estado Actual del Juego</h1>";
    foreach ($jugadores as $jugador) {
        echo "<h2>Jugador {$jugador->id}</h2>";
        echo $jugador->mostrar_mano();
    }

    // Mostrar la carta inicial sobre la mesa
    echo "<h2>Carta actual sobre la mesa:</h2>";
    echo "<div style='margin-bottom: 20px;'>";
    echo $baraja->conjunto_cartas[0]->pinta_carta(); // Mostrar la carta inicial sobre la mesa
    echo "</div>";

    // Mostrar el mazo de robo (cartas giradas)
    $cartas_restantes = count($baraja->conjunto_cartas) - 1; // Restamos la carta en la mesa
    echo "<h2>Mazo para robar:</h2>";
    echo "<div style='margin-bottom: 20px;'>";
    echo "<a href='robar.php' id='mazo-robo' style='text-decoration: none;'>";
    echo "<img src='images/carta_girada.png' alt='Mazo girado' />";
    echo "</a>";
    echo "<p>Cartas restantes: $cartas_restantes</p>";
    echo "</div>";

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar si se recibieron los datos del formulario
    if (isset($_POST['num_jugadores']) && is_numeric($_POST['num_jugadores'])) {
        $num_jugadores = (int)$_POST['num_jugadores'];
    } else {
        echo "<h1>Error: Número de jugadores inválido.</h1>"; return;
    }

    if (isset($_POST['num_cartas']) && is_numeric($_POST['num_cartas'])) {
        $num_cartas = (int)$_POST['num_cartas'];
    } else {
        echo "<h1>Error: Número de cartas inválido.</h1>"; return;
    }

    // Validar el rango de los datos
    if ($num_jugadores < 1 || $num_jugadores > 5 || $num_cartas < 1 || $num_cartas > 7) {
        echo "<h1>Error: Datos fuera de rango.</h1>"; return;
    }

    // Crear y mezclar la baraja
    $baraja = new Baraja();
    $baraja->crea_baraja();
    $baraja->mezcla();

    // Inicializar jugadores y repartir cartas
    $jugadores = [];
    for ($i = 1; $i <= $num_jugadores; $i++) {
        $jugador = new Jugador($i);
        for ($j = 0; $j < $num_cartas; $j++) {
            $carta = array_shift($baraja->conjunto_cartas);
            $jugador->añadir_carta($carta);
        }
        $jugadores[] = $jugador;
    }

    // Guardar el estado inicial del juego en la sesión
    $_SESSION['baraja'] = serialize($baraja);
    $_SESSION['jugadores'] = serialize($jugadores);
    $_SESSION['jugador_actual'] = 0;

    // Redirigir para evitar reenvío de formulario
    header("Location: index.php");
    exit;
} else {
    echo "<h1>Error: No se recibieron datos del formulario.</h1>";
}
?>
<!-- Botón de cerrar sesión -->
<div style="margin-top: 20px;">
    <a href="logout.php" style="text-decoration: none; padding: 10px 20px; background-color: #f44336; color: white; border-radius: 5px;">Cerrar Sesión</a>
</div>
</body>
</html>

