<?php
//Ejemplo tutorial:

class Coche{
  public string $marca;
  public string $modelo;


  public function descripcion(): string{
    return "Este coche es un:".$this->marca." ".$this->modelo." . ";
  }
}

//creamos objeto de coche (instancia de la clase con sus atributos)

$coche=new Coche();
$coche->marca="Toyota";
$coche->modelo="Corolla";
echo $coche->descripcion();

echo "<br>";

//ejemplo de constructor:

class Persona{
  public string $nombre;
  private int $edad;

  public function __construct(string $nombre, int $edad) {
  $this->nombre = $nombre;
  $this->edad = $edad;
}

public function saludar(): void {
        echo "Hola, mi nombre es " . $this->nombre . " y tengo " . $this->edad . " años.";
    }
  
  public function getEdad():int{
    return $this->edad;
  }

  

}


$persona =new Persona("Anna",25);
echo $persona->nombre;
//la edad es privada por lo que no lo imprime
echo "<br>";
$persona->saludar();

?>

<!-- Ejercicios practicos -->

<?php
echo "<br>";
//Exercici 1: Crear una classe Llibre

class Llibre{
  public string $titol;
  public string $autor;
  
  public function descripcio(){
    return "El llibre es ".$this->titol." creat per ".$this->autor." . ";
  }

  public function __construct(string $titol, string $autor){
    $this->titol=$titol;
    $this->autor=$autor;
  }

   public function getAutor():string{
    return $this->autor;
  }

  

}

$libro1=new Llibre("El señor de los anillos", "Tolkien");
echo $libro1->descripcio();
$libro2=new Llibre("El imperio final","Brandon Sanderson");
echo "<br>";
echo $libro2->descripcio();

//ejemplo llamar al getAutor----------------------------------------------

echo "<br>";
echo "El autor del libro es: ".$libro2->getAutor();
echo "<br>";
echo "El autor del otro libro es: ".$libro1->getAutor();

echo "<br>";


?>