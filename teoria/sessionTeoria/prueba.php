<?php
  session_start();

  $_SESSION['items']=['Juan', 'Maria', 'Pedro']; //asignamos valores a las variables de sesión


  print_r($_SESSION['items']); // Output: Array ( [0] => Juan [1] => Maria [2] => Pedro )
  
  //funcion para añadir un nombre a la lista con array_push
  function addItem($item) {
    //agregamos el nombre al array de la sesion
    array_push($_SESSION['items'], $item);
    
    
  }

  addItem('Ana'); //agregamos un nombre a la lista
  print_r($_SESSION['items']); // Output: Array ( [0] => Juan [1] => Maria [2] => Pedro [3] => Ana )

?>