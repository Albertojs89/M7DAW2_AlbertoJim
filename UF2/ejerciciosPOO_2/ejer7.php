<?php

//recibimos los datos enviados
if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $nombre=$_POST["nombre"];
  $edad=$_POST["edad"];


  //instanciamos la clase Persona con los datos recibidos
  //importante hacerlo dentro del if Request donde recibo datos!!!
$persona=new Persona($nombre, $edad);

//mostramos el resultado 
echo $persona->saludar();

}

class Persona{
  public string $nombre;
  public int $edad;

  public function __construct(string $nombre, int $edad) {
    $this->nombre = $nombre;
    $this->edad = $edad;
  }

  public function saludar(): string {
    return "Hola mi nombre es ". $this->nombre. " y tengo esta edad ".$this->edad. ".";
  }

}



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ejer 7 repaso</title>
</head>
<body>
  <!-- formulario para ingresar nombre y edad -->
   <form action="ejer7.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>
    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" required><br><br>
    <input type="submit" value="Enviar">
   </form>
</body>
</body>
</html>