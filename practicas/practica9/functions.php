<?php
session_start();
include 'libreria.php';
function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    $_SESSION['libreria'][$id] = ["Titulo" => $titulo, "Autor" => $autor, "Imagen" => $imagen, "Descripcion" => $descripcion,"id"=>$id];


}
  

  function eliminarLibro($id) {
    if (isset($_SESSION['libreria'][$id])) {
    array_splice($_SESSION['libreria'],$id,1);
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