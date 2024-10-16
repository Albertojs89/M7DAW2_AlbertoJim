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
        function convertirMayusculas($texto){
            $textoMayus = strtoupper($texto);

            return $textoMayus;
        }

        $textoInicial="Messi es el mejor jugador de la historia";
        //ejemplo:
        $textoCambiado=convertirMayusculas($textoInicial);
        echo $textoCambiado;


    ?>

    <!-- 2. Contar palabras de un texto -->
    <?php
        echo "<br>";
        function contarPalabras($texto){
            $textoContado= str_word_count($texto);
            return $textoContado;
        }

        $textoInicial="Messi es mil veces mejor que CR7   ---->";
        echo $textoInicial;
        $textoContado=contarPalabras($textoInicial);
        echo "Tiene: ". $textoContado . "palabras";

    ?>

       
    <!-- 3. Obtener una subcadena -->

    <?php
        echo "<br>";
        function obtenerSubcadena($texto,$inicio,$longitud){
            $subcadena= substr($texto,$inicio,$longitud);
            return $subcadena;
        }
        //ejemplo:
        $textoInicial="Iniesta es mejor que Zidane";
        $inicio=3;
        $longitud=4;

        $resultado=obtenerSubcadena($textoInicial,$inicio,$longitud);
        echo $textoInicial;
        echo "<br>";
        echo $resultado;

    ?>

    <!-- 4. Reemplazar palabras en una frase -->

    <?php
        echo "<br>";

        function reemplazarPalabras($texto,$buscar,$reemplazar){
            $textoCambiado=str_replace($buscar,$reemplazar,$texto);
            return $textoCambiado;
        }

        //ejemplo:
        $textoInicial="Interstellar es malisima";
        echo $textoInicial;
        echo "<br>";
        $buscar="malisima";
        $reemplazar="buenisima";
        $textoCambiado=reemplazarPalabras($textoInicial,$buscar,$reemplazar);
        echo $textoCambiado;
    ?>

</body>
</html>