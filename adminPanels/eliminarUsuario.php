<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Comprobar si hay ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Protección extra: evitar que el admin se elimine a sí mismo
    if ($_SESSION['user_id'] == $id) {
        header('Location: adminUsuarios.php?error=No puedes eliminar tu propio usuario.');
        exit();
    }

    // Eliminar usuario
    $stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: adminUsuarios.php?mensaje=Usuario eliminado correctamente');
        exit();
    } else {
        header('Location: adminUsuarios.php?error=Error al eliminar usuario');
        exit();
    }

    $stmt->close();
} else {
    header('Location: adminUsuarios.php?error=ID no válido');
    exit();
}
