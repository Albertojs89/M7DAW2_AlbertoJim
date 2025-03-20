<?php
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
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
