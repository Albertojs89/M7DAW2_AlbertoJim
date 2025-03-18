<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

// Crear carpeta si no existe
$uploadDir = '../uploads/thumbnails/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $url = $_POST['url'];

  // Subida del thumbnail
  $thumbnailPath = '';
  if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === 0) {
    $fileTmp = $_FILES['thumbnail']['tmp_name'];
    $fileName = time() . '_' . basename($_FILES['thumbnail']['name']);
    $destPath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmp, $destPath)) {
      $thumbnailPath = 'uploads/thumbnails/' . $fileName;
    } else {
      $_SESSION['message'] = 'Error al subir la imagen.';
      header('Location: adminProjects.php');
      exit;
    }
  }

  // Insertar en BD
  $stmt = $mysqli->prepare("INSERT INTO PROJECTS (title, thumbnail, url, description) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $title, $thumbnailPath, $url, $description);

  if ($stmt->execute()) {
    $_SESSION['message'] = "Proyecto añadido correctamente";
    header('Location: adminProjects.php');
    exit;
  } else {
    $_SESSION['message'] = "Error al añadir proyecto: " . $stmt->error;
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Proyecto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="container mt-5">
  <h2 class="mb-4 text-center">Añadir Nuevo Proyecto</h2>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" class="form-control" name="title" required>
    </div>
    <div class="mb-3">
      <label for="url" class="form-label">URL</label>
      <input type="text" class="form-control" name="url" required>
    </div>
    <div class="mb-3">
      <label for="thumbnail" class="form-label">Subir imagen (thumbnail)</label>
      <input type="file" class="form-control" name="thumbnail" accept="image/*" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descripción</label>
      <textarea class="form-control" name="description" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Añadir Proyecto</button>
    <a href="adminProjects.php" class="btn btn-secondary">Cancelar</a>
  </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
