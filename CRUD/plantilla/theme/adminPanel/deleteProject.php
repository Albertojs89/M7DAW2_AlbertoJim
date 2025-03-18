<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

// Validar ID recibido por GET
if (!isset($_GET['id'])) {
    $_SESSION['message'] = "ID de proyecto no especificado";
    header('Location: adminProjects.php');
    exit;
}

$id = (int) $_GET['id'];

// Puedes obtener el thumbnail si luego quieres eliminar el archivo físico
$project = $mysqli->query("SELECT * FROM PROJECTS WHERE id = $id")->fetch_assoc();
$thumbnailPath = '../' . $project['thumbnail']; // Ruta relativa completa

// Eliminar proyecto de la base de datos
$stmt = $mysqli->prepare("DELETE FROM PROJECTS WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Opcional: eliminar la imagen física del servidor
    if (file_exists($thumbnailPath)) {
        unlink($thumbnailPath);
    }

    $_SESSION['message'] = "Proyecto eliminado correctamente";
} else {
    $_SESSION['message'] = "Error al eliminar el proyecto";
}

header('Location: adminProjects.php');
exit;
?>
