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
  <?php include 'header.php'; ?>

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

  <!-- Comentarios -->
  <section class="section bg-light mt-5">
    <div class="container">
      <h3 class="mb-4">Comentarios</h3>

      <?php
      // Mostrar comentarios principales
      $stmt = $mysqli->prepare("SELECT COMMENTS.*, USERS.name FROM COMMENTS 
                                JOIN USERS ON COMMENTS.user_id = USERS.id 
                                WHERE new_id = ? AND comment_id IS NULL 
                                ORDER BY date DESC");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($comment = $result->fetch_assoc()) {
          echo '<div class="mb-4 border rounded p-3 bg-white">';
          echo '<strong>' . htmlspecialchars($comment['name']) . '</strong> ';
          echo '<small class="text-muted">(' . $comment['date'] . ')</small>';
          echo '<p>' . nl2br(htmlspecialchars($comment['description'])) . '</p>';

          // Respuestas
          $reply_stmt = $mysqli->prepare("SELECT COMMENTS.*, USERS.name FROM COMMENTS 
                                          JOIN USERS ON COMMENTS.user_id = USERS.id 
                                          WHERE comment_id = ? ORDER BY date ASC");
          $reply_stmt->bind_param("i", $comment['id']);
          $reply_stmt->execute();
          $replies = $reply_stmt->get_result();

          while ($reply = $replies->fetch_assoc()) {
              echo '<div class="ml-4 border-left pl-3 mb-2">';
              echo '<strong>' . htmlspecialchars($reply['name']) . '</strong> ';
              echo '<small class="text-muted">(' . $reply['date'] . ')</small>';
              echo '<p>' . nl2br(htmlspecialchars($reply['description'])) . '</p>';
              echo '</div>';
          }

          // Formulario de respuesta si el usuario está logueado
          if (isset($_SESSION['user_id'])) {
              echo '<form action="add_comment.php" method="POST" class="ml-4 mt-2">';
              echo '<input type="hidden" name="new_id" value="'.$id.'">';
              echo '<input type="hidden" name="comment_id" value="'.$comment['id'].'">';
              echo '<textarea name="description" class="form-control mb-2" rows="2" placeholder="Responder al comentario..." required></textarea>';
              echo '<button type="submit" class="btn btn-sm btn-outline-primary">Responder</button>';
              echo '</form>';
          }

          echo '</div>';
      }
      ?>
    </div>
  </section>

  <!-- Formulario nuevo comentario -->
  <?php if (isset($_SESSION['user_id'])): ?>
    <section class="section">
      <div class="container">
        <h4>Deja tu comentario</h4>
        <form action="add_comment.php" method="POST">
          <input type="hidden" name="new_id" value="<?= $id ?>">
          <textarea name="description" class="form-control mb-3" rows="4" placeholder="Escribe tu comentario..." required></textarea>
          <button type="submit" class="btn btn-primary">Enviar comentario</button>
        </form>
      </div>
    </section>
  <?php else: ?>
    <div class="container mb-5">
      <p><a href="login.php">Inicia sesión</a> para dejar un comentario.</p>
    </div>
  <?php endif; ?>

  <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
