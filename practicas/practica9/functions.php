<?php
session_start();
include 'libreria.php';
function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    if (isset($_SESSION['libreria'][$id])) {
        $_SESSION['libreria'][$id] = ["titulo" => $titulo, "autor" => $autor, "imagen" => $imagen, "descripcion" => $descripcion];


    }
  }

  function eliminarLibro($id) {
    if (isset($_SESSION['libreria'][$id])) {
      unset($_SESSION['libreria'][$id]);
    }
  }

  function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    $nuevoLibro = [
        "titulo" => $titulo,
        "autor" => $autor,
        "imagen" => $imagen,
        "descripcion" => $descripcion,
        "id" => count($_SESSION['libreria'])
    ];
    $_SESSION['libreria'][] = $nuevoLibro;
}

  

  
  ?>