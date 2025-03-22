<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminar Memory Card - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .alert {
      max-width: 600px;
      font-size: 1.1rem;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>

<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $mysqli->prepare("DELETE FROM MEMORY_CARD WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center shadow'>✅ Memory Card eliminada correctamente. <br><small>Serás redirigido en unos segundos...</small></div>";
        echo "<meta http-equiv='refresh' content='2;URL=adminMemory.php'>";
    } else {
        echo "<div class='alert alert-danger text-center shadow'>❌ Error al eliminar la Memory Card.<br><small>Redirigiendo...</small></div>";
        echo "<meta http-equiv='refresh' content='2;URL=adminMemory.php'>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-warning text-center shadow'>⚠ ID no válido. <br><small>Redirigiendo a la página de administración...</small></div>";
    echo "<meta http-equiv='refresh' content='2;URL=adminMemory.php'>";
}
?>

</body>
</html>
