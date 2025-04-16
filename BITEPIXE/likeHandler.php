<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $postId = intval($_POST['post_id']);
  $tipo = $_POST['tipo'];

  if (!in_array($tipo, ['like', 'dislike'])) {
    echo json_encode(['error' => 'Tipo no válido']);
    exit;
  }

  $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
  $ip = $_SERVER['REMOTE_ADDR'];

  // Comprobar si ya ha votado este post (por user o IP)
  $checkQuery = $mysqli->prepare("
    SELECT id FROM votos_savepost 
    WHERE post_id = ? AND (user_id = ? OR (user_id IS NULL AND ip_address = ?))
  ");
  $checkQuery->bind_param("iis", $postId, $userId, $ip);
  $checkQuery->execute();
  $checkQuery->store_result();

  if ($checkQuery->num_rows > 0) {
    echo json_encode(['error' => 'Ya has votado este post.']);
    exit;
  }

  // Actualizar el contador en la tabla savepost
  $col = $tipo === 'like' ? 'likes' : 'dislikes';
  $update = $mysqli->prepare("UPDATE savepost SET $col = $col + 1 WHERE id = ?");
  $update->bind_param("i", $postId);
  $update->execute();

  // Registrar el voto
  $insert = $mysqli->prepare("
    INSERT INTO votos_savepost (post_id, user_id, ip_address, tipo)
    VALUES (?, ?, ?, ?)
  ");
  $insert->bind_param("iiss", $postId, $userId, $ip, $tipo);
  $insert->execute();

  // Devolver los nuevos valores
  $result = $mysqli->query("SELECT likes, dislikes FROM savepost WHERE id = $postId");
  $row = $result->fetch_assoc();

  echo json_encode([
    'like' => $row['likes'],
    'dislike' => $row['dislikes']
  ]);
}
?>
