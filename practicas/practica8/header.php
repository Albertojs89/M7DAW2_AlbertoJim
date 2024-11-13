<?php
session_start();
 
 
    echo '
        <header class="d-flex justify-content-center align-items-center">
          <div class="d-flex align-items-center p-4">
                <h2 class="me-3 mb-0 px-4">Bienvenido '.$_SESSION['username'].'!</h2>
                <h3>Dificultat: '.$_SESSION['dificultat'].'</h3>
                <img src="'.$_SESSION['img'].'" alt="Avatar" class="rounded-circle ms-4" style="width: 80px; height: 80px;">
          </div>
        </header>
         
        
       
    ';

?>