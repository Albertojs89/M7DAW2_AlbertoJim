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

    // Obtener nombre de la imagen actual para posible limpieza (opcional)
    $stmt = $mysqli->prepare("SELECT imagen FROM analisis WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $analisis = $resultado->fetch_assoc();
        $imagenActual = $analisis['imagen'];

        // Eliminar el análisis
        $stmt = $mysqli->prepare("DELETE FROM analisis WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Si lo deseas puedes eliminar la imagen del servidor aquí:
            // if (file_exists("../images/analisis/" . $imagenActual)) unlink("../images/analisis/" . $imagenActual);
            echo "<div class='alert alert-success text-center'>Análisis eliminado correctamente. Redirigiendo...</div>";
            echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
            exit;
        } else {
            echo "<div class='alert alert-danger text-center'>Error al eliminar el análisis. Redirigiendo...</div>";
            echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
            exit;
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Análisis no encontrado. Redirigiendo...</div>";
        echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger text-center'>ID no válido. Redirigiendo...</div>";
    echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
    exit();
}
?>
