<?php

class Biblioteca{
  public array $libreria=[];



  //mostrar libreria completa: comprobacion que funciona correctamente imprimirla en pantalla
  public function mostrarLibreria(){
    foreach ($this->libreria as $libro) {
      // $detalles[] = $libro->descripcio();
      array_push($libreria, $libro->descripcio());
    }
    return $this->libreria;
  }




  //funcion añadir libro:
  public function añadirLibro($libro) {
    // $this->libreria[]=$libro;
    array_push ($this->libreria, $libro);

}

}
?>