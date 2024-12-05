<?php
session_start();

if(isset($_SESSION['username'])){
  echo'
  <header>
    <h2>Jugador: '.$_SESSION['username'].'</h2>
    <h3>Rol: '.$_SESSION['role'].'</h3>
  </header>
  ';
}




?>