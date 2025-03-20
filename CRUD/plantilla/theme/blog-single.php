<?php
session_start();
require_once '../theme/comicsSoons/config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: blog.php");
    exit();
}

$id = (int)$_GET['id'];
$stmt = $mysqli->prepare("SELECT * FROM NEWS WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$news = $result->fetch_assoc();

if (!$news) {
    echo "<h2>Noticia no encontrada.</h2>";
    exit();
}

// Obtener comentarios de la noticia
$stmtComentarios = $mysqli->prepare("SELECT COMMENTS.description, COMMENTS.date, USERS.name 
                                     FROM COMMENTS 
                                     INNER JOIN USERS ON COMMENTS.user_id = USERS.id 
                                     WHERE COMMENTS.new_id = ? 
                                     ORDER BY COMMENTS.date DESC");
$stmtComentarios->bind_param("i", $id);
$stmtComentarios->execute();
$comentarios = $stmtComentarios->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($news['title']) ?></title>
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
</head>
<body>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2 class="mb-3"><?= htmlspecialchars($news['title']) ?></h2>
          <h5 class="text-muted mb-4"><?= htmlspecialchars($news['subtitle']) ?></h5>
          <img src="/<?= $news['thumbnail'] ?>" alt="imagen-noticia" class="img-fluid mb-4">
          <p><strong>Fecha:</strong> <?= $news['new_date'] ?></p>
          <p><?= nl2br(htmlspecialchars($news['description'])) ?></p>
          <a href="blog.php" class="btn btn-secondary mt-3">Volver a todas las noticias</a>
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN DE COMENTARIOS -->
  <section class="section bg-light mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h3 class="mb-4">Comentarios</h3>

          <?php if (isset($_SESSION['user_id'])): ?>
            <form action="procesar_comentario.php" method="POST" class="mb-5">
              <input type="hidden" name="new_id" value="<?= $id ?>">
              <div class="form-group">
                <textarea name="description" class="form-control" rows="3" placeholder="Escribe tu comentario..." required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Enviar comentario</button>
            </form>
          <?php else: ?>
            <p class="text-muted">Inicia sesión para dejar un comentario.</p>
          <?php endif; ?>

          <!-- Lista de comentarios -->
          <?php foreach ($comentarios as $comentario): ?>
            <div class="mb-4 p-3 border rounded bg-white">
              <strong><i class="fas fa-user"></i> <?= htmlspecialchars($comentario['name']) ?></strong>
              <small class="text-muted"> | <?= date("d/m/Y", strtotime($comentario['date'])) ?></small>
              <p class="mt-2"><?= nl2br(htmlspecialchars($comentario['description'])) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
