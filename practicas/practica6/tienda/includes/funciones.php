<!-- Funciones php -->







<?php

function generarTablaProductos($productos)
{
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-light"><tr><th>Producto</th><th>Precio</th><th>ID</th></tr></thead>';
    echo '<tbody>';
    foreach ($productos as $producto) {
        echo '<tr>';
        echo '<td>' . ucfirst($producto['nombre']) . '</td>';
        echo '<td>' . $producto['precio'] . '</td>';
        echo '<td>' . $producto['disponibilidad'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

function muestraInfoContacto($nombre, $telf, $urlImg){
    echo '
        <div class="container-fluid d-flex p-5">
            <div class="mx-5 w-40">
                <ul class="list-group">
                <li class="list-group-item">'.$nombre.'</li>
                <li class="list-group-item">'.$telf.'</li>
            </ul>
            </div>
            <div>
                <img src="'.$urlImg.'" alt="" class="img-fluid shadow" style="height: auto;">
            </div>
       </div>
    
    
    ';

}
?>