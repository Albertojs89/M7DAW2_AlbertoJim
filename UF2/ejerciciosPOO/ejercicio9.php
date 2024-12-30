<?php
//crear varios productos y mostrarlos en tabla, primero hacemos la clase producto
//Habrá 2 atributos, nombre del videojuego y nota.
class Producto {
  public string $nombre;
  public int $nota;


  //constructor 
  public function __construct(string $nombre, int $nota) {
        $this->nombre = $nombre;
        $this->nota = $nota;
    }

}

//array con objetos de la clase producto

$productos = [
  new Producto("Baldurs Gate",10),
  new Producto("Super Mario Bros",9),
  new Producto("FIFA",4),
  new Producto("Indiana Jones",8)
];

//creamos la tabla  Atencion: recordar los echo, comillas y como cierra para imprimir.

/*
Recuerdo de generar tablas:
Resumen de las etiquetas:

<table>: Define la tabla completa.
<tr>: Define una fila.
<th>: Define una celda de encabezado.
<td>: Define una celda de datos.
Otras etiquetas útiles:

<caption>: Se utiliza para agregar un título a la tabla.
<thead>, <tbody>, <tfoot>: Se utilizan para agrupar filas en secciones (cabecera, cuerpo y pie de página).

*/ 

echo "<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Nota</th>
            
        </tr>
    </thead>
    <tbody>";

foreach($productos as $producto){
    echo "<tr>
        <td>{$producto->nombre}</td>
        <td>{$producto->nota}</td>
        
    </tr>";
}

echo "</tbody>
</table>";







?>