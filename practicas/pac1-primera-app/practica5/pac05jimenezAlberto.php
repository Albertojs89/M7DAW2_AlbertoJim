<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prac05</title>
</head>
<body>

<!-- 1. Generar saludo personalizado -->

    <?php
    
    function generarSaludo($nombre){
        return "<h1>Hola $nombre !</h1>";
    }

    echo generarSaludo("Alberto");
    ?>
    
<!-- 2. Calcular el precio total de un producto -->

    <?php
    function calcularTotal($precio,$cantidad,$impuesto){
        $resultado=$precio*$cantidad;
        $impuesto=$resultado*($impuesto/100);
        $total = $resultado + $impuesto;

        return $total;
    }

    echo calcularTotal(6,4,2);


    ?>
<!-- 3. Generar un resumen acortado -->
    <?php
    function generarResumen($texto,$limite){
        return substr($texto,0,$limite);
    }
    echo generarResumen("Me llamo Alberto",10);

    ?>
<!-- 4. Conversion de temperaturas -->
</body>
</html>