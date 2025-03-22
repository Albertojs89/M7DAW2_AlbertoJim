<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<header class="main-header">
  <nav class="nav-bar">
    <div class="nav-left">
      <a href="index.php" class="nav-item nav-home">
        <i class="fas fa-house nav-icon nav-home-icon"></i>
        <span class="nav-label">Home</span>
      </a>
      <a href="analisis.php" class="nav-item nav-analysis">
        <i class="fas fa-star nav-icon nav-analysis-icon"></i>
        <span class="nav-label">Reviews</span>
      </a>
      <a href="rankings.php" class="nav-item nav-rankings">
        <i class="fas fa-chart-line nav-icon nav-rankings-icon"></i>
        <span class="nav-label">Rankings</span>
      </a>
      <a href="about.php" class="nav-item nav-about">
        <i class="fas fa-info-circle nav-icon nav-about-icon"></i>
        <span class="nav-label">About</span>
      </a>
      <a href="<?= basename($_SERVER['PHP_SELF']) === 'index.php' ? '#memorycard' : 'index.php#memorycard'; ?>" class="nav-item nav-memory">
        <i class="fas fa-gamepad nav-icon nav-memory-icon"></i>
        <span class="nav-label">Memory Cards</span>
      </a>
    </div>

    <div class="nav-right">
      <?php if (isset($_SESSION['user_id'])): ?>
        <div class="d-flex align-items-center gap-4">
          <?php if ($_SESSION['rol'] === 'admin'): ?>
            <a href="admin.php" title="Panel de administración">
              <img src="images/admin.png" alt="Admin" style="width: 36px; height: 36px; object-fit: contain;">
            </a>
          <?php endif; ?>
          <img src="images/avatars/<?= htmlspecialchars($_SESSION['avatar']) ?>" alt="Avatar" style="width:42px; height:42px; border-radius:50%; object-fit:cover; box-shadow:0 0 8px rgba(0,0,0,0.3);">
          <span style="color: #ccc; font-weight: 600; font-size: 1.4rem"><?= htmlspecialchars($_SESSION['nombre']) ?></span>
          <a href="logout.php" class="logout-icon-btn" title="Cerrar sesión"><i class="fas fa-power-off"></i></a>
        </div>
      <?php else: ?>
        <a href="register.php" class="nav-item nav-auth">Register</a>
        <a href="login.php" class="nav-item nav-auth">Login</a>
      <?php endif; ?>
    </div>
  </nav>
</header>

<style>
  .nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    padding: 4px 8px;
    font-size: 0.8rem;
  }

  .nav-icon {
    font-size: 28px;
    margin-bottom: 3px;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .nav-label {
    color: #ccc;
    font-size: 1.15rem;
    font-weight: 500;
  }

 .nav-icon {
  font-size: 28px;
  margin-bottom: 4px;
  transition: filter 0.3s ease, color 0.3s ease;
}

/* Colores por icono */
.nav-home i   { color: #ff4d4d; }
.nav-analysis i { color: #66ff66; }
.nav-rankings i { color: #3399ff; }
.nav-about i  { color: #ffcc33; }
.nav-memory i { color: #ccc; }

/* Efecto hover */
.nav-home:hover i,
.nav-analysis:hover i,
.nav-rankings:hover i,
.nav-about:hover i,
.nav-memory:hover i {
  filter: brightness(1.5);
}

</style>