<?php
class Coche{
    public string $marca;
    public string $modelo;

    public function descripcion():string {
        return "El coche es este modelo " . $this->modelo . " y esta marca " . $this->marca . ".";
    }
}

$coche= new Coche();
$coche->marca="Seat";
$coche->modelo="Leon";
echo $coche->descripcion();
?>