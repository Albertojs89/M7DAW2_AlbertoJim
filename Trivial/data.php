<?
session_start();

//FUNCION DELE----------------------------------------------------------------
  function eliminarPregunta($id) {
    // Eliminar el elemento del array
    array_splice($_SESSION['arrayPreguntas'], $id, 1);
    $i=0;
    foreach ($_SESSION['arrayPreguntas'] as $pregunta) {
        $pregunta['id'] = $i;
        $_SESSION['arrayPreguntas'][$i] = $pregunta;
        $i++;
    }
    
}





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