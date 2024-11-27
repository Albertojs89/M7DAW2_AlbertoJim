<?php
session_start();
// include 'libreria.php';
function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    if (isset($_SESSION['libreria'][$id])) {
        $_SESSION['libreria'][$id] = ["titulo" => $titulo, "autor" => $autor, "imagen" => $imagen, "descripcion" => $descripcion];


    }
  }

  function eliminarLibro($id) {
    if (isset($_SESSION['libreria'][$id])) {
      unset($_SESSION['libreria'][$id]);
      //modificar la id de la libreria añadiendo un contador a 0, que recorra la libreria y recuenta las id de nuevo. 
      $i = 0;
      foreach ($_SESSION['libreria'] as $libro) {
        $libro['id'] = $i;
        $_SESSION['libreria'][$i] = $libro;
        $i++;
      }
    }
  }

  function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    $libro = [
        "titulo" => $titulo,
        "Autor" => $autor,
        "Imagen" => $imagen,
        "Descripcion" => $descripcion,
        "id" => count($_SESSION['libreria'])
    ];
    $_SESSION['libreria'][] = $libro;
}

  

  
  ?>