<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre mí - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <style>
    body {
  margin-top: 100px;
  background-color: #f5f5f5;
  font-family: 'Urbanist', sans-serif;
  padding: 40px;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
}


    .about-container {
      max-width: 1000px;
      background-color: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      display: flex;
      gap: 40px;
      align-items: center;
      flex-wrap: wrap;
    }

    .about-image {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      overflow: hidden;
      flex-shrink: 0;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .about-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .about-text {
      flex: 1;
      font-family: 'Press Start 2P', cursive;
      font-size: 0.75rem;
      color: #111;
      line-height: 1.8;
    }

    @media screen and (max-width: 768px) {
      .about-container {
        flex-direction: column;
        text-align: center;
      }

      .about-text {
        font-size: 0.7rem;
      }
    }
    .back-floating-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    padding: 10px 22px;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 12px;
    background-color: #222;
    color: #fff;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
    text-decoration: none;
    z-index: 999;
    transition: all 0.3s ease;
  }

.back-floating-btn:hover {
  background-color: #444;
  transform: scale(1.05);
}
.footer-social {
  display: flex;
  justify-content: center;
  gap: 30px;
  margin-top: 50px;
}

.social-icon {
  font-size: 2.4rem;
  color: #111;
  text-decoration: none;
  transition: transform 0.3s ease, opacity 0.3s ease;
}

.social-icon:hover {
  transform: scale(1.2);
  opacity: 0.7;
}


  </style>
</head>
<body>

  <div class="about-container">
    <div class="about-image">
      <img src="/images/me.jpg" alt="Alberto Jiménez">
    </div>
    <div class="about-text">
      ¡Hola! Soy <strong>Alberto Jiménez</strong>, Desarrollador Frontend y UX/UI Designer con alma de gamer. <br><br>
      Este proyecto es mi rincón personal donde fusiono diseño, código y pasión por los videojuegos. Aquí comparto mi visión creativa del mundo gaming, construyendo experiencias con cariño pixel a pixel.
    </div>
  </div>
  <footer class="footer-social">
  <a href="https://github.com/" target="_blank" class="social-icon"><i class="bi bi-github"></i></a>
  <a href="https://instagram.com/" target="_blank" class="social-icon"><i class="bi bi-instagram"></i></a>
  <a href="https://linkedin.com/" target="_blank" class="social-icon"><i class="bi bi-linkedin"></i></a>
  </footer>

    <a href="index.php" class="btn btn-dark back-floating-btn">
     ← Volver al inicio
    </a>

</body>
</html>
