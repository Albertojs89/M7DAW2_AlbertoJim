<?php
session_start();
require_once '../theme/comicsSoons/config.php';

$result=$mysqli->query("SELECT * FROM USERS ORDER BY id DESC");
$projects=$mysqli->query("SELECT * FROM PROJECTS ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC); //hacemos que result coja todo y lo convierta en una array asociativo
$news=$mysqli->query("SELECT * FROM NEWS ORDER BY new_date DESC LIMIT 3;")->fetch_all(MYSQLI_ASSOC); 



$usuarios=$result->fetch_all(MYSQLI_ASSOC); //hacemos que result coja todo y lo convierta en una array asociativo



?>




<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <title>Agen | Bootstrap Agency Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- theme meta -->
    <meta name="theme-name" content="agen" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css" />
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css" />
    <!-- themefy-icon -->
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css" />
    <!-- venobox css -->
    <link rel="stylesheet" href="plugins/venobox/venobox.css" />
    <!-- card slider -->
    <link rel="stylesheet" href="plugins/card-slider/css/style.css" />

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Fjalla+One&family=Karla+Tamil+Inclined:wght@400;700&family=Noto+Sans+Elbasan&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Fjalla+One&family=Karla+Tamil+Inclined:wght@400;700&family=Noto+Sans+Elbasan&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Patrick+Hand&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>

  <body>

     <?php include 'header.php'; ?>

    
 
    <!-- banner -->
    <section
      class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
      data-background="images/banner/fondoBanner.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="display-1 text-outline h1-comic">
              Comics Soons
            </h1>
          </div>
        </div>
      </div>
    </section>
    <!-- /banner -->

    <!-- service -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2 class="section-title">Our Services</h2>
            <p class="lead">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat.
            </p>
            <div class="section-border"></div>
          </div>
        </div>
       
      </div>
    </section>
    <!-- /service -->

  
<!-- project -->
      <section id="portfolio" class="section">
        <div class="container-fluid px-0">
          <div class="row">
            <div class="col-lg-10 mx-auto text-center">
              <h2>Our Feature Works</h2>
              <div class="section-border"></div>
            </div>
          </div>

          <div class="row no-gutters shuffle-wrapper">
            <?php foreach($projects as $project): ?>
              <?php
                // Comprobamos si el thumbnail ya contiene una ruta o si es solo el nombre del archivo
                $thumbnailPath = (strpos($project['thumbnail'], 'uploads/') !== false || strpos($project['thumbnail'], 'images/') !== false)
                  ? $project['thumbnail']
                  : 'uploads/projects/' . $project['thumbnail'];
              ?>
              <div class="col-lg-4 col-md-6 shuffle-item">
                <div class="project-item">
                  <img
                    src="<?= $thumbnailPath ?>"
                    alt="project-image"
                    class="img-fluid w-100"
                  />
                  <div class="project-hover bg-secondary px-4 py-3">
                    <a href="#" class="text-white h4"><?= $project['title'] ?></a>
                    <?php if (!empty($project['url'])): ?>
                      <a href="<?= $project['url'] ?>" target="_blank"><i class="ti-link icon-xs text-white"></i></a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
<!-- /project -->


    <!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Latest News</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
    <?php foreach($news as $new){
      echo '
        <div class="col-lg-4 col-md-6 mb-4">
          <article class="card">
            <img
              src="'.$new['thumbnail'].'"
              alt="post-thumb"
              class="card-img-top mb-2"
            />
            <div class="card-body p-0">
              <time>'.$new['new_date'].'</time>
              <a href="blog-single.php?id='.$new['id'].'"
                class="h4 card-title d-block my-3 text-dark hover-text-underline"
              >'.$new['title'].'</a>
              <a href="blog-single.php?id='.$new['id'].'" class="btn btn-transparent">Read more</a>
            </div>
          </article>
        </div>';
    } ?>
    </div>
  </div>
</section>

    <!-- /blog -->

    <!-- footer -->
    <footer class="bg-secondary position-relative">
      <img
        src="images/backgrounds/map.png"
        class="img-fluid overlay-image"
        alt=""
      />
      <div class="section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-3 col-6">
              <h4 class="text-white mb-5">About</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-light d-block mb-3">Service</a></li>
                <li>
                  <a href="#" class="text-light d-block mb-3">Conatact</a>
                </li>
                <li>
                  <a href="#" class="text-light d-block mb-3">About us</a>
                </li>
                <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
                <li><a href="#" class="text-light d-block mb-3">Support</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-6">
              <h4 class="text-white mb-5">Company</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-light d-block mb-3">Service</a></li>
                <li>
                  <a href="#" class="text-light d-block mb-3">Conatact</a>
                </li>
                <li>
                  <a href="#" class="text-light d-block mb-3">About us</a>
                </li>
                <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
                <li><a href="#" class="text-light d-block mb-3">Support</a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="bg-white p-4">
                <h3>Contact us</h3>
                <form action="#">
                  <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control mb-4 px-0"
                    placeholder="Full name"
                  />
                  <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control mb-4 px-0"
                    placeholder="Email address"
                  />
                  <textarea
                    name="message"
                    id="message"
                    class="form-control mb-4 px-0"
                    placeholder="Message"
                  ></textarea>
                  <button class="btn btn-primary" type="submit">Send</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pb-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left">
              <p class="text-light mb-0">
                Copyright &copy; 2019 a theme by
                <a class="text-gradient-primary" href="https://themefisher.com"
                  >themefisher.com</a
                >
              </p>
            </div>
            <div class="col-md-6">
              <ul class="list-inline text-md-right text-center">
                <li class="list-inline-item">
                  <a class="d-block p-3 text-white" href="#"
                    ><i class="ti-facebook"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a class="d-block p-3 text-white" href="#"
                    ><i class="ti-twitter-alt"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a class="d-block p-3 text-white" href="#"
                    ><i class="ti-instagram"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a class="d-block p-3 text-white" href="#"
                    ><i class="ti-github"></i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- /footer -->

    <!-- jQuery -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="plugins/slick/slick.min.js"></script>
    <!-- venobox -->
    <script src="plugins/venobox/venobox.min.js"></script>
    <!-- shuffle -->
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <!-- apear js -->
    <script src="plugins/counto/apear.js"></script>
    <!-- counter -->
    <script src="plugins/counto/counTo.js"></script>
    <!-- card slider -->
    <script src="plugins/card-slider/js/card-slider-min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="plugins/google-map/gmap.js"></script>

    <!-- Main Script -->
    <script src="js/script.js"></script>
  </body>
</html>
