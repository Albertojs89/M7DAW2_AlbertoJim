<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

?>

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