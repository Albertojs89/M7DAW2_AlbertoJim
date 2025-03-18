<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<header class="main-header">
  <nav class="nav-bar">
    <div class="nav-left">
      <a href="index.php" class="nav-item nav-home"><span class="nav-dot nav-dot-home"></span> Home</a>
      <a href="analisis.php" class="nav-item nav-analysis"><span class="nav-dot nav-dot-analysis"></span> Análisis</a>
      <a href="rankings.php" class="nav-item nav-rankings"><span class="nav-dot nav-dot-rankings"></span> Rankings</a>
      <a href="about.php" class="nav-item nav-about"><span class="nav-dot nav-dot-about"></span> About</a>
    </div>

    <div class="nav-title">BITEPIXE</div>

    <div class="nav-right">
      <?php if (isset($_SESSION['user_id'])): ?>
        <div class="d-flex align-items-center gap-2">
          <?php if ($_SESSION['rol'] === 'admin'): ?>
            <a href="admin.php" title="Panel de administración">
              <img src="/images/admin.png" alt="Admin" style="width: 36px; height: 36px; object-fit: contain;">
            </a>
          <?php endif; ?>
         <img src="/images/avatars/<?= htmlspecialchars($_SESSION['avatar']) ?>" alt="Avatar" style="width:42px; height:42px; border-radius:50%; object-fit:cover; box-shadow:0 0 8px rgba(0,0,0,0.3);">

          <span style="color: #ccc; font-weight: 600;"><?= htmlspecialchars($_SESSION['nombre']) ?></span>
          <a href="logout.php" class="logout-icon-btn" title="Cerrar sesión">
            <i class="fas fa-power-off"></i>
          </a>
        </div>
      <?php else: ?>
        <a href="register.php" class="nav-item nav-auth">Register</a>
        <a href="login.php" class="nav-item nav-auth">Login</a>
      <?php endif; ?>
    </div>
  </nav>
</header>
