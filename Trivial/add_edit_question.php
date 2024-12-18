<?php
session_start();

include 'data.php';

// Inicializar sesión si no está definida
if (!isset($_SESSION['arrayPreguntas'])) {
    $_SESSION['arrayPreguntas'] = [];
}

// Obtener datos del enlace!
$id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

// Variables para el formulario
$pregunta = "";
$respuestas = ["", ""];
$correcta = "";

// ACCION EDIT----------------------------------------------------------------
if ($action === 'edit' && $id !== null && isset($_SESSION['arrayPreguntas'][$id])) {
    $preguntaData = $_SESSION['arrayPreguntas'][$id];
    $pregunta = $preguntaData['pregunta'];
    $respuestas = $preguntaData['respuestas'];
    $correcta = $preguntaData['correcta'];
}

// FUNCION ADD-------------------------------------------
function agregarPregunta($pregunta, $respuestas, $correcta) {
    $_SESSION['arrayPreguntas'][] = [
        "pregunta" => $pregunta,
        "respuestas" => $respuestas,
        "correcta" => $correcta,
        "id" => count($_SESSION['arrayPreguntas']),
    ];
}

//FUNCION EDIT----------------------------------------------------------------
function editarPregunta($id, $pregunta, $respuestas, $correcta) {
    if (isset($_SESSION['arrayPreguntas'][$id])) {
        $_SESSION['arrayPreguntas'][$id] = [
            "pregunta" => $pregunta,
            "respuestas" => $respuestas,
            "correcta" => $correcta,
            "id" => $id,
        ];
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pregunta = $_POST['pregunta'];
    $respuestas = [$_POST['respuesta1'], $_POST['respuesta2']];
    $correcta = $_POST['correcta'];

    if ($action === 'add') {
        agregarPregunta($pregunta, $respuestas, $correcta);
    } elseif ($action === 'edit' && $id !== null) {
        editarPregunta($id, $pregunta, $respuestas, $correcta);
    }
    header('Location: manage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $action === 'edit' ? 'Editar Pregunta' : 'Agregar Pregunta' ?></title>
</head>
<body>
    <h2><?= $action === 'edit' ? 'Editar Pregunta' : 'Agregar Nueva Pregunta' ?></h2>
    <form method="POST" action="" style="max-width: 600px; margin: auto;">
        <div>
            <label for="pregunta">Pregunta:</label>
            <input type="text" id="pregunta" name="pregunta" value="<?= ($pregunta) ?>" required>
        </div>
        <div>
            <label for="respuesta1">Respuesta 1:</label>
            <input type="text" id="respuesta1" name="respuesta1" value="<?= ($respuestas[0]) ?>" required>
        </div>
        <div>
            <label for="respuesta2">Respuesta 2:</label>
            <input type="text" id="respuesta2" name="respuesta2" value="<?= ($respuestas[1]) ?>" required>
        </div>
        <div>
            <label for="correcta">Respuesta Correcta:</label>
            <input type="text" id="correcta" name="correcta" value="<?= ($correcta) ?>" required>
        </div>
        <div>
            <button type="submit"><?= $action === 'edit' ? 'Guardar Cambios' : 'Agregar Pregunta' ?></button>
        </div>
    </form>
</body>


<div>
    <a href="logout.php"><button>Cerrar sesión</button></a>
    <a href="index.php"><button>Inicio</button></a>
</div>
</html>
