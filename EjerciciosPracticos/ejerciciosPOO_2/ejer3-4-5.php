<?php
class Persona{
  public string $nombre;
  public int $edad;

  public function __construct(string $nombre, int $edad){
    $this->nombre = $nombre;
    $this->edad = $edad;
  }

  public function saludar():string{
    return "Hola mi nombre es ". $this->nombre. " y tengo esta edad ".$this->edad . ".";
  }
}

$persona1 = new Persona("Juan", 30);
echo $persona1->saludar();
$persona2= new Persona ("Ana",24);
echo "<br>";
echo $persona2->saludar();
?>