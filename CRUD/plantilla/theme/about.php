<?php
session_start();
require_once '../theme/comicsSoons/config.php';

$testimonials=$mysqli->query("SELECT * FROM TESTIMONIALS ORDER BY id DESC;")->fetch_all(MYSQLI_ASSOC); 





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
    <script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Fjalla+One&family=Karla+Tamil+Inclined:wght@400;700&family=Noto+Sans+Elbasan&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Patrick+Hand&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>

  <body>
<?php include 'header.php'; ?>

      

    <!-- page-title -->
    <section
      class="page-title2 bg-cover"
      data-background="images/backgrounds/db.png"
    >
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="display-1 text-white font-weight-bold font-primary">
              About
            </h1>
          </div>
        </div>
      </div>
    </section>
    <!-- /page-title -->

    <!-- progressbar -->
    <section class="section pb-0 mb-5">
      <div class="container">
        <h2>
          Somos unos aficionados al comic, y aquí es nuestro templo donde mostramos nuestras
          creaciones como novedades del mundo. Coge tu papel y bolí y adentrate!
        </h2>
      </div>
    </section>
    <!-- /progressbar -->

     

<!-- testimonial-slider -->
<section class="section bg-secondary mt-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="text-white mb-5">Our Client Testimonials</h2>
      </div>
    </div>
    <div class="row bg-contain" data-background="images/banner/brush.png">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div id="slider" class="ui-card-slider bg-contain">
          <?php
          foreach ($testimonials as $testimonial){
            echo '
              <div class="slide">
                <div class="card text-center">
                  <div class="card-body px-5 py-4">
                    <img
                      src="'.$testimonial['photo'].'"
                      alt="user-1"
                      class="img-fluid rounded-circle mb-4"
                    />
                    <h4 class="text-secondary">'.$testimonial['name'].'</h4>
                    <p>“'.$testimonial['description'].'”</p>
                    <p>';
                      for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $testimonial['rating']) {
                          echo '<i class="fas fa-star text-warning"></i>';
                        } else {
                          echo '<i class="far fa-star text-light"></i>';
                        }
                      }
            echo    '</p>
                  </div>
                </div>
              </div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /testimonial-slider -->


    

    <!-- footer -->
    <footer class="bg-secondary position-relative">
      
      
      
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
