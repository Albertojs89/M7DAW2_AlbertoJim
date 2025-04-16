<?php
session_start();
require_once 'config.php';

$mensaje = '';

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = trim($_POST['titulo']);
  $texto = trim($_POST['texto']);
  $nombre_anonimo = $_SESSION['nombre'] ?? 'Anónimo';
  $avatar_anonimo = $_SESSION['avatar'] ?? 'https://toppng.com/uploads/preview/vector-goomba-super-mario-bros-goomba-sprite-11563054676w6lknv0fmv.png';
  $user_id = $_SESSION['user_id'] ?? null;
  $nombre_archivo = null;

  // Manejar imagen
  if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    $permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($ext, $permitidas)) {
      $nombre_archivo = uniqid('save_', true) . "." . $ext;
      $destino = __DIR__ . '/images/savepost/' . $nombre_archivo;
      move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    }
  }

  // Insertar en BD
  $stmt = $mysqli->prepare("INSERT INTO savepost (titulo, texto, imagen, user_id, nombre_anonimo, avatar_anonimo, fecha) VALUES (?, ?, ?, ?, ?, ?, NOW())");
  $stmt->bind_param("sssiss", $titulo, $texto, $nombre_archivo, $user_id, $nombre_anonimo, $avatar_anonimo);
  if ($stmt->execute()) {
    $mensaje = "<div class='alert alert-success'>Mensaje publicado correctamente 🎉</div>";
  } else {
    $mensaje = "<div class='alert alert-danger'>Error al publicar.</div>";
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Save Post - BITEPIXE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Estilos globales -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/css/index.css">

  <!-- Fuentes e iconos -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light">
  <?php include 'header.php'; ?>

  <div class="container mt-5">
    <h2 class="mb-4">Crea tu mensaje 📍</h2>

    <?= $mensaje ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Consulta o Título</label>
        <input type="text" name="titulo" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Texto</label>
        <textarea name="texto" class="form-control" rows="4" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Subir una imagen (opcional)</label>
        <input type="file" name="imagen" class="form-control" accept="image/*">
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-warning fw-bold">Publicar</button>
        <a href="savepost.php" class="btn btn-secondary mt-2">Volver</a>
      </div>
    </form>
  </div>
</body>
</html>
