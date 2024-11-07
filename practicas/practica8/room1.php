<?php
session_start();

// var_dump($_SESSION['username']);
// var_dump($_SESSION['dificultat']);
// var_dump($_SESSION['endevinalles']);


?>

 <?php 

          
           // Comprobar si la respuesta es correcta
          if($_POST['answer']==$_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['respuesta']){
            $message=' Correcto!';
            
            $_SESSION['numPR']++; // Incrementar el número de pregunta
          }else if($_POST['answer']==NULL){
            $message=" ";
            
          }else if($_POST['answer']!=$_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['respuesta']){
            $message=' Incorrecto! La respuesta correcta es: '. $_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['respuesta'];
            
            
          }
            
          
          
        ?> <!-- Muestra el mensaje de éxito o error -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 1</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación <?= $_SESSION['numPR']+1; ?></h2>
        <!-- el = es como un echo  -->
        <p class="card-text"><?= $_SESSION['endevinalles'][$_SESSION['dificultat']][$_SESSION['numPR']]['pregunta'] ?></p>
        <form action="room1.php" method="POST">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
       <?= $message; ?>
    </div>
</body>
</html>
