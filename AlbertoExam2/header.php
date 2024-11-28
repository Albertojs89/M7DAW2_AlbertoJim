<?php
session_start();

if(isset($_SESSION['name'])){
   echo '<h1>Bienvenido, '.$_SESSION['name'].'</h1>';
}


echo '
    <nav class="d-flex navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio.php">Inicio</a>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="productos.php">Productos</a>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="contacto.php">Contacto</a>
        </div>
    </nav>

';


?>
