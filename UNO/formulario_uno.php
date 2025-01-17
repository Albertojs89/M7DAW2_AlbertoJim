<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Guardar los datos del formulario en sesiones
    $_SESSION['numero_jugadores'] = $_POST['numero_jugadores'];
    $_SESSION['cartas_por_jugador'] = $_POST['cartas_por_jugador'];

    var_dump($_SESSION['numero_jugadores']);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Partida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Inicia la Partida</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="numero_jugadores" class="form-label">Número de jugadores:</label>
                <input type="number" class="form-control" id="numero_jugadores" name="numero_jugadores" min="2" max="10" required>
            </div>
            <div class="mb-3">
                <label for="cartas_por_jugador" class="form-label">Cartas por jugador:</label>
                <input type="number" class="form-control" id="cartas_por_jugador" name="cartas_por_jugador" min="1" max="15" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Comenzar</button>
            </div>
        </form>
    </div>
</body>
</html>
