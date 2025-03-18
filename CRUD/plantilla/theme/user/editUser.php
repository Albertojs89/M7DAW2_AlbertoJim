<?php
session_start();
require_once '../../theme/comicsSoons/config.php';

// Verificar acceso admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../index.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: ../index.php');
    exit();
}

$id = (int) $_GET['id'];
$result = $mysqli->query("SELECT * FROM USERS WHERE id = $id");
$usuario = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $age = $_POST['age'];
    $job = $_POST['job'];
    
    // Procesar nueva imagen si se sube
    $nuevoAvatar = $usuario['avatar']; // Por defecto, mantener el actual
    if (!empty($_FILES['avatar']['name'])) {
        $nombreArchivo = $_FILES['avatar']['name'];
        $archivoTemporal = $_FILES['avatar']['tmp_name'];
        
        // Crear carpeta si no existe
        $rutaCarpeta = '../../theme/uploads/avatars/';
        if (!is_dir($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0777, true);
        }

        $nombreUnico = uniqid() . '_' . $nombreArchivo;
        $rutaDestino = $rutaCarpeta . $nombreUnico;
        move_uploaded_file($archivoTemporal, $rutaDestino);

        // Guardar ruta relativa (importante)
        $nuevoAvatar = 'uploads/avatars/' . $nombreUnico;
    }

    $sql = "UPDATE USERS SET name=?, surname=?, email=?, role=?, age=?, job=?, avatar=? WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssissi", $name, $surname, $email, $role, $age, $job, $nuevoAvatar, $id);

    if ($stmt->execute()) {
        header('Location: ../adminPanel/adminUsers.php');
        exit();
    } else {
        echo "Error al actualizar usuario: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?= $usuario['name'] ?>" required><br>

        <label for="surname">Apellido:</label>
        <input type="text" id="surname" name="surname" value="<?= $usuario['surname'] ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $usuario['email'] ?>" required><br>

        <label for="role">Rol:</label>
        <select id="role" name="role" required>
            <option value="user" <?= $usuario['role'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $usuario['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select><br>

        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" value="<?= $usuario['age'] ?>" required><br>

        <label for="job">Trabajo:</label>
        <input type="text" id="job" name="job" value="<?= $usuario['job'] ?>" required><br>

        <label for="avatar">Cambiar Avatar:</label>
        <input type="file" id="avatar" name="avatar" accept="image/*"><br>
        <small>Avatar actual:</small><br>
        <img src="../../theme/<?= $usuario['avatar'] ?>" width="100" style="border-radius: 50%; object-fit: cover;"><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
