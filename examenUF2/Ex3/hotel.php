<?php
session_start();

// Clase Habitacio
class Habitacio {
    public $tipus;
    public $preu;
    public $disponible;

    public function __construct($tipus, $preu, $disponible = true) {
        $this->tipus = $tipus;
        $this->preu = $preu;
        $this->disponible = $disponible;
    }

    
    public function mostrarInfo() {
        return "Tipus: {$this->tipus}, Preu: {$this->preu}€, Disponible: " . ($this->disponible ? "Sí" : "No");
    }
}

// Clase Hotel
class Hotel {
    public $habitacions = [];

    public function __construct() {
        //iniciar habtoiaacioones
        if (!isset($_SESSION['habitacions'])) {
            $this->habitacions = [
                new Habitacio("Individual", 50),
                new Habitacio("Doble", 80),
                new Habitacio("Suite", 150),
                new Habitacio("Doble", 80),
                new Habitacio("Individual", 50)
            ];

          }
?>