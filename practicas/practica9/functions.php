<?php
session_start();
include 'libreria.php';
function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    $_SESSION['libreria'][$id] = ["Titulo" => $titulo, "Autor" => $autor, "Imagen" => $imagen, "Descripcion" => $descripcion,"id"=>$id];


}
  

  function eliminarLibro($id) {
    // Eliminar el elemento del array
    array_splice($_SESSION['libreria'], $id, 1);
    $i=0;
    foreach ($_SESSION['libreria'] as $libro) {
        $libro['id'] = $i;
        $_SESSION['libreria'][$i] = $libro;
        $i++;
    }
    
}

  function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    $libro = [
        "Titulo" => $titulo,
        "Autor" => $autor,
        "Imagen" => $imagen,
        "Descripcion" => $descripcion,
        "id" => count($_SESSION['libreria'])
    ];
    $_SESSION['libreria'][] = $libro;
}

  

  
  ?>