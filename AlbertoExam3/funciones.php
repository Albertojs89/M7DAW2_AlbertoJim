<?php 
session_start();

function agregarJuego($nombre, $precio, $descripcion) {
    $juego = [
        "nombre" => $nombre,
        "precio" => $precio,
        "descripcion" => $descripcion,
        
    ];
    $_SESSION['productos'][] = $juego;
}

function eliminarJuego($id) {
    // Eliminar el elemento del array
    array_splice($_SESSION['productos'], $id, 1);
    $i=0;
    foreach ($_SESSION['productos'] as $juego) {
        $juego['id'] = $i;
        $_SESSION['productos'][$i] = $juego;
        $i++;
    }
    
}


?>