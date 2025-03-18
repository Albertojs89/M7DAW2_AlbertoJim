<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

// Validar ID
if (!isset($_GET['id'])) {
    header('Location: adminProjects.php');
    exit;
}
$id = (int)$_GET['id'];

// Obtener proyecto actual
$result = $mysqli->query("SELECT * FROM PROJECTS WHERE id = $id");
$project = $result->fetch_assoc();

if (!$project) {
    $_SESSION['message'] = "Proyecto no encontrado";
    header('Location: adminProjects.php');
    exit;
}

// Si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];

    $thumbnailPath = $project['thumbnail']; // por defecto se mantiene

    // Si se sube nueva imagen
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === 0) {
        $uploadDir = '../uploads/thumbnails/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmp = $_FILES['thumbnail']['tmp_name'];
        $fileName = time() . '_' . basename($_FILES['thumbnail']['name']);
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmp, $destPath)) {
            $thumbnailPath = 'uploads/thumbnails/' . $fileName;
        } else {
            $_SESSION['message'] = "Error al subir nueva imagen";
            header('Location: adminProjects.php');
            exit;
        }
    }

    // Actualizar en BD
    $stmt = $mysqli->prepare("UPDATE PROJECTS SET title=?, thumbnail=?, url=?, description=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $thumbnailPath, $url, $description, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Proyecto actualizado correctamente";
        header('Location: adminProjects.php');
        exit;
    } else {
        $_SESSION['message'] = "Error al actualizar proyecto: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Proyecto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="container mt-5">
  <h2 class="mb-4 text-center">Editar Proyecto</h2>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Título</label>
      <input type="text" class="form-control" name="title" value="<?= $project['title'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">URL</label>
      <input type="text" class="form-control" name="url" value="<?= $project['url'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Imagen actual</label><br>
      <img src="../<?= $project['thumbnail'] ?>" width="150" alt="thumb">
    </div>
    <div class="mb-3">
      <label class="form-label">Cambiar Thumbnail (opcional)</label>
      <input type="file" class="form-control" name="thumbnail" accept="image/*">
    </div>
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea class="form-control" name="description" rows="4" required><?= $project['description'] ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="adminProjects.php" class="btn btn-secondary">Cancelar</a>
  </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
