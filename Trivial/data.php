<?
session_start();


if(!isset($_SESSION['libreria'])){
$_SESSION['arrayPreguntas'] = [
    [
        "pregunta" => "¿Cuál es la capital de Francia?",
        "respuestas" => ["París", "Lyon"],
        "correcta" => "París"
    ],
    [
        "pregunta" => "¿Cuántos planetas tiene el sistema solar?",
        "respuestas" => ["8", "9"],
        "correcta" => "8"
    ],
    [
        "pregunta" => "¿Quién escribió 'Don Quijote de la Mancha'?",
        "respuestas" => ["Miguel de Cervantes", "William Shakespeare"],
        "correcta" => "Miguel de Cervantes"
    ]
];
}
?>