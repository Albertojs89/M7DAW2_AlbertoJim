<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<header class="navigation fixed-top">
  <nav style="border-radius: 20px;" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="d-flex align-items-center">
      <?php if (isset($_SESSION['user_id'])): ?>
        <?php if ($_SESSION['role'] == 'admin'): ?>
          <a href="admin.php" class="navbar-brand d-flex align-items-center">
            <img class="user-icon" src="https://cdn-icons-png.flaticon.com/512/4370/4370721.png" alt="Admin Icon">
          </a>
        <?php endif; ?>
        <div class="navbar-brand d-flex align-items-center">
          <img src="<?= $_SESSION['avatar'] ?>" alt="Avatar" class="avatar">
          <span class="ml-2 text-white"><?= htmlspecialchars($_SESSION['username']) ?></span>
        </div>
      <?php else: ?>
        <a class="navbar-brand" href="index.php">Home</a>
      <?php endif; ?>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#portfolio">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a href="logout.php" class="btn btn-primary mt-2">Cerrar sesión</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="login.php" class="btn btn-info mt-2">Iniciar Sesión</a>
          </li>
          <li class="nav-item">
            <a href="register.php" class="btn btn-success mt-2">Registrarse</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>
