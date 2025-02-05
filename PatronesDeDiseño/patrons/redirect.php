<?php
if (isset($_GET['patro'])) {
    $patro = $_GET['patro'];
    header("Location: $patro");
    exit();
} else {
    header("Location: ../estructurals.php");
    exit();
}
?>
