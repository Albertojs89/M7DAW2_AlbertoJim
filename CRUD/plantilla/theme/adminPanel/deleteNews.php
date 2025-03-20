<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

// Verificar si hay un ID válido por GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: adminNews.php');
    exit();
}

$id = (int)$_GET['id'];

// Obtener la ruta de la imagen para eliminarla del servidor
$query = $mysqli->query("SELECT thumbnail FROM NEWS WHERE id = $id");
$news = $query->fetch_assoc();

if ($news && !empty($news['thumbnail']) && file_exists('../../' . $news['thumbnail'])) {
    unlink('../../' . $news['thumbnail']); // Elimina el archivo del servidor
}

// Eliminar la noticia de la base de datos
$delete = $mysqli->prepare("DELETE FROM NEWS WHERE id = ?");
$delete->bind_param("i", $id);

if ($delete->execute()) {
    $_SESSION['message'] = "Noticia eliminada correctamente.";
} else {
    $_SESSION['message'] = "Error al eliminar la noticia.";
}

header('Location: adminNews.php');
exit();
