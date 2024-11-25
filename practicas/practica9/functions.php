<?php
session_start();
include 'libreria.php';
function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    if (isset($_SESSION['libros'][$id])) {
        $_SESSION['libros'][$id] = ["titulo" => $titulo, "autor" => $autor, "imagen" => $imagen, "descripcion" => $descripcion];


    }
  }

  function eliminarLibro($id) {
    if (isset($_SESSION['libreria'][$id])) {
      unset($_SESSION['libreria'][$id]);
    }
  }

  function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    $nuevoLibro = [
        "id" => count($_SESSION['libreria']),
        "titulo" => $titulo,
        "autor" => $autor,
        "imagen" => $imagen,
        "descripcion" => $descripcion
    ];
    $_SESSION['libreria'][] = $nuevoLibro;
}

  

  
  ?>