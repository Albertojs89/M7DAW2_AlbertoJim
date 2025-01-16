<!-- 
Objetivo del ejercicio:
Crear un sistema sencillo de gestión de productos utilizando clases y objetos, y guardar/recuperar los datos con serialize y unserialize. 
-->

<?php
class Producto{
  public string $nombre;
  public float $precio;
  public int $cantidad;

//constructor para inicializar los valores de los productos
  public function __construct(string $nombre, int $precio, int $cantidad){
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->cantidad = $cantidad;
  }

  //metodo para mostrar la informacion del producto

  public function mostrarProducto(){
    return "Producto: $this->nombre, Precio: $this->precio, Cantidad: $this->cantidad";
  }
}



//crear objetos de la clase Producto:

$producto1=new Producto("Manzana",1.2,100);
$producto2=new Producto("Kiwi",2.6,20);

//mostramos la informacion de los prodcutos;
echo $producto1->mostrarProducto();
echo "<br>";
echo $producto2->mostrarProducto();

/*
La función serialize convierte un objeto PHP en una cadena de texto. Esto es útil para guardar 
datos en una base de datos o en un archivo. Vamos a serializar nuestros objetos Producto y mostrar el resultado.

*/

//Serializar los objetos:
$producto1_serializado=serialize($producto1);
$producto2_serializado=serialize($producto2);

//Mostrar la cadena de texto serializada:
echo "<br>";
echo "Producto 1 serializado: $producto1_serializado";
echo "<br>";
echo "Producto 2 serializado: $producto2_serializado";

/*
Ejemplo práctico: Guardar y recuperar un objeto
Imagina que tienes un objeto Producto. Lo serializas y lo guardas en un archivo o base de datos. Más tarde, 
puedes deserializarlo para reconstruir el objeto tal como estaba.

Cuando hacemos unserialize, PHP toma esa cadena de texto y recrea el objeto en memoria, conservando su estado y propiedades.

Ejemplo cotidiano: Es como si un japonés te da una carta, la conviertes a tu idioma para guardarla, y al devolverla puedes volver a pasarla al japones.

*/

//DESERIALIZAR EL OBJETO
$producto1_deserializado=unserialize($producto1_serializado);
$producto2_deserializado=unserialize($producto2_serializado);

//mostramos la informacion de los prodcutos despues de la deserialización;
echo "<br>";
echo $producto1_deserializado->mostrarProducto();
echo "<br>";
echo $producto2_deserializado->mostrarProducto();

//Nota: Este ejemplo no muestra cómo guardar/recuperar datos en una base de datos. Esto es un ejemplo sencillo de cómo se puede hacer con PHP.

?>