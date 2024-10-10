<?php

    function suma($a,$b){
        return($a+$b);
    }

    function multiply($b,$c){
        return($b*$c);
    }

    //Manual php funciones para ver nativas----

    //Mayusculas y minusculas----

    //1. Longitud de caracteres--> strlen()

    $cadena="Hola mundo";
    // echo ($cadena); sacaria 10 caracteres
    echo strlen($cadena);


    //2. strpos  Busca la primera aparicion 
    echo "<br>";
    echo strpos($cadena,"mundo");

    //3. str_replace
    echo "<br>";
    echo str_replace("mundo","Raimundo",$cadena);

    //4. strtolower  Saca TODO en MINUSCULAS
    echo "<br>";
    echo strtolower($cadena);

    //5. toupper    Saca TODO en MAYUSCULAS

    echo "<br>";
    echo strtoupper($cadena);

    //6. ucfirst    PRIMERA EN MAYUSCULA
    echo ucfirst($cadena);

    //7. ucwords
    echo "<br>";
    echo ucwords($cadena);

    //8. trim  elimina espacios entre inicio y final de una cadena
    echo "<br>"; 
    $cadena2='      leo        messi    ';
    echo trim($cadena2);

    //9. substr()
    //obtiene una parte de una cadena
    echo "<br>";
    echo substr($cadena2,14,16);

    //Implode separa una lista con un limitador que tu pongas
    //entre los items:
    //array: $t=[18,15,16,19]
    // echo implode(--.$t)
    //  saldria así: 18--15--16--

    //10. explode
    //transforma una cadena en un array (inverso de implode)
    $cadena="Hola Mundo, PHP";
    $array=explode(",",$cadena);
    print_r($array);
    echo "<br>";
    foreach($array as $a){
        echo $a;
    }

    //inarray busca si existe en una array
    //se puede usar con un if in array por ejemplo

    //12. in_array() 

    $ejemplo=["Mac","NT","Irix","Linux"];
    if(in_array("Irix",$ejemplo)){
        echo "Existe Irix";
    }

    //13. array_search
    //busca un valor en un array y devuelve la clave correspondiente. Si no esta saca FALSE
    $ejemplo2=[1,2,3,4];
    $resultado=array_search(function($numero){
        return $numero*2;

    }, $ejemplo2);
    print_r($resultado);

    //resultado array: ([0]=>2[1]=>4.......)


    //15. array_filter()
    //Para poner condiciones

    $ejemplo3=[1,2,3,4,6,7,8];
    $resultado=array_filter($ejemplo3,function($n){
        return $n %2==0;
    });
    echo "<br>";
    print_r($resultado)

    //ternario con IF

    // echo $edad>18?'Mayor':'Menor';
    /*
        si edad es menor de 18
        ?pregunta y seguido condicion SI
        : SI NO
    
    */ 

    



?>