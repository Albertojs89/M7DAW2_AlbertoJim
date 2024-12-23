<?php
class Persona {
    public string $nombre;
    private int $edad;

    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function getEdad(): int {
        return $this->edad;
    }

    public function saludar(): void {
        echo "Hola, mi nombre es " . $this->nombre . " y tengo " . $this->edad . " años.";
    }
}

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];

    // Creamos una instancia de la clase Persona
    $persona = new Persona($nombre, $edad);

    // Mostramos el resultado
    echo "<h2>Datos de la persona:</h2>";
    $persona->saludar();
} else {
    // Mostramos el formulario
    echo "
    <form method='post' action=''>
        <label for='nombre'>Nombre:</label>
        <input type='text' id='nombre' name='nombre'><br>
        <label for='edad'>Edad:</label>
        <input type='number' id='edad' name='edad'><br>
        <input type='submit' value='Enviar'>
    </form>
    ";
}