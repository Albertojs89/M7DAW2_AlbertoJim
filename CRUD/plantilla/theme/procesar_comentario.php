<?php
session_start();
require_once '../theme/comicsSoons/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['user_id'])) {
    $description = trim($_POST['description']);
    $new_id = intval($_POST['new_id']);
    $user_id = $_SESSION['user_id'];
    $date = date("Y-m-d");

    if (!empty($description)) {
        $stmt = $mysqli->prepare("INSERT INTO COMMENTS (description, user_id, new_id, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siis", $description, $user_id, $new_id, $date);
        $stmt->execute();
    }
}
header("Location: blog-single.php?id=" . $new_id);
exit;
