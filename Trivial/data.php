<?
session_start();


if(!isset($_SESSION['arrayPreguntas'])){
$_SESSION['arrayPreguntas'] = [
    [
        "pregunta" => "¿Cuál es la capital de Francia?",
        "respuestas" => ["París", "Lyon"],
        "correcta" => "París",
        "id"=>"0"
    ],
    [
        "pregunta" => "¿Cuántos planetas tiene el sistema solar?",
        "respuestas" => ["8", "9"],
        "correcta" => "8",
        "id"=>"1"
    ],
    [
        "pregunta" => "¿Quién escribió 'Don Quijote de la Mancha'?",
        "respuestas" => ["Miguel de Cervantes", "William Shakespeare"],
        "correcta" => "Miguel de Cervantes",
        "id"=>"2"
    ]
];
}
?>