<!-- 
Boton siempre para poder enviar tiene que ser type: submit

Enviamos desde un formulario datos tipo POST o GET a otro archivo.
Desde name='name';
Si queremos enviar varias cosas, ponemos multiple
Y lo enviamos el dato como un array [] el name:

name="frutas[]" por ejemplo
y sin array:

name="fruta"

Al recibir los datos e imprimirlos los del array con un foreach:

foreach($_POST['frutas'] as $fruta){

    echo $fruta;
}

para que sirve unset: anula la variable y evita posibles errores de undefined index.

unset($nombre);

Si no se ha enviado un dato, el unset nos devolverá un error.



Teoria del isset------ SI EXISTE---------------------
SI NO EXISTE------!ISSET
Si no se ha enviado un dato, el isset nos devolverá false.

Si se ha enviado, el isset nos devolverá true.

Ejemplo:

$nombre = $_POST['nombre'];

if(isset($nombre)){

    echo $nombre;
}else{

    echo "No se ha enviado ningún nombre.";
}

EMPTY
Si la variable está vacía, el empty nos devolverá true.

Ejemplo:

$nombre = $_POST['nombre'];

if(empty($nombre)){

    echo "El nombre está vacío.";

}else{

    echo $nombre;
}
----------------------------------------------------------------
diferencia entre isset y empty:
  - isset comprueba si una variable está definida y no es NULL.
  - empty comprueba si una variable está vacía o no.


  - empty también comprueba si una variable es NULL.
  - isset no comprueba si una variable es NULL.






-->



-->

