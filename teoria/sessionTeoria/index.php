<?php
  session_name('PRUEBA_SESSION'); //se le puede poner nombre a la sesion
  session_start();
  //iniciamos, siempre arriba del todo

  $_SESSION['username']="Juan"; //asignamos valores a las variables de sesión
  $_SESSION['age']=23;// 

  session_destroy(); //destruimos la sesion (cerrar sesión)

?>