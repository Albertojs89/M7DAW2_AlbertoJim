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
  </head>

  <body>

     <header class="navigation fixed-top">
      <nav style="border-radius: 20px;" class="navbar navbar-expand-lg navbar-dark bg-dark">
         
        <a class="navbar-brand" href="index.php">Home</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navigation"
          aria-controls="navigation"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navigation">
          <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item active">
              <?php if ($_SESSION['role'] == 'admin'): ?>
                  <a href="admin.php" class=""><img class="user-icon" src="https://cdn-icons-png.flaticon.com/512/4370/4370721.png" alt=""></a>
                <?php else: ?>
                  <img src="./images/user.png" alt="" class="user-icon">
                <?php endif; ?>
              <img src="<?= $_SESSION['avatar'] ?>" alt="" class="avatar">
                <p class="d-inline"><?= $_SESSION['username'] ?></p>
            </li>
            <?php endif; ?>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="portfolio.php">Portfolio</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                >Pages</a
              >
              <div class="dropdown-menu">
                <a class="dropdown-item" href="team.php">Team</a>
                <a class="dropdown-item" href="team-single.php">Team Details</a>
                <a class="dropdown-item" href="career.php">Career</a>
                <a class="dropdown-item" href="career-single.php"
                  >Career Details</a
                >
                <a class="dropdown-item" href="blog-single.php">Blog Details</a>

                <a class="dropdown-item" href="faqs.php">FAQ's</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <a href="logout.php" class="btn btn-primary mt-2">Cerrar sesión<img src="" alt=""></a>
            </li>
            <?php else:?>
              <li class="nav-item">
              <a href="login.php" class="btn btn-info mt-2">Iniciar Sesión<img src="" alt=""></a>
              </li>
              <li class="nav-item">
              <a href="register.php" class="btn btn-success mt-2">Registrarse<img src="" alt=""></a>
              </li>
            <?php endif;?>
          </ul>
        </div>
      </nav>
    </header>
    <!-- crear tabla con informacion de la bd usuarios -->
 
    <!-- banner -->
    <section
      class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
      data-background="images/banner/banner.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="display-1 text-white font-weight-bold font-primary">
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
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card hover-bg-secondary shadow py-4 active">
              <div class="card-body text-center">
                <div class="position-relative">
                  <i
                    class="icon-lg icon-box bg-gradient-primary rounded-circle ti-palette mb-5 d-inline-block text-white"
                  ></i>
                  <i class="icon-lg icon-watermark text-white ti-palette"></i>
                </div>
                <h4 class="mb-4">Design</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmo
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card hover-bg-secondary shadow py-4">
              <div class="card-body text-center">
                <div class="position-relative">
                  <i
                    class="icon-lg icon-box bg-gradient-primary rounded-circle ti-dashboard mb-5 d-inline-block text-white"
                  ></i>
                  <i class="icon-lg icon-watermark text-white ti-dashboard"></i>
                </div>
                <h4 class="mb-4">Development</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmo
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card hover-bg-secondary shadow py-4">
              <div class="card-body text-center">
                <div class="position-relative">
                  <i
                    class="icon-lg icon-box bg-gradient-primary rounded-circle ti-announcement mb-5 d-inline-block text-white"
                  ></i>
                  <i
                    class="icon-lg icon-watermark text-white ti-announcement"
                  ></i>
                </div>
                <h4 class="mb-4">Marketing</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmo
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /service -->

    <!-- feature -->
    <section class="section bg-secondary position-relative">
      <div class="bg-image overlay-secondary">
        <img src="images/feature.jpg" alt="bg-image" />
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="row align-items-center">
              <div class="col-lg-4 mb-4 mb-lg-0">
                <img
                  src="images/feature.jpg"
                  alt="feature-image"
                  class="img-fluid"
                />
              </div>
              <div class="col-lg-7 offset-lg-1">
                <div class="row">
                  <div class="col-12">
                    <h2 class="text-white">We know What Bait to Use</h2>
                    <div class="section-border ml-0"></div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i class="icon text-gradient-primary ti-vector mr-3"></i>
                      <div class="media-body">
                        <h4 class="text-white">User Experience</h4>
                        <p class="text-light">
                          Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit, sed do eiusmo
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i class="icon text-gradient-primary ti-layout mr-3"></i>
                      <div class="media-body">
                        <h4 class="text-white">Responsive Layout</h4>
                        <p class="text-light">
                          Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit, sed do eiusmo
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i
                        class="icon text-gradient-primary ti-headphone-alt mr-3"
                      ></i>
                      <div class="media-body">
                        <h4 class="text-white">Digital Solutions</h4>
                        <p class="text-light">
                          Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit, sed do eiusmo
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i
                        class="icon text-gradient-primary ti-ruler-pencil mr-3"
                      ></i>
                      <div class="media-body">
                        <h4 class="text-white">Bootstrap 4x</h4>
                        <p class="text-light">
                          Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit, sed do eiusmo
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /feature -->

   

<!-- project -->
      <section class="section">
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
