<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Obtener la noticia
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: adminNoticias.php?error=ID no válido');
    exit();
}

$id = intval($_GET['id']);
$stmt = $mysqli->prepare("SELECT * FROM noticias WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    header('Location: adminNoticias.php?error=Noticia no encontrada');
    exit();
}

$noticia = $resultado->fetch_assoc();
$stmt->close();

// Procesar formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $texto = trim($_POST['texto']);
    $imagenActual = $noticia['imagen'];
    
    // Verificar si se sube nueva imagen
    if (!empty($_FILES['imagen']['name'])) {
        $nombreImagen = basename($_FILES['imagen']['name']);
        $rutaDestino = '../images/' . $nombreImagen;
        $tipoArchivo = strtolower(pathinfo($rutaDestino, PATHINFO_EXTENSION));

        // Validaciones básicas
        $permitidos = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($tipoArchivo, $permitidos)) {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                $imagen = $nombreImagen;
            } else {
                $error = "Error al subir la nueva imagen.";
            }
        } else {
            $error = "Tipo de archivo no permitido. Usa JPG, PNG o GIF.";
        }
    } else {
        // Mantener imagen anterior si no se sube una nueva
        $imagen = $imagenActual;
    }

    if (!isset($error)) {
        $stmt = $mysqli->prepare("UPDATE noticias SET titulo=?, texto=?, imagen=? WHERE id=?");
        $stmt->bind_param("sssi", $titulo, $texto, $imagen, $id);
        if ($stmt->execute()) {
            header('Location: adminNoticias.php?mensaje=Noticia actualizada correctamente');
            exit();
        } else {
            $error = "Error al actualizar la noticia.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Noticia - BITEPIXE</title>
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
    }
    .form-card {
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 100%;
    }
    .form-card h2 {
      text-align: center;
      font-weight: 700;
      margin-bottom: 30px;
    }
    .alert {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="form-card">
  <h2>Editar Noticia</h2>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($noticia['titulo']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="texto" class="form-label">Texto</label>
      <textarea name="texto" id="texto" class="form-control" rows="5" required><?= htmlspecialchars($noticia['texto']) ?></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen actual:</label><br>
      <img src="../images/<?= htmlspecialchars($noticia['imagen']) ?>" alt="Imagen actual" style="max-width:100%; height:auto; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.2); margin-bottom:15px;">
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Cambiar imagen (opcional)</label>
      <input type="file" name="imagen" id="imagen" class="form-control">
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-dark">Guardar cambios</button>
      <a href="adminNoticias.php" class="btn btn-outline-secondary">← Volver</a>
    </div>
  </form>
</div>

</body>
</html>
