<?php
session_start();
require_once 'config.php';

// Obtener posts
$consulta = $mysqli->query("
  SELECT sp.*, u.nombre AS nombre_usuario, u.avatar 
  FROM savepost sp 
  LEFT JOIN usuarios u ON sp.user_id = u.id 
  ORDER BY sp.fecha DESC
");
$posts = $consulta ? $consulta->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Save Post - BITEPIXE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Estilos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Rubik', sans-serif;
      background-color: #fef9f4;
      padding: 40px 20px;
    }

    .savepost-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 10px; /* Antes no tenía */
    }

    .savepost-header {
      text-align: center;
      margin-bottom: 40px; /* Aumentamos separación con los post-its */
      margin-top: 0; /* Por si tenía valores previos heredados */
    }


    .savepost-header h2 {
      font-size: 2rem;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .savepost-subtitle {
      font-size: 1rem;
      color: #555;
      margin-bottom: 15px;
    }

    .postit-btn {
      background-color: #ffcc00;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .postit-btn:hover {
      background-color: #ffdb4d;
    }

    .post-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
      max-width: 1200px;
      width: 100%;
      padding: 0 10px;
    }

   .post-card {
  background-color: #fff5ba;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 6px 12px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 100%;
  max-width: 320px;
  margin: 0 auto;
}


    .post-card h4 {
      font-size: 1rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .post-card p {
      font-size: 0.9rem;
    }

    .post-avatar {
      display: flex;
      align-items: center;
      margin-top: 15px;
      gap: 10px;
    }

    .post-avatar img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
    }

    .post-meta {
      font-size: 0.85rem;
      color: #777;
    }

    .post-respuesta {
      margin-top: 10px;
      font-size: 0.85rem;
      color: #444;
      background: #fff3e0;
      padding: 6px 10px;
      border-radius: 6px;
    }

    @media (max-width: 576px) {
      .savepost-header h2 {
        font-size: 1.5rem;
      }

      .post-card {
        padding: 15px;
      }

      .postit-btn {
        padding: 8px 16px;
      }
    }
    .text-success {
  color: #2ecc71;
  font-weight: bold;
}
.text-danger {
  color: #e74c3c;
  font-weight: bold;
}

  </style>
</head>
<body>

<?php include 'header.php'; ?>

<main class="savepost-wrapper">
  <div class="savepost-header">
    <h2>Save Post 📝</h2>
    <p class="savepost-subtitle">Bienvenidos, deja tu comentario, duda u opinión que quieras.</p>
    <a href="crearSavePost.php" class="postit-btn">Post it!</a>
  </div>

  <div class="post-grid">
    <?php foreach ($posts as $post): ?>
      <div class="post-card">
        <h4><?= htmlspecialchars($post['titulo']) ?></h4>
        <p><?= nl2br(htmlspecialchars($post['texto'])) ?></p>

        <?php if (!empty($post['imagen'])): ?>
          <img src="images/savepost/<?= htmlspecialchars($post['imagen']) ?>" alt="Imagen del post" style="width: 100%; max-height: 120px; object-fit: cover; border-radius: 6px; margin-top: 10px;">
        <?php endif; ?>

        <div class="post-avatar">
          <?php if ($post['user_id']): ?>
            <img src="images/avatars/<?= htmlspecialchars($post['avatar']) ?>" alt="Avatar">
          <?php else: ?>
            <span style="font-size: 1.6rem;">👤</span>
          <?php endif; ?>
          <span class="post-meta">
            <?= $post['user_id'] ? htmlspecialchars($post['nombre_usuario']) : 'Anónimo' ?> · 
            <?= date("d/m/Y", strtotime($post['fecha'])) ?>
          </span>
        </div>

        <?php if (!empty($post['respuesta_admin'])): ?>
          <div class="post-respuesta">
            <strong>Respuesta:</strong><br>
            <?= nl2br(htmlspecialchars($post['respuesta_admin'])) ?>
          </div>
        <?php endif; ?>
        <div class="d-flex justify-content-center align-items-center gap-4 mt-3">
          <span class="like-btn text-success" style="cursor: pointer;" data-post="<?= $post['id'] ?>">
            <i class="fas fa-thumbs-up"></i>
            <span class="like-count" data-post="<?= $post['id'] ?>"><?= $post['likes'] ?></span>
          </span>
          <span class="dislike-btn text-danger" style="cursor: pointer;" data-post="<?= $post['id'] ?>">
            <i class="fas fa-thumbs-down"></i>
            <span class="dislike-count" data-post="<?= $post['id'] ?>"><?= $post['dislikes'] ?></span>
          </span>
        </div>


      </div>
    <?php endforeach; ?>
  </div>
</main>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".like-btn, .dislike-btn");

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      const postId = button.dataset.post;
      const tipo = button.classList.contains("like-btn") ? "like" : "dislike";

      fetch("likeHandler.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `post_id=${postId}&tipo=${tipo}`
      })
      .then(res => res.json())
      .then(data => {
        if (data.error) {
          alert(data.error);
          return;
        }

        // Actualizar los contadores en pantalla
        const likeSpan = document.querySelector(`.like-count[data-post='${postId}']`);
        const dislikeSpan = document.querySelector(`.dislike-count[data-post='${postId}']`);
        likeSpan.textContent = data.like;
        dislikeSpan.textContent = data.dislike;
      })
      .catch(err => {
        console.error("Error al enviar voto:", err);
      });
    });
  });
});
</script>

</body>
</html>
