<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $description = $_POST['description'];
    $rating = (int)$_POST['rating'];

    // Manejo de la foto
    $photo_name = '';
    if (!empty($_FILES['photo']['name'])) {
        $upload_dir = '../uploads/testimonials/';
        if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);

        $file_name = time() . '_' . basename($_FILES['photo']['name']);
        $target_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
            $photo_name = $file_name;
        }
    }

    // Insertar en la BD
    $stmt = $mysqli->prepare("INSERT INTO TESTIMONIALS (photo, name, surname, description, rating) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $photo_name, $name, $surname, $description, $rating);

    if ($stmt->execute()) {
        header("Location: adminTestimonials.php");
        exit();
    } else {
        echo "Error al añadir testimonio: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Testimonio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Añadir Testimonio</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="surname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Valoración (1-5)</label>
            <select name="rating" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="1">1 estrella</option>
                <option value="2">2 estrellas</option>
                <option value="3">3 estrellas</option>
                <option value="4">4 estrellas</option>
                <option value="5">5 estrellas</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar Testimonio</button>
        <a href="adminTestimonials.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
