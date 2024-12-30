<?php

//vamos a crear una clase animal y que con un formulario se guarden los atributos.

class Animal {
  public string $nom;
  public string $tipus;

   public function __construct(string $nom, string $tipus) {
    $this->nom = $nom;
    $this->tipus = $tipus;
  }

  public function descriure(): string {
    return "El animal ".$this->nom." de tipus ".$this->tipus."";
  }
 

}

//recibir parametros

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST["nom"];
  $tipus = $_POST["tipus"];

  $animal=new Animal($nom, $tipus);
  echo $animal->descriure();
}



//comprobación:

// $animal=new Animal("Perro","Labrador");
// echo $animal->descriure();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
</head>
<body>
  <form action="" method="post">
    <label for="nom">Nombre:</label>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="tipus">Tipo:</label>
    <input type="text" id="tipus" name="tipus" required><br><br>

    <input type="submit" value="Enviar">
  </form>
</body>
</html>