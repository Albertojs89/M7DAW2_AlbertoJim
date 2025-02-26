<?php
   session_start();
   require_once 'config.php';

   //comprobar si se ha iniciado sesión
   if($_SERVER['REQUEST_METHOD']==='POST'){
      //guardar los datos del formulario en variables
      $email = $_POST['email'];
      $password = $_POST['password'];

      //ejecutar la consulta
      $result = $mysqli->query("SELECT * FROM USERS WHERE email = $email LIMIT 1");

      //comprobar si hay resultados
      if($result && $result->num_rows > 0){
         $user = $result->fetch_assoc();

         //comprobar la contraseña es correcta
         if(password_verify($password, $user['password'])){
            //iniciar sesión
            $_SESSION['username'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['age'] = $user['age'];
            $_SESSION['job'] = $user['job'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['email'] = $user['email'];
            

            header('Location: index.php');
            exit;
         } else {
            //mostrar error de contraseña incorrecta
            echo '<p class="error">Contraseña incorrecta.</p>';
         }
      }

   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Iniciar sesion</title>
</head>
<body>
   <h1>Iniciar Sesión</h1>
   <form action="" method="post">
      <label for="email">Correo Electrónico:</label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Contraseña:</label><br>
      <input type="password" id="password" name="password" required><br>

      <input type="submit" value="Iniciar Sesión">
   </form>
</body>
</body>
</html>