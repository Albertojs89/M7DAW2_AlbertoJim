<?php
session_start();
require_once '../config.php';

// Verificar si el usuario es admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Procesar formulario
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $texto = trim($_POST['texto']);
    $imagen = trim($_POST['imagen']); // nombre del archivo de imagen
    $fecha = date('Y-m-d');
    $id_usuario = $_SESSION['user_id'];

    if (!empty($titulo) && !empty($texto) && !empty($imagen)) {
        $stmt = $mysqli->prepare("INSERT INTO noticias (titulo, texto, imagen, fecha, id_usuario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $titulo, $texto, $imagen, $fecha, $id_usuario);
        
        if ($stmt->execute()) {
            $mensaje = "✅ Noticia añadida correctamente.";
        } else {
            $mensaje = "❌ Error al añadir la noticia.";
        }
        $stmt->close();
    } else {
        $mensaje = "⚠ Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Urbanist', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .form-container {
            background-color: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            max-width: 700px;
            width: 100%;
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-submit {
            font-weight: 600;
            border-radius: 12px;
        }

        .message {
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">Añadir Nueva Noticia</h1>

        <?php if ($mensaje): ?>
            <div class="message alert alert-info"> <?= htmlspecialchars($mensaje) ?> </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

            <div class="mb-3">
                <label for="texto" class="form-label">Texto</label>
                <textarea class="form-control" id="texto" name="texto" rows="6" required></textarea>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Nombre de la Imagen (ej: zelda.jpg)</label>
                <input type="text" class="form-control" id="imagen" name="imagen" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark btn-submit">Guardar Noticia</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="adminNoticias.php" class="btn btn-outline-secondary">← Volver al Panel de Noticias</a>
        </div>
    </div>
</body>
</html>