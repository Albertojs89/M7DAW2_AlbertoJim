<?php
class Coche {
    public string $marca = "Desconocida";
    public string $modelo = "Desconocido";
   

    public function descripcion(): string {
        return "El coche es un {$this->marca} {$this->modelo} .";
    }
}

// Instanciamos un objeto sin especificar los valores
$miCoche = new Coche();

// Mostramos la descripción del coche
echo $miCoche->descripcion();

?>