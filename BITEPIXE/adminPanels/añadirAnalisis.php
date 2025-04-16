<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $subtitulo = trim($_POST['subtitulo']);
    $texto = trim($_POST['texto']);
    $nota = floatval($_POST['nota']);
    $fecha = date('Y-m-d');
    $plataforma = implode(",", $_POST['plataforma']);
    $imagen = '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        $nombreImagen = basename($_FILES['imagen']['name']);
        $rutaDestino = '../images/' . $nombreImagen;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $imagen = $nombreImagen;
        } else {
            $error = "Error al subir la imagen.";
        }
    }

    if ($titulo && $subtitulo && $texto && $nota && $imagen && $plataforma) {
        $stmt = $mysqli->prepare("INSERT INTO analisis (titulo, subtitulo, texto, nota, fecha, imagen, plataforma) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $titulo, $subtitulo, $texto, $nota, $fecha, $imagen, $plataforma);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center'>Análisis añadido correctamente. Serás redirigido en unos segundos...</div>";
            echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
            exit;
        } else {
            $error = "Error al guardar el análisis.";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Análisis - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      min-height: 100vh;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }
    .form-card {
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 700px;
      width: 100%;
    }
    .form-card h2 {
      text-align: center;
      font-weight: 700;
      margin-bottom: 30px;
    }
    .btn-dark {
      font-weight: 600;
      border-radius: 10px;
    }
    .alert {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="form-card">
  <h2>Añadir Análisis</h2>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" name="titulo" id="titulo" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="subtitulo" class="form-label">Subtítulo</label>
      <input type="text" name="subtitulo" id="subtitulo" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="texto" class="form-label">Texto del análisis</label>
      <textarea name="texto" id="texto" class="form-control" rows="5" required></textarea>
    </div>

    <div class="mb-3">
      <label for="nota" class="form-label">Nota (puntuación)</label>
      <input type="number" name="nota" id="nota" class="form-control" min="0" max="10" step="0.1" required>
    </div>

    <div class="mb-3">
      <label for="plataforma" class="form-label">Plataforma (puedes seleccionar varias con Ctrl o Cmd)</label>
      <select name="plataforma[]" id="plataforma" class="form-control" multiple required>
        <option value="PC">PC</option>
        <option value="PS5">PS5</option>
        <option value="Xbox">Xbox</option>
        <option value="Switch">Switch</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen del análisis (sube archivo)</label>
      <input type="file" name="imagen" id="imagen" class="form-control" required>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-dark">Guardar</button>
      <a href="adminAnalisis.php" class="btn btn-outline-secondary">← Volver</a>
    </div>
  </form>
</div>

</body>
</html>
