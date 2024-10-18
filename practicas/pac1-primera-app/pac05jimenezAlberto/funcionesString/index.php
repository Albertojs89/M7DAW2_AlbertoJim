<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prac05</title>
</head>

<body>

    <!-- PARTE 2: MANIPULACION DE STRINGS Y ARRAYS-------------------------------------------- -->


    <!-- 1. Convertir texto a mayusculas -->

    <?php
    echo "<br>";
    function convertirMayusculas($texto)
    {
        $textoMayus = strtoupper($texto);

        return $textoMayus;
    }

    $textoInicial = "Messi es el mejor jugador de la historia";
    //ejemplo:
    $textoCambiado = convertirMayusculas($textoInicial);
    echo $textoCambiado;


    ?>

    <!-- 2. Contar palabras de un texto -->
    <?php
    echo "<br>";
    function contarPalabras($texto)
    {
        $textoContado = str_word_count($texto);
        return $textoContado;
    }

    $textoInicial = "Messi es mil veces mejor que CR7   ---->";
    echo $textoInicial;
    $textoContado = contarPalabras($textoInicial);
    echo "Tiene: " . $textoContado . "palabras";

    ?>


    <!-- 3. Obtener una subcadena -->

    <?php
    echo "<br>";
    function obtenerSubcadena($texto, $inicio, $longitud)
    {
        $subcadena = substr($texto, $inicio, $longitud);
        return $subcadena;
    }
    //ejemplo:
    $textoInicial = "Iniesta es mejor que Zidane";
    $inicio = 3;
    $longitud = 4;

    $resultado = obtenerSubcadena($textoInicial, $inicio, $longitud);
    echo $textoInicial;
    echo "<br>";
    echo $resultado;

    ?>

    <!-- 4. Reemplazar palabras en una frase -->

    <?php
    echo "<br>";

    function reemplazarPalabras($texto, $buscar, $reemplazar)
    {
        $textoCambiado = str_replace($buscar, $reemplazar, $texto);
        return $textoCambiado;
    }

    //ejemplo:
    $textoInicial = "Interstellar es malisima";
    echo $textoInicial;
    echo "<br>";
    $buscar = "malisima";
    $reemplazar = "buenisima";
    $textoCambiado = reemplazarPalabras($textoInicial, $buscar, $reemplazar);
    echo $textoCambiado;
    ?>


    <!--5. Invertir una cadena de texto  -->

    <?php
    echo "<br>";
    function invertirTexto($texto)
    {
        $resultado = strrev($texto);

        return $resultado;
    }

    //ejemplo:
    $textoInicial = "Hello Work";
    $textoInvertido = invertirTexto($textoInicial);
    echo $textoInvertido;


    ?>


    <!-- 6. Comparar dos strings -->

    
    <?php
    echo "<br>";
    function compararStrings($cadena1, $cadena2)
    {
        // strcmp devuelve 0 si las cadenas son iguales
        if (strcmp($cadena1, $cadena2) === 0) {
            return true;
        } else {
            return false;
        }
    }

    // Ejemplo:
    $cadena1 = "Hola";
    $cadena2 = "Hola";

    if (compararStrings($cadena1, $cadena2)) {
        echo "Las cadenas son iguales.";
    } else {
        echo "Las cadenas son diferentes.";
    }
    ?>


    <!-- 7. Eliminar espacios en blanco -->

    <?php
    echo "<br>";
        function eliminarEspacios($texto){
            $nuevoTexto = trim($texto);
            return $nuevoTexto;
        }
        //ejemplo:
        $texto = "     Visca    El       Barça ";
        echo eliminarEspacios($texto);

    ?>

    <!-- 8. Contar ocurrencias de una palabra en un texto -->

    <?php
    echo "<br>";
    function contarOcurrencias($palabra, $texto){
        $ocurrencias = substr_count($texto, $palabra);
        return $ocurrencias;
    }
    //ejemplo:
    $palabra = "El";
    $texto = "El Barça es el mejor equipo en la historia";
    echo "La palabra '". $palabra. "' aparece ". contarOcurrencias($palabra, $texto). " veces en el texto.";
    ?>

    <!-- 9. Dividir una cadena en palabras -->
     

</body>

</html>