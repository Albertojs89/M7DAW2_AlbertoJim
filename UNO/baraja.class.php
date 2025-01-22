<?php

require_once 'carta.class.php';

class Baraja {
    public $conjunto_cartas = []; // Array que contiene todas las cartas del juego

    // Método para crear la baraja
    public function crea_baraja() {
        foreach (['red', 'yellow', 'blue', 'green'] as $color) {
            // Cartas numeradas (0-9, dos copias para cada número excepto el 0)
            for ($i = 0; $i <= 9; $i++) {
                $this->conjunto_cartas[] = new Carta($color, $i);
                if ($i !== 0) {
                    $this->conjunto_cartas[] = new Carta($color, $i);
                }
            }

            // Cartas especiales: reverse, skip, +2 (dos copias por color)
            foreach (['reverse', 'skip', 'picker'] as $especial) {
                $this->conjunto_cartas[] = new Carta($color, $especial);
                $this->conjunto_cartas[] = new Carta($color, $especial);
            }
        }

        /* Cartas comodín: "wild"(cambio de color) y "+4" (cuatro copias de cada una)
    
        Como creamos las cartas especiales:
        -En este bucle creamos las cartas y las guardamos en el array, 2 de cada una.
        -Al crear la nueva carta asignamos que tengan palo: wild y numero.

        Cuando llamamos a Pinta carta se aplica la condicion de : si el palo==wild return numero. 
            Por ejemplo, para la carta con:
            palo = 'wild'
            numero = 'color_changer' ...la ruta sería: <img src='images/color_changer.png' alt='color_changer' />

        */
        for ($i = 0; $i < 4; $i++) {
            $this->conjunto_cartas[] = new Carta('wild', 'color_changer');
            $this->conjunto_cartas[] = new Carta('wild', '+4');
        }
    }

    //EXPLICACION DEL BUCLE PARA CREAR BARAJA----------------------------------------------------------------
    /*
    Ejemplo de la primera iteración del foreach con red:
        -El foreach selecciona red como $color.
        -El for empieza con $i = 0.
        -Crea una carta: new Carta('red', 0) y la añade al array.
        -El for avanza a $i = 1.
        -Crea una carta: new Carta('red', 1) y la añade.
        -Como $i !== 0, añade otra carta idéntica: new Carta('red', 1).
        -Este proceso continúa hasta $i = 9.
        -Al final de esta iteración, para red, se crean:

        1 carta con el número 0.
        2 cartas para cada número del 1 al 9.

        En el caso del segundo foreach con las especiales:
            Aprovecha el color que itera en el primer foreach, ya ha salido del for que recorre 9 instancias para generar 2 cartas de cada color y numero
            Y ahora recorre una nueva array que itera sobre las especiales reverse, skip y +2, y guarda 2 copias en la array conjunto_cartas de cada una.

        Lo mismo para las cartas extra de Wild. Lo que este bucle está fuera del foreach que recorre las de colores, ya que no tienen colores.
    --------------------------------------------------------------------------------------------------------------------------------------------------------*/

    // Método para barajar las cartas
    public function mezcla() {
        shuffle($this->conjunto_cartas);
    }

    // Método para mostrar todas las cartas de la baraja
    public function pinta_baraja() {
        $baraja = ""; //inicializamos la variable baraja vacía para generar el html
        foreach ($this->conjunto_cartas as $carta) {
            $baraja .= $carta->pinta_carta() . " ";
        }
        return $baraja;
    }

    // Método para mostrar todas las cartas giradas
    public function pinta_baraja_girada() {
        $baraja = "";
        foreach ($this->conjunto_cartas as $carta) {
            $baraja .= $carta->pinta_carta_girada() . " ";
        }
        return $baraja;
    }
}

