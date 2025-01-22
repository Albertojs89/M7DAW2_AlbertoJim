<?php

class Carta {
    public $palo; // Color de la carta ("red", "yellow", "blue", "green")
    public $numero; // Valor de la carta (número o especial: "reverse", "skip", "+2")
    public $index; // Identificador único opcional

    public function __construct($palo, $numero, $index = null) {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    // Método para mostrar la carta como una imagen
    public function pinta_carta() {
      if ($this->palo === 'wild') {
        return "<img src='images/{$this->numero}.png' alt='{$this->numero}' />";
    }
        return "<img src='images/{$this->numero}_{$this->palo}.png' alt='{$this->numero} {$this->palo}' />";
    }

    // Método para mostrar la carta como un enlace interactivo
    public function pinta_carta_link($url) {
        return "<a href='{$url}'><img src='images/{$this->numero}_{$this->palo}.png' alt='{$this->numero} {$this->palo}' /></a>";
    }

    // Método para mostrar la carta girada
    public function pinta_carta_girada() {
        return "<img src='images/carta_girada.png' alt='Carta girada' />";
    }
}