<?php

class Jugador {
    public $id; // Identificador único del jugador
    public $mano = []; // Array que contiene las cartas en la mano del jugador

    public function __construct($id) {
        $this->id = $id;
    }

    // Método para añadir una carta a la mano
    public function añadir_carta($carta) {
        $this->mano[] = $carta;
    }

    // Método para mostrar las cartas en la mano
    public function mostrar_mano() {
    $misCartas = "<div class='mano' style='display:flex; gap:10px; margin-bottom:20px; align-items:center;'>";
    foreach ($this->mano as $carta) {
    $misCartas .= "<a href='jugar.php?color={$carta->palo}&numero={$carta->numero}' style='text-decoration:none;'>";
    $misCartas .= $carta->pinta_carta();
    $misCartas .= "</a>";
}

    $misCartas .= "</div>";
    return $misCartas;
}

  /*
  Explicación de la funcion mostrar mano
  -Creamos la variable misCartas que va a contener una etiqueta div para agrupar las cartas
  (contenedor visual para html)
  -Recorremos el array mano con un foreach
  -En cada iteracion:
    se llama al metodo pintar_carta() que genera un bloque HTML para representar una carta.
    EL html resultante de pinta carta se concatena a $misCartas.
  -Cerramos el contenedor div: $misCartas .="</div>"

  Ejemplo practico:
  - Si un jugador tiene las cartas "1_red" y "reverse_blue",
    el resultado será un div con estas imágenes de cartas representadas:
    
    <div class='mano'>
      <img src='images/1_red.png' alt='1 red' />
      <img src='images/reverse_blue.png' alt='reverse blue' />
    </div>
          Ejemplo practico:
          $text = "Hola";
          $text .= " Mundo"; // Equivalente a $text = $text . " Mundo";
          echo $text;

  */
}
