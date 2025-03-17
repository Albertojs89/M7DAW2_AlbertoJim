<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Eliminar la memory card
    $stmt = $mysqli->prepare("DELETE FROM MEMORY_CARD WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: adminMemory.php?mensaje=Memory Card eliminada correctamente');
        exit();
    } else {
        header('Location: adminMemory.php?error=Error al eliminar la Memory Card');
        exit();
    }

    $stmt->close();
} else {
    header('Location: adminMemory.php?error=ID no válido');
    exit();
}
?>
