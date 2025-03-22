<?php
session_start();
require_once '../theme/comicsSoons/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = trim($_POST['description']);
    $new_id = (int)$_POST['new_id'];
    $user_id = $_SESSION['user_id'];
    $comment_id = isset($_POST['comment_id']) ? (int)$_POST['comment_id'] : null;
    $date = date('Y-m-d');

    $stmt = $mysqli->prepare("INSERT INTO COMMENTS (description, user_id, new_id, date, comment_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("siisi", $description, $user_id, $new_id, $date, $comment_id);
    $stmt->execute();
}

header("Location: blog-single.php?id=" . $new_id);
exit();
