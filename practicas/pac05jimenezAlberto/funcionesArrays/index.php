<!-- 1. Sumar valores de un array -->

<?php
    function sumarArray($numeros){
        $sumaTotal=array_sum($numeros);
        return $sumaTotal;
    }
    //ejemplo:

    $miArray=[1,2,3,4,5];
    $resultado=sumarArray($miArray);
    echo "La suma de los valores del array es: ".$resultado;

?>

<!--2. Ordenar un array alfabeticamente -->

<?php
    echo "<br>";
   function ordenarArrayAlfabetico($nombres){
    sort($nombres);
    return $nombres;
   }
   //ejemplo:
   $misNombres=['Hicham','Albert','Jesica','Marc'];
   $nombresOrdenados=ordenarArrayAlfabetico($misNombres);
   print_r($nombresOrdenados);

?>

<!-- 3. Filtrar elementos mayores a un valor -->

<?php

   //Define una función que toma dos parámetros: un array de números y un valor límite.
    echo "<br>";

    function filtrarMayores($numeros, $valor){
        return array_filter($numeros, function($numero) use ($valor){
            return $numero>$valor;
        });   
    }
    //ejemplo:
    $misNumeros=[1,2,3,4,5,6,7,8,9,10];
    $numeroFiltrado=filtrarMayores($misNumeros,8);
    print_r($numeroFiltrado);

?>

<!-- 4. Buscar un valor en un array -->

<?php
    echo "<br>";
    function buscarEnArray($array,$valor){
        return in_array($valor, $array);
    }
    //ejemplo:
    $misNumeros=[1,2,3,4,$mcDonald,6,7,8,9,10];
    $busqueda=buscarEnArray($misNumeros,$mcDonald);
    echo "El valor mcDonald está en el array: ".($busqueda?"Sí":"No");

?>

<!-- 5. Contar elementos de un array -->

<?php
    echo "<br>";
    function contarElementos($array){
        return count($array);
    }
    //ejemplo:
    $misNumeros=[1,2,3,4,5,6,7,8,9,10];
    print_r($misNumeros);
    $resultado=contarElementos($misNumeros);
    echo "El array tiene ".$resultado." elementos.";

?>

<!-- 6. Obtener el valor maximo de un array -->

<?php
    echo "<br>";
    function obtenerMaximo($numeros){
        return max($numeros);
    }
    //ejemplo:
    $misNumeros=[1,2,3,4,5,6,7,8,9,10,11,12];
    print_r($misNumeros); echo "<br>";
    $maximo=obtenerMaximo($misNumeros);
    echo "El valor máximo del array es: ".$maximo;

?>

<!-- 7. Obtener el valor minimo de un array -->

<?php
    echo "<br>";
    function obtenerMinimo($numeros){
        return min($numeros);
    }
    //ejemplo:
    $misNumeros=[1,2,3,4,5,6,7,8,9,10,11,12];
    print_r($misNumeros); echo "<br>";
    $minimo=obtenerMinimo($misNumeros);
    echo "El valor mínimo del array es: ".$minimo;


?>

<!-- 8. Eliminar duplicados de un array -->
 <?php
    echo "<br>";
    function eliminarDuplicados($array){
        return array_unique($array);
    }
    //ejemplo:
    $misNumeros=[1,2,3,4,5,6,7,8,9,10,11,12,1,2,3,4,5,6,7,8,9,10];
    print_r($misNumeros); echo "<br>";
    $arraySinDuplicados=eliminarDuplicados($misNumeros);
    echo"Array SIN duplicados"; echo "<br>";
    print_r($arraySinDuplicados);

?>

<!-- 9. Combinar dos arrays -->

<?php
    echo "<br>";
    function combinarArrays($array1,$array2){
        return array_merge($array1, $array2);
    }
    //ejemplo:
    $array1=[1,2,3];
    $array2=[4,5,6];
    print_r($array1); echo "<br>";
    print_r($array2); echo "<br>";
    $arrayCombinado=combinarArrays($array1, $array2);
    echo"Array combinado"; echo "<br>";
    print_r($arrayCombinado);

?>

<!-- Dividir un array en fragmetnos -->

<?php
    echo "<br>";
    function dividirArray($array,$tamanio){
        return array_chunk($array, $tamanio);
    }
    //ejemplo:
    $array=[1,2,3,4,5,6,7,8,9,10];
    print_r($array); echo "<br>";
    $arrayDividido=dividirArray($array,3);
    echo"Array dividido en fragmentos de 3 elementos"; echo "<br>";
    print_r($arrayDividido);
    echo "<br>";
    //visionado con foreach
    foreach($arrayDividido as $fragmento){
        print_r($fragmento); echo "<br>";
    }

?>