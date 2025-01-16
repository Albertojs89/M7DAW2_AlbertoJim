<?php
session_start(); // Iniciar la sesión para usar $_SESSION

// Clase Videojuego
class Videojuego {
    public $titulo;
    public $nota;

    public function __construct($titulo, $nota) {
        $this->titulo = $titulo;
        $this->nota = $nota;
    }

    public function mostrarInfo() {
        return "Título: $this->titulo, Nota: $this->nota";
    }
}

// Inicializar el array de videojuegos en la sesión si no existe|| Esto [] es un array vacio que es lo que serializamos
if (!isset($_SESSION['videojuegos'])) {
    $_SESSION['videojuegos'] = serialize([]);
}
/*----------------------------------------------------------------
El paso de Inicializar la array es fundamental para asegurarnos de que nuestra sesión tenga un array que almacene los videojuegos. 
Este array debe estar presente desde que se accede a la página por primera vez, 
por eso es necesario inicializarlo si no existe. Vamos a verlo de una forma más detallada.

¿Por qué inicializar el array en la sesión?
En PHP, las sesiones nos permiten almacenar información entre diferentes peticiones (es decir, entre distintas cargas de la página). 
La variable $_SESSION actúa como un contenedor global para todos los datos que queramos compartir entre varias páginas o recargas.

Array de videojuegos: Queremos que, en cada recarga de la página, se guarden los videojuegos que el usuario haya añadido. 
Pero si no inicializamos este array, la sesión no tendrá ningún valor guardado, lo que podría causar errores cuando intentemos acceder a los videojuegos.
¿Cómo inicializar el array de videojuegos?
Queremos almacenar un array dentro de $_SESSION['videojuegos']. 
La mejor forma de hacerlo es asegurarnos de que la primera vez que se accede a la página, $_SESSION['videojuegos'] esté vacío pero preparado para almacenar objetos de la clase Videojuego.

¿Por qué usar serialize aquí?

PHP no permite almacenar directamente objetos en la sesión como arrays o cadenas de texto. Para poder almacenar objetos complejos como nuestros videojuegos, 
los serializamos (convertimos en texto) para que PHP pueda almacenarlos y luego deserializarlos para recuperar los objetos.

--------------------------------------------------------------------------------------------------------------------------*/

// Verificar si el formulario fue enviado para guardar un nuevo videojuego
if (isset($_POST['guardar'])) {
    // Recibir datos del formulario
    $titulo = $_POST['titulo'];
    $nota = $_POST['nota'];

    // Crear un nuevo objeto Videojuego
    $videojuego = new Videojuego($titulo, $nota);

    // Recuperar el array de videojuegos desde la sesión
    $videojuegos = unserialize($_SESSION['videojuegos']);

    // Añadir el nuevo videojuego al array
    $videojuegos[] = $videojuego;

    // Serializar nuevamente el array y guardarlo en la sesión
    $_SESSION['videojuegos'] = serialize($videojuegos);
}

// Mostrar la lista de videojuegos cuando se presiona el botón "Mostrar Lista"
if (isset($_POST['mostrar'])) {
    // Recuperar el array de videojuegos desde la sesión
    $videojuegos = unserialize($_SESSION['videojuegos']);
    
    echo "<h2>Lista de Videojuegos</h2>";
    echo "<ul>";
    // Mostrar cada videojuego en una lista
    foreach ($videojuegos as $videojuego) {
        echo "<li>" . $videojuego->mostrarInfo() . "</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Videojuegos</title>
</head>
<body>
    <h1>Gestión de Videojuegos</h1>

    <!-- Formulario para añadir videojuegos -->
    <form method="post" action="videojuegos.php">
        <label for="titulo">Título del Videojuego:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br>
        <label for="nota">Nota del Videojuego:</label>
        <input type="number" id="nota" name="nota" step="0.1" min="0" max="10" required>
        <br>
        <button type="submit" name="guardar">Guardar Videojuego</button>
    </form>

    <hr>

    <!-- Botón para mostrar la lista -->
    <form method="post" action="videojuegos.php">
        <button type="submit" name="mostrar">Mostrar Lista de Videojuegos</button>
    </form>

</body>
</html>


<!-- 
Ejemplo de flujo de serialización y deserialización:
Guardar un objeto en la sesión:

Deserializas el array de videojuegos.
Añades el nuevo objeto al array.
Serializas el array y lo guardas en la sesión.
Mostrar la lista de objetos:

Deserializas el array de videojuegos.
Accedes a los objetos y muestras sus propiedades.
No necesitas serializar de nuevo al mostrar la lista, solo si quieres guardar cambios (como agregar o quitar videojuegos).


-->