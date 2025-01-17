<?php
class Baraja {
    public $conjunto_cartas = []; // Array de todas las cartas Tener en cuenta serialize mas adelante!

    public function crea_baraja() {
        $index = 0; // Identificador único para las cartas

        foreach (['red', 'yellow', 'blue', 'green'] as $color) {
            for ($i = 0; $i <= 9; $i++) { // Números del 0 al 9
                $this->conjunto_cartas[] = new Carta($color, $i, $index++);
            }
            // Cartas especiales
            foreach (['reverse', 'skip', '+2'] as $especial) {
                $this->conjunto_cartas[] = new Carta($color, $especial, $index++);
            }
        }
    }

     public function mezcla() {
        shuffle($this->conjunto_cartas);  // Baraja aleatoriamente las cartas
    }

    // Método para pintar las cartas en la baraja
    public function pinta_baraja() {
        foreach ($this->conjunto_cartas as $carta) {
            echo $carta->pinta_carta();  // Mostrar cada carta utilizando su método pinta_carta
        }
    }

    // Método para pintar las cartas giradas
    public function pinta_baraja_girada() {
        foreach ($this->conjunto_cartas as $carta) {
            echo $carta->pinta_carta_girada();  // Mostrar cada carta girada
        }
    }
}
?>
