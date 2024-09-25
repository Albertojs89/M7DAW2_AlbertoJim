<?php

    $estudiantes=array('Didac','David','Lucia');

    $lista=array("Suleiman","Brian","Dani");

    //ARRAY ESCALAR INDEXADO---------------------

    //Lista detallada de la array para ver todo el contenido
    var_dump($lista);
    echo "<br>";
    //Otra opcion
    print_r($lista);
    echo"<br>";
    //DESDE LA VERSION 5.4 PHP----
    $lista2=["Didac","Kevin","David","87","true"];
    //Acceder a Kevin:
    echo $lista2[1];
    echo"<br>";
    //Cambiar el elemento de esa posicion a otro:
    $lista2[2]="Yehor";
    print_r($lista2[2]);
    echo"<br>";

    //Añadir elementos a un array

    $colores=['rojo','azul','verde'];
    $colores[]='Naranja';

    print_r($colores);

    //ARRAY ASOCIATIVO:---------------------------------
    echo"<br>";
    $tutor=[
        "nombre"=>"Albert",
        "apellidos"=>"Arrebola Sans",
        "edad"=>36
    ];

    echo $tutor["apellidos"];
    $tutor["edad"]=18;
    echo"<br>";
    echo $tutor["edad"];
    

    //RECORRER ARRAY CON UN FOR------

    $numeros=[1,2,3,4,5,6,7,8,9];
    //count(variable)== al .lenght
    for($i=0;$i<=count($numeros);$i++){
        echo $numeros[$i]."<br>";
    }


    //RECORRER ARRAY CON UN FOREACH

    $numeros=[1,2,3,4,5,6,7,8,9];//PARA CADA UNO
    foreach($numeros as $num){
        echo $num." ";
        echo ($num*2).' ';
    }
    //por cada elemento ponle el nombre de num y sacalo con echo
    print_r ($num);

    //recorrer un array asociativo 
    // => ASOCIAR!
    $ciudades=[
        "París"=>"Francia",
        "Barcelona"=>"Espanya",
        "Londres"=>"Reino Unido"
    ];

    foreach($ciudades as $ciudad=>$pais){
        echo "<br>";
        echo "{$ciudad}.Está en {$pais}";
        echo "<br>";
    }

    foreach($ciudades as $ciudad=>$pais){
        echo "<br>";
        if($ciudad=='Barcelona'){
            echo "La ciudad de {$ciudad} está en {$pais}";
        }
        echo "<br>";
    }


    //FOREACH EN ARRAYS MULTIDIMENSIONALES
    //Creacion de array de array con claves y valores
    $estudiantes=[
        ["nombre"=>"Anna","nota"=>3,"genero"=>'m'],
        ["nombre"=>"Dani","nota"=>10,"genero"=>'h'],
        ["nombre"=>"Yehor","nota"=>4,"genero"=>'h'],
        ["nombre"=>"Lucia","nota"=>1,"genero"=>'m'],
        ["nombre"=>"David","nota"=>2,"genero"=>'m'],
    ];


    foreach($estudiantes as $estudiante){
        echo "<br>";
        if($estudiante['genero']=='h'){
            echo "El estudiante: {$estudiante['nombre']} ha
            sacado un {$estudiante['nota']}";
        }else{
            echo "La estudiante: {$estudiante['nombre']} ha
            sacado un {$estudiante['nota']}";
        }
        
    }

?>