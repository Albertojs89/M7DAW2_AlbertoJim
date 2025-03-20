<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

if (!isset($_GET['id'])) {
    $_SESSION['message'] = "ID de testimonio no proporcionado.";
    header('Location: adminTestimonials.php');
    exit();
}

$id = (int)$_GET['id'];

// Obtener la imagen para borrarla del servidor también
$result = $mysqli->query("SELECT photo FROM TESTIMONIALS WHERE id = $id");
$testimonial = $result->fetch_assoc();

if ($testimonial && !empty($testimonial['photo']) && file_exists("../../" . $testimonial['photo'])) {
    unlink("../../" . $testimonial['photo']);
}

// Eliminar de la base de datos
$delete = $mysqli->query("DELETE FROM TESTIMONIALS WHERE id = $id");

if ($delete) {
    $_SESSION['message'] = "Testimonio eliminado correctamente.";
} else {
    $_SESSION['message'] = "Error al eliminar el testimonio.";
}

header('Location: adminTestimonials.php');
exit();
