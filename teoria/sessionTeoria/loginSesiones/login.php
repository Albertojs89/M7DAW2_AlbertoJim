<?php
  session_start();

  //simulo bbdd con usuarios:
  
  $users=[
    [
      "username"=>"user1",
      "password"=>"123",
    ],
    [
      "username"=>"user2",
      "password"=>"456",
    ],
    [
      "username"=>"user3",
      "password"=>"789"
    ]
    ];

    $username=$_POST['username'];
    $password=$_POST['password'];

    //verifico si el usuario existe y la contraseña es correcta
    //REQUEST_METHOD: indica el metodo HTTP utilizado para la peticion (GET, POST, PUT, DELETE)
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      foreach ($users as $user) {
      if($user['username']==$username && $user['password']==$password){
        //si existe lo envio a la pagina de bienvenida pero antes gyuardo en la sesion el username
        $_SESSION['username'] = $username;
        header('Location: bienvenido.php');
        //header location: es una manera de redireccionar al usuario a otra pagina
        
      }else{
        $error='Usuario o contraseña incorrectos';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- creacion de formulario -->
   <h4><?php echo $error ?></h4>
   <form action="login.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" name="username" required><br><br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br><br>
    
     <!-- boton de enviar -->
      <button type="submit">Iniciar sesión</button>
   </form>
</body>
</html>