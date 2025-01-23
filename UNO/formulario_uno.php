<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario UNO</title>
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a estilos personalizados -->
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">UNO</h1>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="num_jugadores" class="form-label">Número de jugadores (1-5):</label>
                <input type="number" id="num_jugadores" name="num_jugadores" class="form-control" min="1" max="5" required>
            </div>

            <div class="mb-3">
                <label for="num_cartas" class="form-label">Número de cartas por jugador:</label>
                <input type="number" id="num_cartas" name="num_cartas" class="form-control" min="1" max="7" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Iniciar partida</button>
        </form>
        <div class="mt-5">
            <a href="index.php" class="btn btn-primary">Ir a inicio</a>
        </div>
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>