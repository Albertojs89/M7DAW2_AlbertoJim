<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Verificar si se recibe ID válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: adminMemory.php?error=ID no válido');
    exit();
}

$id = intval($_GET['id']);

// Obtener los datos actuales
$stmt = $mysqli->prepare("SELECT * FROM MEMORY_CARD WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    header('Location: adminMemory.php?error=Memory Card no encontrada');
    exit();
}

$memory = $resultado->fetch_assoc();

// Procesar formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $texto = trim($_POST['texto']);
    $imagen = trim($_POST['imagen']);

    if ($titulo && $texto && $imagen) {
        $stmt = $mysqli->prepare("UPDATE MEMORY_CARD SET titulo = ?, texto = ?, imagen = ? WHERE id = ?");
        $stmt->bind_param("sssi", $titulo, $texto, $imagen, $id);
        if ($stmt->execute()) {
            header('Location: adminMemory.php?mensaje=Memory Card actualizada correctamente');
            exit();
        } else {
            $error = "Error al actualizar la Memory Card.";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Memory Card - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Rubik', sans-serif;
      min-height: 100vh;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .form-card {
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
    }

    .form-card h2 {
      text-align: center;
      font-weight: 700;
      margin-bottom: 30px;
    }

    .btn-dark {
      font-weight: 600;
      border-radius: 10px;
    }

    .alert {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<div class="form-card">
  <h2>✏ Editar Memory Card</h2>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"> <?= htmlspecialchars($error) ?> </div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($memory['titulo']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="texto" class="form-label">Texto</label>
      <textarea name="texto" id="texto" class="form-control" rows="4" required><?= htmlspecialchars($memory['texto']) ?></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Nombre de imagen</label>
      <input type="text" name="imagen" id="imagen" class="form-control" value="<?= htmlspecialchars($memory['imagen']) ?>" required>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-dark">Guardar Cambios</button>
      <a href="adminMemory.php" class="btn btn-outline-secondary">← Volver</a>
    </div>
  </form>
</div>
</body>
</html>
