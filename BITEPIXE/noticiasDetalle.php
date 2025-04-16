<?php
session_start();
require_once 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $mysqli->prepare("SELECT * FROM noticias WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $noticia = $resultado->fetch_assoc();
    } else {
        $error = "La noticia no existe o ha sido eliminada.";
    }
    $stmt->close();
} else {
    $error = "ID de noticia no válido.";
}

?>





<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle Noticia - BITEPIXE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 <link rel="stylesheet" href="styles/css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="/styles/css/index.css">
  <style>
    body {
      font-family: 'Rubik', sans-serif;
      padding: 40px 20px;
      min-height: 100vh;
     
      color: #1e1e1e; /* Texto oscuro para contraste */
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
    }

    .noticia-container {
      background-color: #fafafa; /* Blanco roto */
      max-width: 1200px;
      margin: 100px auto;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .noticia-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }

    .noticia-content {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      align-items: flex-start;
    }

    .noticia-img {
      width: 100%;
      max-width: 500px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      object-fit: cover;
    }

    .noticia-text {
      flex: 1;
      font-size: 1.05rem;
      line-height: 1.8;
      text-align: justify;
    }

    .noticia-meta {
      margin-top: 30px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      font-size: 0.95rem;
      color: #777;
    }

    @media screen and (max-width: 768px) {
      .noticia-content {
        flex-direction: column;
        align-items: center;
      }

      .noticia-text {
        text-align: center;
      }

      .noticia-meta {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
      }
    }
    .btn-home-return {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background-color: #2c2c2c; /* Gris oscuro */
  color: #fff;
  border: 2px solid #2c2c2c;
  padding: 10px 20px;
  font-weight: 600;
  border-radius: 12px;
  text-decoration: none;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  font-size: 1rem;
}

.btn-home-return i {
  font-size: 1.1rem;
}

.btn-home-return:hover {
  background-color: #1e1e1e;
  transform: scale(1.10);
}

  </style>
</head>
<body>

<?php include 'header.php'; ?>


<?php if (isset($error)): ?>
  <div class="noticia-container">
    <h1 class="noticia-title"><?= htmlspecialchars($error) ?></h1>
  </div>
<?php elseif (isset($noticia)): ?>
  <div class="noticia-container">
    <h1 class="noticia-title"><?= htmlspecialchars($noticia['titulo']) ?></h1>

    <div class="noticia-content">
      <img src="images/<?= htmlspecialchars($noticia['imagen']) ?>" alt="Imagen Noticia" class="noticia-img">
      <div class="noticia-text">
        <?= nl2br(htmlspecialchars($noticia['texto'])) ?>
      </div>
    </div>

    <div class="noticia-meta">
      <div><strong>Publicado:</strong> <?= htmlspecialchars(date("d-m-Y", strtotime($noticia['fecha']))) ?></div>
      <div><strong>Autor:</strong> Alberto</div> <!-- o dinámico si más adelante se obtiene el autor -->
      <!-- botones acceso -->
    </div>
        <div class="text-center mt-5 d-flex justify-content-center gap-3">
      <a href="index.php" class="btn-home-return">
        <i class="fas fa-home"></i>
      </a>
      
    </div>

  </div>
<?php endif; ?>

</body>

</html>
