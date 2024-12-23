<?php

class Producte{
  public string $nombre;
  public int $precio;

  public function __construct(string $nombre, int $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

  public function mostrarPrecio(){
    return "El precio del producto es: ".$this->precio;
  }
}

$producte1=new Producte("Laptop",1000);
echo $producte1->mostrarPrecio();

echo "<br>";
//mostrar precio y nombre
echo $producte1->precio;
echo $producte1->nombre;

?>