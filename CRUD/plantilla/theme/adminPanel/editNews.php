<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

if (!isset($_GET['id'])) {
    header('Location: adminNews.php');
    exit();
}

$id = (int)$_GET['id'];
$result = $mysqli->query("SELECT * FROM NEWS WHERE id = $id");
$news = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $new_date = $_POST['new_date'];

    // Subida nueva imagen (opcional)
    $thumbnail_path = $news['thumbnail'];
    if (!empty($_FILES['thumbnail']['name'])) {
        $upload_dir = '../../uploads/news/';
        if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);

        $file_name = time() . '_' . basename($_FILES['thumbnail']['name']);
        $target_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_path)) {
            $thumbnail_path = 'uploads/news/' . $file_name;
        }
    }

    // Actualización en BD (campos correctos)
    $stmt = $mysqli->prepare("UPDATE NEWS SET title=?, subtitle=?, description=?, thumbnail=?, new_date=? WHERE id=?");
    if (!$stmt) {
        die("Error al preparar consulta: " . $mysqli->error);
    }

    $stmt->bind_param("sssssi", $title, $subtitle, $description, $thumbnail_path, $new_date, $id);

    if ($stmt->execute()) {
        header('Location: adminNews.php');
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Editar Noticia</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control" value="<?= $news['title'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Subtítulo</label>
        <input type="text" name="subtitle" class="form-control" value="<?= $news['subtitle'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="4" required><?= $news['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha</label>
        <input type="date" name="new_date" class="form-control" value="<?= $news['new_date'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Imagen actual:</label><br>
        <img src="../../<?= $news['thumbnail'] ?>" width="150" class="mb-2">
        <input type="file" name="thumbnail" class="form-control">
    </div>
    <button type="submit" class="btn btn-warning">Guardar Cambios</button>
    <a href="adminNews.php" class="btn btn-secondary">Cancelar</a>
</form>
</body>
</html>
