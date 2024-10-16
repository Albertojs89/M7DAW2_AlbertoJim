
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
    <?php
        echo "<br>";
        function convertirTemperatura($temperatura, $escala){
            if($escala==="C"){
                $resultado=($temperatura-32)*5/9;
            }else if($escala==="F"){
                $resultado=($temperatura*9/5)+32;
            }else{
                return "Escala no valida, usa C o F mamonzuelo";
            }
            return $resultado;
        }
        //ejemplo:

        $resultado=convertirTemperatura(30,"C");
        echo "La temperatura de 30º en Celsius es: ".$resultado;
    ?>

<!-- 5. Cálculo de edad a partir del año de nacimiento -->
    <?php
        echo "<br>";
        function calcularEdad($anioNacimiento){
            $anioActual=2024;
            $edadActual=$anioActual-$anioNacimiento;

            return $edadActual;
        }

        //Ejemplo:
        $edadActual=calcularEdad(1989);
        echo "Esta es tu edad: ".$edadActual;

    ?>

    <!-- 6. Determinar si un numero es par o impar -->

    <?php
        echo "<br>";
        function esPar($numero){
            $resultado=$numero%2;
            if($resultado===0){
                return true;
            }else if($resultado!=0){
                return false;
            }
        }

        $resultado=esPar(6);
        if($resultado===true){
            echo"Es PAR";
        }else{
            echo "es IMPAR";
        }
    ?>


    <!-- 7. Generar enlace de descarga -->

    <?php
        echo "<br>";
        function generarEnlaceDescarga($archivo){
            $enlace = '<a href="' . $archivo . '" download>Descargar</a>';

            return $enlace;
        }

        $enlaceImagen="https://ih1.redbubble.net/image.1940022233.4063/flat,750x,075,f-pad,750x1000,f8f8f8.u2.jpg";
        $enlaceDescarga=generarEnlaceDescarga($enlaceImagen);
        echo $enlaceDescarga;
    ?>

    <!-- 8. Calcular descuento aplicado -->

    <?php
    echo "<br>";
    
    function calcularDescuento($precioOriginal,$descuento){
        $resultado= $precioOriginal*($descuento/100);

        $precioFinal=$precioOriginal-$resultado;
        return $precioFinal;
    }
    //Ejemplo:
    $precioDescuento=calcularDescuento(80,20);
    echo "El descuento de un juego de 80 euros es de: ".$precioDescuento;
    ?>

    <!-- 9. Conversión de horas a minutos -->

    <?php
        echo "<br>";

        function convertirHorasMinutos($horas){
            $minutos=$horas*60;
            return $minutos;

        }

        //ejemplo:
        echo "Cuantos minutos son 2 horas?";
        echo "<br>";
        $minutos=convertirHorasMinutos(2);
        echo "Son " . $minutos . " minutos";

    ?>
