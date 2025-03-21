<?php
session_start();
require_once '../config.php';

// Verificar si es admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Verificar si llega un ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: adminNoticias.php?error=ID inválido");
    exit();
}

$id = intval($_GET['id']);

// Eliminar la noticia
$stmt = $mysqli->prepare("DELETE FROM noticias WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: adminNoticias.php?mensaje=Noticia eliminada correctamente");
} else {
    header("Location: adminNoticias.php?error=Error al eliminar");
}
exit();
?>
