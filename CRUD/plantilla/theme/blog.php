<?php
session_start();
require_once '../theme/comicsSoons/config.php';

$news = $mysqli->query("SELECT * FROM NEWS ORDER BY new_date DESC;")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog | Comics Soons</title>
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Fjalla+One&family=Karla+Tamil+Inclined:wght@400;700&family=Noto+Sans+Elbasan&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

<?php include 'header.php'; ?>


<section class="page-title bg-cover" data-background="images/backgrounds/fondoNews.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1  font-weight-bold font-primary h1-comic">Noticias</h1>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row">
      <?php foreach ($news as $new): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <article class="card">
            <img src="<?= $new['thumbnail'] ?>" alt="post-thumb" class="card-img-top mb-2" />
            <div class="card-body p-0">
              <time><?= $new['new_date'] ?></time>
              <a href="blog-single.php?id=<?= $new['id'] ?>" class="h4 card-title d-block my-3 text-dark hover-text-underline">
                <?= $new['title'] ?>
              </a>
              <a href="blog-single.php?id=<?= $new['id'] ?>" class="btn btn-transparent">Read more</a>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<footer class="bg-secondary position-relative mt-5">
  <div class="container py-4 text-center text-white">
    <p>&copy; <?= date('Y') ?> Comics Soons | Blog Section</p>
  </div>
</footer>

<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
