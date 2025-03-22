<?php
session_start();
require_once '../config.php';

// Verificar si eres admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Obtener datos del análisis existente
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $mysqli->prepare("SELECT * FROM analisis WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $analisis = $resultado->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger text-center'>Análisis no encontrado. Serás redirigido...</div>";
        echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
        exit;
    }
    $stmt->close();
} else {
    echo "<div class='alert alert-danger text-center'>ID inválido. Serás redirigido...</div>";
    echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
    exit;
}

// Procesar actualización del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $subtitulo = trim($_POST['subtitulo']);
    $texto = trim($_POST['texto']);
    $nota = trim($_POST['nota']);
    $plataformasSeleccionadas = isset($_POST['plataforma']) ? $_POST['plataforma'] : [];
    $plataformas = implode(",", $plataformasSeleccionadas);

    if ($titulo && $subtitulo && $texto && $nota && $plataformas) {
        if (!empty($_FILES['imagen']['name'])) {
            $nombreImagen = basename($_FILES['imagen']['name']);
            $rutaDestino = "../images/analisis/" . $nombreImagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
        } else {
            $nombreImagen = $analisis['imagen']; // mantiene imagen anterior
        }

        $stmt = $mysqli->prepare("UPDATE analisis SET titulo=?, subtitulo=?, texto=?, nota=?, plataforma=?, imagen=? WHERE id=?");
        $stmt->bind_param("ssssssi", $titulo, $subtitulo, $texto, $nota, $plataformas, $nombreImagen, $id);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center'>Análisis actualizado correctamente. Redirigiendo...</div>";
            echo "<meta http-equiv='refresh' content='2;URL=adminAnalisis.php'>";
            exit;
        } else {
            $error = "Error al actualizar el análisis.";
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
  <title>Editar Análisis - BITEPIXE</title>
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
      max-width: 700px;
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
  <h2>Editar Análisis</h2>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($analisis['titulo']) ?>" required>
    </div>
    <div class="mb-3">
      <label for="subtitulo" class="form-label">Subtítulo</label>
      <input type="text" name="subtitulo" id="subtitulo" class="form-control" value="<?= htmlspecialchars($analisis['subtitulo']) ?>" required>
    </div>
    <div class="mb-3">
      <label for="texto" class="form-label">Texto / Contenido</label>
      <textarea name="texto" id="texto" class="form-control" rows="5" required><?= htmlspecialchars($analisis['texto']) ?></textarea>
    </div>
    <div class="mb-3">
      <label for="nota" class="form-label">Nota</label>
      <input type="text" name="nota" id="nota" class="form-control" value="<?= htmlspecialchars($analisis['nota']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Plataformas</label><br>
      <?php
        $plataformasGuardadas = explode(",", $analisis['plataforma']);
        $plataformasDisponibles = ['Xbox', 'PS5', 'PC', 'Switch'];
        foreach ($plataformasDisponibles as $plat):
      ?>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="plataforma[]" value="<?= $plat ?>" <?= in_array($plat, $plataformasGuardadas) ? 'checked' : '' ?>>
          <label class="form-check-label"><?= $plat ?></label>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="mb-3">
      <label for="imagen" class="form-label">Cambiar imagen (opcional)</label>
      <input type="file" name="imagen" id="imagen" class="form-control">
      <small class="form-text text-muted">Actualmente: <?= htmlspecialchars($analisis['imagen']) ?></small>
    </div>
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-dark">Guardar cambios</button>
      <a href="adminAnalisis.php" class="btn btn-outline-secondary">← Volver</a>
    </div>
  </form>
</div>
</body>
</html>
