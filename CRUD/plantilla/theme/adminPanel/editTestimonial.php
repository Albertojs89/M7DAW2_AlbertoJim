<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

if (!isset($_GET['id'])) {
    header('Location: adminTestimonials.php');
    exit();
}

$id = (int)$_GET['id'];
$result = $mysqli->query("SELECT * FROM TESTIMONIALS WHERE id = $id");
$testimonial = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $description = $_POST['description'];
    $rating = (int)$_POST['rating'];

    // Imagen actual por defecto
    $photo_path = $testimonial['photo'];

    // Si se sube nueva imagen
    if (!empty($_FILES['photo']['name'])) {
        $upload_dir = '../uploads/testimonials/';
        if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);

        $file_name = time() . '_' . basename($_FILES['photo']['name']);
        $target_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
            $photo_path = 'uploads/testimonials/' . $file_name;
        }
    }

    // Actualizar datos en la BD
    $stmt = $mysqli->prepare("UPDATE TESTIMONIALS SET name=?, surname=?, description=?, rating=?, photo=? WHERE id=?");
    $stmt->bind_param("sssisi", $name, $surname, $description, $rating, $photo_path, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Testimonio actualizado correctamente.";
        header("Location: adminTestimonials.php");
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
    <title>Editar Testimonio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Editar Testimonio</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="<?= $testimonial['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="surname" class="form-control" value="<?= $testimonial['surname'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="4" required><?= $testimonial['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Valoración (1 a 5)</label>
        <input type="number" name="rating" class="form-control" min="1" max="5" value="<?= $testimonial['rating'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Imagen actual:</label><br>
        <img src="../../<?= $testimonial['photo'] ?>" width="100" class="mb-2">
        <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar Cambios</button>
    <a href="adminTestimonials.php" class="btn btn-secondary">Cancelar</a>
</form>
</body>
</html>
