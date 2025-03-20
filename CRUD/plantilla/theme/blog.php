<?php
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
</head>
<body>

<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>
    </div>
  </nav>
</header>

<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Noticias</h1>
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
            <img src="/<?= $new['thumbnail'] ?>" alt="post-thumb" class="card-img-top mb-2" />
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
