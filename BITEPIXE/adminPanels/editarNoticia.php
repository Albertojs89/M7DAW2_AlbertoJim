<?php
session_start();
require_once '../config.php';

// Verificación de admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Validar ID recibido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: adminNoticias.php");
    exit();
}

$id = intval($_GET['id']);

// Obtener datos actuales
$stmt = $mysqli->prepare("SELECT * FROM noticias WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$noticia = $resultado->fetch_assoc();

if (!$noticia) {
    echo "Noticia no encontrada.";
    exit();
}

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $imagen = $_POST['imagen'];

    $stmt = $mysqli->prepare("UPDATE noticias SET titulo = ?, texto = ?, imagen = ? WHERE id = ?");
    $stmt->bind_param("sssi", $titulo, $texto, $imagen, $id);

    if ($stmt->execute()) {
        $mensaje = "✅ Noticia actualizada correctamente.";
    } else {
        $error = "❌ Error al actualizar.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Noticia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      padding: 50px 20px;
      font-family: 'Rubik', sans-serif;
    }
    .form-container {
      max-width: 700px;
      background-color: white;
      margin: auto;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    }
    .form-title {
      text-align: center;
      font-weight: 600;
      margin-bottom: 30px;
    }
    .btn-back {
      display: inline-block;
      margin-top: 20px;
      background-color: #2c2c2c;
      color: white;
      padding: 10px 20px;
      border-radius: 10px;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2 class="form-title">Editar Noticia</h2>

    <?php if (isset($mensaje)) echo "<div class='alert alert-success'>$mensaje</div>"; ?>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" value="<?= htmlspecialchars($noticia['titulo']) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Texto</label>
        <textarea class="form-control" name="texto" rows="6" required><?= htmlspecialchars($noticia['texto']) ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Nombre del archivo de imagen</label>
        <input type="text" class="form-control" name="imagen" value="<?= htmlspecialchars($noticia['imagen']) ?>" required>
      </div>

      <button type="submit" class="btn btn-success">Actualizar Noticia</button>
      <a href="adminNoticias.php" class="btn-back">← Volver</a>
    </form>
  </div>

</body>
</html>
