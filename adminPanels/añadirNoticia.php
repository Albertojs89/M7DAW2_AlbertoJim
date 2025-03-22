<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Procesar envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $texto = trim($_POST['texto']);
    
    // Manejo del archivo de imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = basename($_FILES['imagen']['name']);
        $rutaDestino = '../images/' . $nombreImagen;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $stmt = $mysqli->prepare("INSERT INTO noticias (titulo, texto, imagen, fecha, id_usuario) VALUES (?, ?, ?, NOW(), ?)");
            $idUsuario = $_SESSION['user_id'];
            $stmt->bind_param("sssi", $titulo, $texto, $nombreImagen, $idUsuario);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success text-center'>Noticia añadida correctamente. Serás redirigido en unos segundos...</div>";
                echo "<meta http-equiv='refresh' content='2;URL=adminNoticias.php'>";
                exit;
            } else {
                $error = "Error al guardar la noticia.";
            }
        } else {
            $error = "Error al mover el archivo subido.";
        }
    } else {
        $error = "Error en la subida de la imagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Añadir Noticia - BITEPIXE</title>
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
      max-width: 600px;
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
  <h2>Añadir Noticia</h2>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" name="titulo" id="titulo" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="texto" class="form-label">Texto / Descripción</label>
      <textarea name="texto" id="texto" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen (archivo JPG/PNG)</label>
      <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" required>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-dark">Guardar</button>
      <a href="adminNoticias.php" class="btn btn-outline-secondary">← Volver</a>
    </div>
  </form>
</div>

</body>
</html>