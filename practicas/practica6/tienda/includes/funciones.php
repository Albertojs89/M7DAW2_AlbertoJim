<!-- Funciones php -->


<?php
function generarTablaProductos($productos)
{
    echo "<table>";
    echo "<tr><th>Producto</th><th>Precio</th><th>ID</th></tr>";
    foreach ($productos as $producto) {
        echo "<tr>";
        echo "<td>" . ucfirst($producto['nombre']) . "</td>";
        echo "<td>" . $producto['precio'] . "</td>";
        echo "<td>" . $producto['disponibilidad'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>