<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
  header('Location: ../index.php');
  exit();
}

// Obtener todos los comentarios
$consulta = $mysqli->query("SELECT sp.*, u.nombre AS nombre_usuario FROM savepost sp LEFT JOIN usuarios u ON sp.user_id = u.id ORDER BY sp.fecha DESC");
$posts = $consulta ? $consulta->fetch_all(MYSQLI_ASSOC) : [];

// Procesar respuesta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['respuesta'], $_POST['post_id'])) {
  $respuesta = trim($_POST['respuesta']);
  $post_id = intval($_POST['post_id']);

  $stmt = $mysqli->prepare("UPDATE savepost SET respuesta_admin = ? WHERE id = ?");
  $stmt->bind_param("si", $respuesta, $post_id);
  $stmt->execute();
  header("Location: adminSavePost.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Save Post - Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <style>
    body {
      padding: 40px;
      font-family: 'Rubik', sans-serif;
      background-color: #f9f9f9;
    }
    .card {
      margin-bottom: 20px;
    }
    textarea {
      resize: vertical;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="mb-4">Responder a comentarios (Save Post)</h2>

    <?php foreach ($posts as $post): ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($post['titulo']) ?></h5>
          <p class="card-text"><?= nl2br(htmlspecialchars($post['texto'])) ?></p>
          <p class="text-muted small">
            De: <?= $post['user_id'] ? htmlspecialchars($post['nombre_usuario']) : 'Anónimo' ?> · <?= date("d/m/Y H:i", strtotime($post['fecha'])) ?>
          </p>

          <?php if (!empty($post['imagen'])): ?>
            <img src="../images/savepost/<?= htmlspecialchars($post['imagen']) ?>" alt="Imagen subida" style="max-width: 100%; height: auto; border-radius: 6px;">
          <?php endif; ?>

          <form method="POST" class="mt-3">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <div class="mb-2">
              <label class="form-label">Respuesta del admin:</label>
              <textarea name="respuesta" class="form-control" rows="2" required><?= htmlspecialchars($post['respuesta_admin'] ?? '') ?></textarea>
            </div>
            <button type="submit" class="btn btn-dark btn-sm">Responder</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>

    <a href="../admin.php" class="btn btn-outline-secondary mt-4">← Volver al panel principal</a>
  </div>
</body>
</html>
